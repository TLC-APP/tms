<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP DashboardsController
 * @author NguyenThai
 */
class DashboardsController extends AppController {

    public $uses = array('User', 'Group', 'Course', 'Chapter', 'Attend', 'CoursesRoom', 'Room');

    public function home() {
        if ($this->Auth->loggedIn()) {
            $user = $this->User->find('first', array('contain' => array('Group'), 'conditions' => array('User.id' => $this->Auth->user('id'))));
            if (count($user['Group']) == 1) {
                $this->redirect("/{$user['Group'][0]['alias']}/dashboards/home");
            }
            $this->set('users', $user);
        }
    }

    public function student_home() {
        $contain = array(
            'User' => array('fields' => array('id', 'name')), //create user
            'Teacher' => array('fields' => array('id', 'name')), //Teacher
            'CoursesRoom' => array('Room' => array('id', 'name')),
            'Attend', //Khoa hoc
            'Chapter' => array('fields' => array('id', 'name'))//Chuyen de
        );
        $loginId = $this->Auth->user('id');
        $khoa_da_dang_ky = $this->Attend->getEnrolledCourses($loginId);
        $khoa_toi_day = $this->Course->getTeachingCourse($loginId);
        $today = new DateTime();
        $not_in_course = Set::merge($khoa_da_dang_ky, $khoa_toi_day);
        $conditions = array(
            'NOT' => array('Course.id' => $not_in_course),
            'Course.enrolling_expiry_date >=' => $today->format('Y-m-d H:i:s'),
            'Course.is_published' => 1,
            'Course.status' => COURSE_REGISTERING,
            'Course.max_enroll_number > (SELECT count(id) as Course__register_student_number 
         FROM  attends as Attend 
         where Attend.course_id=Course.id)'
        );
        $course_fields = array('id', 'name', 'chapter_id', 'max_enroll_number', 'enrolling_expiry_date', 'register_student_number', 'session_number');
        $courses = $this->Course->find('all', array('conditions' => $conditions, 'contain' => $contain, 'fields' => $course_fields,));
        $fields = $this->Course->Chapter->Field->find('list');
        $chapters = $this->Course->Chapter->find('list');
        $this->set(compact('fields', 'chapters', 'courses'));
    }

    public function teacher_home() {
        
    }

    public function manager_home() {
        
        $this->redirect(array('controller' => 'courses', 'action' => 'index', COURSE_REGISTERING));
        
    }

    public function fields_manager_home() {
        $this->redirect(array('fields_manager' => true, 'action' => 'index', 'controller' => 'courses', COURSE_REGISTERING));
    }

    public function boss_home() {
        
    }

    public function admin_home() {
        $this->redirect(array('controller' => 'courses', 'action' => 'index', COURSE_REGISTERING));
    }

    public function loggedInMenu() {

        if (!empty($this->request->query)) {
            $layout = $this->request->query['layout'];
            $this->Session->write('layout', $layout);
            $this->Session->write('change_layout', 1);
            return $this->redirect(array('controller' => 'dashboards', 'action' => $layout . '_home'));
        } else {
            
        }
        $user = $this->User->find('first', array('recursive' => 1, 'conditions' => array('User.id' => $this->Auth->user('id'))));
        if (count($user['Group']) == 1) {
            $this->Session->write('layout', $user['Group'][0]['alias']);
            $this->Session->write('change_layout', 0);
            $this->Session->write('group_name', $user['Group'][0]['name']);
            return $this->redirect(array('controller' => 'dashboards', 'action' => $user['Group'][0]['alias'] . '_home'));
        }


        $this->layout = 'group_select';
        $this->set('users', $user);
    }

    public function contact() {
        
    }

    public function help() {
        
    }

    public function courses_completed() {
        $fields = $this->CoursesRoom->Course->Chapter->Field->find('list');
        $course_end = $this->CoursesRoom->course_attend();
        $contain = array('Course' => array('Chapter' => array('id', 'name'), 'Teacher' => array('id', 'name')), 'Room' => array('id', 'name'));
        $conditions = array(
            'Course.status' => COURSE_COMPLETED,
            'NOT' => array('Course.id' => $course_end),
        );
        if ($this->request->is('ajax')) {
            $field_id = $this->request->data['field_name'];
            if ($field_id == '') {
                $courses_completed = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id'),));
            } else {
                $chapter_id = $this->CoursesRoom->Course->Chapter->getChapterByField_id($field_id);
                $course_id = $this->CoursesRoom->Course->getCoursesByChapter_id($chapter_id);
                $conditions = array(
                    'Course.status' => COURSE_COMPLETED,
                    'NOT' => array('Course.id' => $course_end),
                    'Course.id' => $course_id,
                );
                $courses_completed = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id'),));
            }
            $this->set('courses_completed', $courses_completed);
            $this->render('courses_completed_ajax');
        } else {
            $courses_completed = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id'),));
            $this->set('courses_completed', $courses_completed);
        }
        $this->set(compact('fields'));
    }

}
