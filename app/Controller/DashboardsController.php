<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP DashboardsController
 * @author NguyenThai
 */
class DashboardsController extends AppController {

    public $uses = array('User', 'Group', 'Course', 'Chapter', 'StudentsCourse', 'CoursesRoom', 'Room');

    public function home() {
        if ($this->Auth->loggedIn()) {
            $user = $this->User->find('first', array('recursive' => 1, 'conditions' => array('User.id' => $this->Auth->user('id'))));
            if (count($user['Group']) == 1) {
                return $this->redirect(array('controller' => 'dashboards', 'action' => $user['Group'][0]['alias'] . '_home'));
            }
            $this->set('users', $user);
        }
        $contain = array(
            'User' => array('fields' => array('id', 'name')), //create user
            'Teacher' => array('fields' => array('id', 'name')), //Teacher
            'StudentsCourse', //Khoa hoc
            'Chapter'//Chuyen de
        );
        $conditions = array('Course.status' => COURSE_REGISTERING);
        $options = array('contain' => $contain, 'conditions' => $conditions);
        $courses = $this->Course->find('all', $options);
        $this->set('courses', $courses);
    }

    public function student_home() {
        $this->layout = 'student';
        $contain = array(
            'User' => array('fields' => array('id', 'name')), //create user
            'Teacher' => array('fields' => array('id', 'name')), //Teacher
            'CoursesRoom' => array('Room' => array('id', 'name')),
            'StudentsCourse', //Khoa hoc
            'Chapter' => array('fields' => array('id', 'name'))//Chuyen de
        );
        $khoa_da_dang_ky = $this->StudentsCourse->getEnrolledCourses($this->Auth->user('id'));
        $today = new DateTime();
        $conditions = array('NOT' => array('Course.id' => $khoa_da_dang_ky), 'Course.enrolling_expiry_date >=' => $today->format('Y-m-d H:i:s'));
        $course_fields = array('id', 'name', 'chapter_id', 'max_enroll_number', 'enrolling_expiry_date', 'register_student_number', 'session_number');
        $courses = $this->Course->find('all', array('conditions' => $conditions, 'contain' => $contain, 'fields' => $course_fields,));
        $fields = $this->Course->Chapter->Field->find('list');
        $chapters = $this->Course->Chapter->find('list');
        $this->set(compact('fields', 'chapters', 'courses'));
    }

    public function teacher_home() {
        $this->Session->write('layout', 'teacher');
        $this->layout = 'teacher';
    }

    public function manager_home() {
        $this->Session->write('layout', 'manager');
        $this->layout = 'manager';
    }

    public function fields_manager_home() {
        $this->Session->write('layout', 'fields_manager');
        $this->layout = 'fields_manager';
    }

    public function boss_home() {
        $this->Session->write('layout', 'boss');
        $this->layout = 'boss';
    }

    public function admin_home() {
        $this->Session->write('layout', 'admin');
        $this->layout = 'admin';
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

    public function contact(){
        
    }
}
