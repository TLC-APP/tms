<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CoursesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'TinymceElfinder.TinymceElfinder', 'Email');
    public $helpers = array('TinymceElfinder.TinymceElfinder', 'PhpExcel');

    //public $uses=array('Room');
    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function __sendMail($to, $subject, $message) {
        $email = new CakeEmail();
        $email->config('gmail');
        $email->to($to);
        $email->subject($subject);
        $email->send($message);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Course->recursive = 0;
        $this->set('courses', $this->Paginator->paginate());
    }

    public function new_courses() {
        if ($this->Auth->loggedIn()) {
            $user = $this->Course->User->find('first', array('contain' => array('Group'), 'conditions' => array('User.id' => $this->Auth->user('id'))));
            if (count($user['Group']) == 1) {
                return $this->redirect(array('controller' => 'dashboards', 'action' => $user['Group'][0]['alias'] . '_home'));
            }
            //$this->layout = 'group_select';
            $this->set('users', $user);
        }
        $contain = array(
            'User' => array('fields' => array('id', 'name')), //create user
            'Teacher' => array('fields' => array('id', 'name')), //Teacher
            'StudentsCourse', //Khoa hoc
            'Chapter'//Chuyen de
        );
        $conditions = array('Course.status' => COURSE_REGISTERING);
        $this->Paginator->settings = array('contain' => $contain, 'conditions' => $conditions);
        $fields = $this->Course->Chapter->Field->find('list');
        $chapters = $this->Course->Chapter->find('list');
        $this->set(compact('fields', 'chapters'));
        $this->set('courses', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    /*     * Student */

    public function student_view($id = null) {

        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $contain = array(
            'User' => array('fields' => array('id', 'name')),
            'CoursesRoom' => array('conditions' => array('CoursesRoom.start is not null'), 'order' => array('CoursesRoom.priority' => 'ASC')),
            'Teacher' => array('fields' => array('id', 'name', 'email', 'phone_number'), 'HocHam', 'HocVi'),
            'Chapter'
        );
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id), 'contain' => $contain);
        //$rooms = $this->Course->CoursesRoom->Room->find('list');
        $course = $this->Course->find('first', $options);
        $this->set(compact('course'));
    }

    /* ket thuc vung sinh vien */

    /*     * Fields manager */

    public function fields_manager_view($id = null) {

        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $contain = array(
            'User' => array('fields' => array('id', 'name')),
            //'CoursesRoom' => array('Room' => array('id', 'name'), 'conditions' => array('CoursesRoom.course_id' => $id, 'CoursesRoom.start is null')),
            'CoursesRoom' => array('Room' => array('id', 'name'), 'conditions' => array('CoursesRoom.course_id' => $id)),
            'Teacher' => array('fields' => array('id', 'name', 'email', 'phone_number'), 'HocHam', 'HocVi'),
            'Chapter' => array('Attachment'),
            'Attachment',
            'StudentsCourse' => array('Student' => array('fields' => array('id', 'name', 'email', 'phone_number')))
        );
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id), 'contain' => $contain);
        $rooms = $this->Course->CoursesRoom->Room->find('list');
        $course = $this->Course->find('first', $options);
        $this->set(compact('course', 'rooms'));
    }

    public function fields_manager_index($status = null) {

        $contain = array(
            'User' => array('fields' => array('id', 'name')),
            'Teacher' => array('fields' => array('id', 'name'),
            ), 'Chapter'
        );
        $conditions = array();
        if ($status) {
            $conditions = Set::merge($conditions, array('Course.status' => $status));
            $this->set('status', $status);
        }
        $this->Paginator->settings = array('contain' => $contain, 'conditions' => $conditions);
        $this->set('courses', $this->Paginator->paginate());
    }

    public function fields_manager_add() {

        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    public function fields_manager_edit($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array(
                    'Course.' . $this->Course->primaryKey => $id),
                'contain' => array(
                    'Chapter' => array('fields' => array('id', 'name')),
                    'Teacher' => array('fields' => array('id', 'name'))));
            $this->request->data = $this->Course->find('first', $options);
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    /*     * End Fields manager */

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Course->save($this->request->data)) {
                $this->Session->setFlash(__('The course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The course could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $chapters = $this->Course->Chapter->find('list');
        $teachers = $this->Course->Teacher->find('list');
        $this->set(compact('chapters', 'teachers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Course->field('status') != COURSE_CANCELLED) {
            $this->Session->setFlash('Khóa học này chưa hủy bạn không thể xóa được', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('action' => 'index'));
        }
        if ($this->Course->delete()) {
            $this->Session->setFlash(__('The course has been deleted.'));
        } else {
            $this->Session->setFlash(__('The course could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function huy($id) {
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException('Không tìm thấy khóa học này');
        }

        $this->request->onlyAllow('post');
        if ($this->Course->saveField('status', COURSE_CANCELLED)) {
            $this->Session->setFlash('Đã hủy khóa học thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            /* Gửi mail thông báo */
            $gui = Configure::read('SEND_MAIL_WHEN_CANCEL_COURSE');
            if ($gui) {
                $ten_khoa_hoc=$this->Course->field('name');
                $subject='Thông báo HỦY khóa học '.$ten_khoa_hoc;
                $message="Vì khóa học {$ten_khoa_hoc} không đủ điều kiện mở lớp nên đã bị hủy. Mọi thắc mắc xin liên hệ 102 để được giải đáp";
                $ds_sinh_vien = $this->Course->StudentsCourse->find('all', array('conditions' => array('StudentsCourse.course_id' => $id), 'contain' => array('Student' => array('id', 'name', 'email'))));
                foreach ($ds_sinh_vien as $sinh_vien) {
                    $to=$sinh_vien['Student']['email'];
                    $this->__sendMail($to, $subject, $message);
                }
            }
        } else {
            $this->Session->setFlash('Hủy không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect($this->referer());
    }

    public function uncancel($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException('Không tìm thấy khóa học này');
        }
        $this->request->onlyAllow('post');
        if ($this->Course->saveField('status', COURSE_REGISTERING)) {
            $this->Session->setFlash('Phục hồi khóa học thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Phục hồi không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect($this->referer());
    }

    public function publish() {
        
    }

    public function unpublish() {
        
    }

    public function attachment_list($id) {
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new Exception('Không tồn tại khóa học này');
        }
        $conditions = array('Attachment.model' => 'Course', 'Attachment.foreign_key' => $id);
        $attachments = $this->Course->Attachment->find('all', array('conditions' => $conditions, 'recursive' => -1));
        $this->set('attachments', $attachments);
    }

    public function upload($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new Exception('Không tồn tại khóa học này');
        }
        if (!empty($this->request->data)) {
            try {
                if ($this->Course->createWithAttachments($this->request->data)) {
                    echo json_encode(array('status' => 1, 'course_id' => $id));
                    die();
                } else {
                    echo json_encode(array('status' => 0));
                    die();
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
    }

    public function download($attachment_id) {
        $path = $this->Course->Attachment->getFilePath($attachment_id, 'attachment');

        $this->response->file(
                $path, array('download' => true, 'name' => $this->Course->Attachment->getFileName($attachment_id))
        );
        // Return response object to prevent controller from trying to render
        // a view
        return $this->response;
    }

    public function print_student($course_id) {
        if (!$this->Course->exists($course_id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $contain = array(
            'Teacher' => array('fields' => array('id', 'name', 'email', 'phone_number')),
            'Chapter' => array('fields' => array('id', 'name')),
            'StudentsCourse' => array(
                'Student' => array(
                    'fields' => array('id', 'name', 'phone_number', 'email', 'birthday', 'birthplace'),
                    'Department' => array('fields' => array('id', 'name')))
            ),
            'CoursesRoom' => array('fields' => array('id', 'title', 'start', 'end'), 'order' => array('CoursesRoom.priority' => 'ASC'))
        );
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $course_id), 'contain' => $contain);
        $this->set('course', $this->Course->find('first', $options));
    }

}
