<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * StudentsCourses Controller
 *
 * @property StudentsCourse $StudentsCourse
 * @property PaginatorComponent $Paginator
 */
class StudentsCoursesController extends AppController {

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
        $this->StudentsCourse->recursive = 0;
        $this->set('studentsCourses', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->StudentsCourse->exists($id)) {
            throw new NotFoundException(__('Invalid students course'));
        }
        $options = array('conditions' => array('StudentsCourse.' . $this->StudentsCourse->primaryKey => $id));
        $this->set('studentsCourse', $this->StudentsCourse->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->StudentsCourse->create();
            if ($this->StudentsCourse->save($this->request->data)) {
                $this->Session->setFlash(__('The students course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The students course could not be saved. Please, try again.'));
            }
        }
        $students = $this->StudentsCourse->Student->find('list');
        $courses = $this->StudentsCourse->Course->find('list');
        $this->set(compact('students', 'courses'));
    }

    public function __sendMail($to, $subject, $message) {
        $email = new CakeEmail();
        $email->config('gmail');
        $email->to($to);
        $email->subject($subject);
        $email->send($message);
    }

    public function register($course_id) {
        //Kiem tra khoa hoc co ton tai ko
        $this->StudentsCourse->Course->id = $course_id;
        $loggin_id = $this->Auth->user('id');
        if (!$this->StudentsCourse->Course->exists()) {
            throw new Exception('Không tồn tại khóa học.');
        }
        $conditions = array('StudentsCourse.student_id' => $loggin_id, 'StudentsCourse.course_id' => $course_id);

        $exist = $this->StudentsCourse->find('count', array('conditions' => $conditions, 'recursive' => -1));
        if ($exist > 0) {
            $this->Session->setFlash('Bạn đã đăng ký khóa học này rồi', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        }
        $data = array('student_id' => $loggin_id, 'course_id' => $course_id);
        if ($this->StudentsCourse->save($data)) {
            /* Gui mail thong bao da dang ky thanh cong */

            try {
                $gui_mail = Configure::read('SEND_MAIL_WHEN_ENROLLED_COURSE');
                if ($gui_mail) {
                    $subject = 'Thông báo đăng ký khóa học thành công!';
                    $message = 'Cảm ơn bạn đã tham gia khóa học ' . $this->StudentsCourse->Course->field('name');
                    $this->__sendMail($this->Auth->user('email'), $subject, $message);
                }
            } catch (Exception $exc) {
                $this->Session->setFlash('Gửi mail thông báo không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
            $this->Session->setFlash('Bạn đã đăng ký khóa học thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            return $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        } else {
            $this->Session->setFlash('Đăng ký khóa học thất bại!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->StudentsCourse->exists($id)) {
            throw new NotFoundException(__('Invalid students course'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->StudentsCourse->save($this->request->data)) {
                $this->Session->setFlash(__('The students course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The students course could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('StudentsCourse.' . $this->StudentsCourse->primaryKey => $id));
            $this->request->data = $this->StudentsCourse->find('first', $options);
        }
        $students = $this->StudentsCourse->Student->find('list');
        $courses = $this->StudentsCourse->Course->find('list');
        $this->set(compact('students', 'courses'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->StudentsCourse->id = $id;
        if (!$this->StudentsCourse->exists()) {
            throw new NotFoundException(__('Invalid students course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->StudentsCourse->delete()) {
            $this->Session->setFlash(__('The students course has been deleted.'));
        } else {
            $this->Session->setFlash(__('The students course could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function student_thongbao() {
        $contain = array(
            'Course' => array('fields' => array('id', 'name'))
        );
        $khoa_da_dang_ky = $this->StudentsCourse->getEnrolledCourses($this->Auth->user('id'));
        $conditions = array(array('Course.id' => $khoa_da_dang_ky));
        $courses_notification = $this->StudentsCourse->find('all', array('conditions' => $conditions, 'contain' => $contain));
        $this->set(compact('$courses_notification'));
        return $courses_notification;
    }

    public function canceled($course_id) {

        $this->StudentsCourse->course_id = $course_id;
        $loggin_id = $this->Auth->user('id');
        $today = new DateTime();
        $data = array('student_id' => $loggin_id, 'course_id' => $course_id, 'Course.enrolling_expiry_date >=' => $today->format('Y-m-d H:i:s'));
        $row = $this->StudentsCourse->find('first', array('conditions' => $data, 'fields' => array('id')));
        if ($this->StudentsCourse->delete($row['StudentsCourse']['id'])) {
            /** Gui mail thong bao */
            try {
                $gui_mail = Configure::read('SEND_MAIL_WHEN_CANCEL_COURSE');
                if ($gui_mail) {
                    $today = new DateTime();
                    $subject = 'Thông báo hủy khóa học thành công!';
                    $message = 'Bạn đã hủy khóa học ' . $this->StudentsCourse->Course->field('name') . ' thành công vào lúc ' . $today->format('H:i:s, d/m/Y');
                    $this->__sendMail($this->Auth->user('email'), $subject, $message);
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            $this->Session->setFlash('Bạn đã hủy khóa học thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            return $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        } else {
            $this->Session->setFlash('Hủy khóa học thất bại!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        }
    }

    public function student_courses_studying() {
        $contain = array('Course' => array('fields' => array('id', 'name', 'status'), 'Teacher' => array('id', 'name'), 'Chapter' => array('id', 'name')));
        $loggin_id = $this->Auth->user('id');
        $khoa_da_dang_ky = $this->StudentsCourse->getEnrolledCourses($loggin_id);
        $course_uncompleted = $this->StudentsCourse->Course->getCoursesUnCompleted();
        $course = array();
        if (!empty($khoa_da_dang_ky) && !empty($course_uncompleted)) {
            $course = array_intersect($khoa_da_dang_ky, $course_uncompleted);
        }

        $conditions = array('StudentsCourse.course_id' => $course);
        $fields = $this->StudentsCourse->Course->Chapter->Field->find('list');
        if ($this->request->is('ajax')) {
            $field_id = $this->request->data['field_name'];
            if (!empty($field_id)) {
                $chapter_id = $this->StudentsCourse->Course->Chapter->getChapterByField_id($field_id);
                $course_id = $this->StudentsCourse->Course->getCoursesByChapter_id($chapter_id);
                $course = array_intersect($khoa_da_dang_ky, $course_uncompleted, $course_id);
                $conditions = array('StudentsCourse.course_id' => $course);
            }
            $this->set(compact('fields'));
            $this->Paginator->settings = array('conditions' => $conditions, 'contain' => $contain);
            $this->set('courses_attended', $this->Paginator->paginate());
            $this->render('student_courses_studying_ajax');
        }
        $this->Paginator->settings = array('conditions' => $conditions, 'contain' => $contain);
        $this->set(compact('fields'));
        $this->set('courses_attended', $this->Paginator->paginate());
    }

    public function student_attended() {
        $loggin_id = $this->Auth->user('id');
        $khoa_da_dang_ky = $this->StudentsCourse->getEnrolledCourses($loggin_id);
        $fields = $this->StudentsCourse->Course->Chapter->Field->find('list');
        $course = array();
        $conditions = array();
        $contain = array('Course' => array('fields' => array('id', 'name', 'status'), 'Teacher' => array('id', 'name'), 'Chapter' => array('id', 'name')));
        $courses_attended = array();
        if (!empty($khoa_da_dang_ky)) {
            $course_completed = $this->StudentsCourse->Course->getCoursesCompleted();
            if (!empty($khoa_da_dang_ky) && !empty($course_completed)) {
                $course = array_intersect($khoa_da_dang_ky, $course_completed);
            }
            $conditions = array('StudentsCourse.course_id' => $course);

            if (!empty($this->request->data)) {
                $field_id = $this->request->data['field_name'];
                if (!empty($field_id)) {
                    $chapter_id = $this->StudentsCourse->Course->Chapter->getChapterByField_id($field_id);
                    $course_id = $this->StudentsCourse->Course->getCoursesByChapter_id($chapter_id);
                    $course = array_intersect($khoa_da_dang_ky, $course_completed, $course_id);
                    $conditions = array('StudentsCourse.course_id' => $course);
                }
            }

            $this->set(compact('fields'));
            $this->Paginator->settings = array('conditions' => $conditions, 'contain' => $contain);
            $courses_attended = $this->Paginator->paginate();
            $this->set('courses_attended', $courses_attended);
            if ($this->request->is('ajax')) {
                $this->render('student_courses_studying_ajax');
            }

            $this->set(compact('fields'));
            $this->Paginator->settings = array('conditions' => $conditions, 'contain' => $contain);
            $courses_attended = $this->Paginator->paginate();
            $this->set('courses_attended', $courses_attended);
            if ($this->request->is('ajax'))
                $this->render('student_courses_studying_ajax');
        } else {
            $this->set(compact('fields'));
            $this->set('courses_attended', $courses_attended);
        }
        $this->set(compact('fields'));
        $this->set('courses_attended', $courses_attended);
    }

}
