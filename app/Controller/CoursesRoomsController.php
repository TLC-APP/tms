<?php

App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * CoursesRooms Controller
 *
 * @property CoursesRoom $CoursesRoom
 * @property PaginatorComponent $Paginator
 */
class CoursesRoomsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $course_id = ($this->request->query['course_id']);

        $conditions = array();
        if ($course_id) {
            $conditions = Set::merge($conditions, array('CoursesRoom.course_id' => $course_id, 'CoursesRoom.start is not null'));
        }
        $contain = array('Room' => array('fields' => array('id', 'name')));
        $options = array('conditions' => $conditions, 'contain' => $contain);
        $buois = $this->CoursesRoom->find('all', $options);
        $result = Set::classicExtract($buois, '{n}.CoursesRoom');
        $this->set(array(
            'result' => $result,
            '_serialize' => 'result'
        ));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->CoursesRoom->exists($id)) {
            throw new NotFoundException(__('Invalid courses room'));
        }
        $options = array('conditions' => array('CoursesRoom.' . $this->CoursesRoom->primaryKey => $id));

        $this->set('coursesRoom', $this->CoursesRoom->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!empty($this->request->data)) {
            $this->request->data['CoursesRoom']['created_user_id'] = $this->Auth->user('id');          
            
            if ($this->CoursesRoom->save($this->request->data)) {
                $this->CoursesRoom->Room->id = $this->CoursesRoom->field('room_id');
                $room_name = $this->CoursesRoom->Room->field('name');
                if ($this->request->is('ajax')) {
                    $response = array(
                        'status' => 1,
                        'id' => $this->CoursesRoom->id,
                        'title' => $this->CoursesRoom->field('title'),
                        'priority' => $this->CoursesRoom->field('priority'),
                        'currColor' => $this->CoursesRoom->field('color'),
                        'room_id' => $this->CoursesRoom->field('room_id'),
                        'room' => $room_name
                    );
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Đã lưu thành công!');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                /* Yeu cau bang ajax */
                if ($this->RequestHandler->isAjax()) {
                    $error_text = '';
                    foreach ($this->CoursesRoom->invalidFields() as $key => $value) {
                        $error_text .='<br/>' . $value[0];
                    }
                    $response = array('status' => 0, 'message' => $error_text);

                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Lưu không thành công');
                }
            }
        }
        $courses = $this->CoursesRoom->Course->find('list');
        $rooms = $this->CoursesRoom->Room->find('list');
        $this->set(compact('courses', 'rooms'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->CoursesRoom->exists($id)) {
            throw new NotFoundException(__('Invalid courses room'));
        }
        if (!empty($this->request->data)) {
            $this->CoursesRoom->id = $id;
            if ($this->CoursesRoom->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array(
                        'status' => 1
                    );
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Đã lưu thành công!');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                /* Yeu cau bang ajax */
                if ($this->RequestHandler->isAjax()) {
                    $error_text = '';
                    foreach ($this->CoursesRoom->invalidFields() as $key => $value) {
                        $error_text .='<br/>' . $key . ':' . $value;
                    }
                    $response = array('status' => 0, 'message' => $error_text);
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Lưu không thành công');
                }
            }
        }
    }

    public function eventResize($id) {
        $this->layout = 'ajax';
        $format = 'Y-m-d H:i:s';

        $this->request->accepts('ajax');
        if (!empty($this->request->data['minuteDelta']) && $this->request->data['minuteDelta'] != 0) {
            $minuteDelta = $this->request->data['minuteDelta'];
            $this->CoursesRoom->id = $id;
            $db_end_date = new DateTime($this->CoursesRoom->field('end'));
            if ($minuteDelta > 0) {
                $db_end_date->modify('+ ' . abs($minuteDelta) . ' minutes');
            } else {
                $db_end_date->modify('- ' . abs($minuteDelta) . ' minutes');
            }
            $end = date('Y-m-d H:i:s', strtotime($db_end_date->format($format)));
            if ($this->CoursesRoom->saveField('end', $end)) {
                $this->layout = 'ajax';
                $response = array('status' => 1, 'message' => 'Thành công!');
            } else {
                $error_text = '';
                foreach ($this->CoursesRoom->invalidFields() as $key => $value) {
                    $error_text .='<br/>' . $key . ':' . $value;
                }
                $response = array('status' => 0, 'message' => $error_text);
            }
            $this->set('response', $response);
        }
    }

    public function cap_nhat_buoi($id) {
        /* Yeu cau bang ajax */
        $this->layout = 'ajax';
        if (!$this->CoursesRoom->exists($id)) {
            throw new NotFoundException(__('Invalid courses room'));
        }
        
        if (!empty($this->request->data)) {
            $this->CoursesRoom->id = $id;
            
            $course_id=$this->CoursesRoom->field('course_id');
            $this->CoursesRoom->Course->id=$course_id;
            $expired_date=new DateTime($this->CoursesRoom->Course->field('enrolling_expiry_date'));
            $buoi_bat_dau=new DateTime($this->request->data['start']);
            
            if($buoi_bat_dau<$expired_date){
                $response = array('status' => 0, 'message' => 'Thời gian của buổi phải sau ngày hết hạn đăng ký');
                echo json_encode($response);die;
            }
            $this->request->data['CoursesRoom']['start'] = date('Y-m-d H:i:s', strtotime($this->request->data['start']));
            
            $this->request->data['CoursesRoom']['end'] = date('Y-m-d H:i:s', strtotime($this->request->data['end']));
            
            /*
              if (!empty($this->request->data['start'])) {
              $format = 'Y-m-d H:i:s';
              $end = $this->request->data['start'];
              $dbstart = $this->CoursesRoom->field('start');

              if (!empty($dbstart)) {
              $dbstart = new DateTime($dbstart);
              $db_start_hours = $dbstart->format('H');
              $db_start_minute = $dbstart->format('i');
              $request_start_date = new DateTime($this->request->data['start']);
              date_time_set($request_start_date, $db_start_hours, $db_start_minute);
              $this->request->data['CoursesRoom']['start'] = date($format, strtotime(date_format($request_start_date, $format)));
              } else {
              $this->request->data['start'] = date('Y-m-d H:i:s', strtotime($this->request->data['start']));
              }

              $dbend = $this->CoursesRoom->field('end');
              if (!empty($dbend)) {
              $dbend = new DateTime($dbend);
              $db_end_hours = $dbend->format('H');
              $db_end_minute = $dbend->format('i');
              $request_end_date = new DateTime($this->request->data['start']);
              date_time_set($request_end_date, $db_end_hours, $db_end_minute);
              $this->request->data['CoursesRoom']['end'] = date('Y-m-d H:i:s', strtotime(date_format($request_end_date, $format)));
              } else {
              $this->request->data['end'] = date('Y-m-d H:i:s', strtotime($end . ' +' . THOI_GIAN_MOT_BUOI_HOC . ' hours'));
              }
              }
             */
            if ($this->CoursesRoom->save($this->request->data)) {
                $this->layout = 'ajax';
                $response = array('status' => 1, 'message' => 'Thành công!');
                $this->set('response', $response);
            } else {


                $error_text = '';
                foreach ($this->CoursesRoom->invalidFields() as $key => $value) {
                    $error_text .='<br/>' . $key . ':' . $value;
                }
                $response = array('status' => 0, 'message' => $error_text);
                $this->set('response', $response);
            }
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->CoursesRoom->id = $id;
        if (!$this->CoursesRoom->exists()) {
            throw new NotFoundException(__('Invalid courses room'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->CoursesRoom->delete()) {
            $this->Session->setFlash(__('The courses room has been deleted.'));
        } else {
            $this->Session->setFlash(__('The courses room could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function removeEvent($id = null) {
        $this->layout = 'ajax';
        $this->CoursesRoom->id = $id;
        if (!$this->CoursesRoom->exists()) {
            throw new NotFoundException('Không tồn tại buổi học này');
        }
        $this->request->onlyAllow('ajax');
        if ($this->CoursesRoom->delete()) {
            $response = array('success' => 1);
        } else {
            $response = array('success' => 0);
        }
        $this->set('response', $response);
    }

    public function student_lich_homnay() {
        $contain = array(
            'Course' => array('Chapter' => array('id', 'name'), 'Teacher' => array('id', 'name')),
            'Room' => array('id', 'name')
        );
        $khoa_da_dang_ky = $this->CoursesRoom->Course->Attend->getEnrolledCourses($this->Auth->user('id'));
        $today = new DateTime();
        $batdau = CakeTime::daysAsSql($today, $today, 'CoursesRoom.start');
        $conditions = array(array('Course.id' => $khoa_da_dang_ky), $batdau);
        $courses_today = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain));
        $this->set(compact('courses_today'));
        return $courses_today;
    }

    public function teacher_lich_homnay() {
        $contain = array(
            'Course' => array('Chapter' => array('id', 'name'), 'Teacher' => array('id', 'name')),
            'Room' => array('id', 'name')
        );
        $teacher_id = $this->Auth->user('id');
        $today = new DateTime();
        $batdau = CakeTime::daysAsSql($today, $today, 'CoursesRoom.start');
        $conditions = array('Course.teacher_id' => $teacher_id, 'Course.status' => COURSE_UNCOMPLETED, $batdau);
        $teacher_courses_today = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain));
        $this->set(compact('teacher_courses_today'));
        return $teacher_courses_today;
    }

    public function teacher_sap_to_chuc() {
        $fields = $this->CoursesRoom->Course->Chapter->Field->find('list');
        $course_start = $this->CoursesRoom->course_near_attend();
        $teacher_id = $this->Auth->user('id');
        $today = new DateTime();
        $contain = array('Course' => array('Chapter' => array('id', 'name'), 'Teacher' => array('id', 'name')), 'Room' => array('id', 'name'));
        $conditions = array('Course.teacher_id' => $teacher_id,
            'Course.status' => COURSE_UNCOMPLETED,
            'Course.enrolling_expiry_date <' => $today->format('Y-m-d H:i:s'),
            'NOT' => array('Course.id' => $course_start),
        );
        if ($this->request->is('ajax')) {
            $field_id = $this->request->data['field_name'];
            if ($field_id == '') {
                $teacher_courses = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id')));
            } else {
                $chapter_id = $this->CoursesRoom->Course->Chapter->getChapterByField_id($field_id);
                $course_id = $this->CoursesRoom->Course->getCoursesByChapter_id($chapter_id);
                $conditions = array('Course.teacher_id' => $teacher_id,
                    'Course.status' => COURSE_UNCOMPLETED,
                    'Course.enrolling_expiry_date <' => $today->format('Y-m-d H:i:s'),
                    'NOT' => array('Course.id' => $course_start),
                    'Course.id' => $course_id,
                );
                $teacher_courses = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id')));
            }
            $this->set('teacher_courses', $teacher_courses);
            $this->render('teacher_sap_to_chuc_ajax');
        } else {
            $teacher_courses = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id')));
            $this->set('teacher_courses', $teacher_courses);
        }
        $this->set(compact('fields'));
    }

    public function teacher_da_tap_huan() {
        $fields = $this->CoursesRoom->Course->Chapter->Field->find('list');
        $course_end = $this->CoursesRoom->course_attend();
        $teacher_id = $this->Auth->user('id');
        $contain = array('Course' => array('Chapter' => array('id', 'name'), 'Teacher' => array('id', 'name')), 'Room' => array('id', 'name'));
        $conditions = array('Course.teacher_id' => $teacher_id,
            'Course.status' => COURSE_COMPLETED,
            'NOT' => array('Course.id' => $course_end),
        );
        if ($this->request->is('ajax')) {
            $field_id = $this->request->data['field_name'];
            if ($field_id == '') {
                $teacher_courses_completed = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id'),));
            } else {
                $chapter_id = $this->CoursesRoom->Course->Chapter->getChapterByField_id($field_id);
                $course_id = $this->CoursesRoom->Course->getCoursesByChapter_id($chapter_id);
                $conditions = array('Course.teacher_id' => $teacher_id,
                    'Course.status' => COURSE_COMPLETED,
                    'NOT' => array('Course.id' => $course_end),
                    'Course.id' => $course_id,
                );
                $teacher_courses_completed = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id'),));
            }
            $this->set('teacher_courses_completed', $teacher_courses_completed);
            $this->render('teacher_da_tap_huan_ajax');
        } else {
            $teacher_courses_completed = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain, 'group' => array('CoursesRoom.course_id'),));
            $this->set('teacher_courses_completed', $teacher_courses_completed);
        }
        $this->set(compact('fields'));
    }

    public function guest_lich_homnay() {
        $contain = array(
            'Course' => array('Chapter' => array('id', 'name'), 'Teacher' => array('id', 'name')),
            'Room' => array('id', 'name')
        );
        $today = new DateTime();
        $batdau = CakeTime::daysAsSql($today, $today, 'CoursesRoom.start');
        $conditions = array('Course.status' => COURSE_UNCOMPLETED, $batdau);
        $teacher_courses_today = $this->CoursesRoom->find('all', array('conditions' => $conditions, 'contain' => $contain));
        $this->set(compact('teacher_courses_today'));
        return $teacher_courses_today;
    }

}
