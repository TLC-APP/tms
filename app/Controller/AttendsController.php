<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Attends Controller
 *
 * @property Attend $Attend
 * @property PaginatorComponent $Paginator
 */
class AttendsController extends AppController {

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
        $this->Attend->recursive = 0;
        $this->set('attends', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Attend->exists($id)) {
            throw new NotFoundException(__('Invalid students course'));
        }
        $options = array('conditions' => array('Attend.' . $this->Attend->primaryKey => $id));
        $this->set('attend', $this->Attend->find('first', $options));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Attend->create();
            if ($this->Attend->save($this->request->data)) {
                $this->Session->setFlash(__('The students course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The students course could not be saved. Please, try again.'));
            }
        }
        $students = $this->Attend->Student->find('list');
        $courses = $this->Attend->Course->find('list');
        $this->set(compact('students', 'courses'));
    }

    public function __sendMail($to, $subject, $message) {
        $email = new CakeEmail();
        $email->config('gmail');
        $email->to($to);
        $email->subject($subject);
        $email->send($message);
    }

    public function manager_thong_ke_student($export = null) {
        Configure::write('debug', 0);
        $student_id_array = array();
        $course_id_array = array();
        $student_conditions = array();
        $course_conditions = array();
        $student_course_conditions = array();
        $chapter_id_array = array();
        if ($export) {
            $student_course_conditions = $this->Session->read('student_course_conditions');
            $attends = $this->Attend->find('all', array(
                'fields' => array('id', 'course_id', 'student_id', 'is_passed', 'created'),
                'conditions' => $student_course_conditions,
                'contain' => array('Course' => array(
                        'fields' => array('id', 'name', 'teacher_id', 'chapter_id', 'created', 'status'),
                        'Chapter' => array('Field' => array('id', 'name'), 'fields' => array('id', 'name')),
                        'Teacher' => array('fields' => array('id', 'name')),
                    ),
                    'Student' => array('fields' => array('id', 'name'), 'Department' => array('id', 'name'))),
            ));
            $this->set('attends', $attends);

            $this->render('xuat_excel_ds_student');
        } else {
            if (!empty($this->request->data)) {
                if (!empty($this->request->data['Student']['department_id'])) {
                    $student_conditions = Set::merge($student_course_conditions, array('Student.department_id' => $this->request->data['Student']['department_id']));
                    $students = $this->Attend->Student->find('all', array('conditions' => $student_conditions, 'recursive' => -1, 'fields' => array('id')));
                    $student_id_array = Set::merge($student_id_array, Set::classicExtract($students, '{n}.Student.id'));
                }
                if (!empty($this->request->data['Course']['chapter_id'])) {
                    $course_conditions = Set::merge($course_conditions, array('Course.chapter_id' => $this->request->data['Course']['chapter_id']));
                } else {
                    if (!empty($this->request->data['Course']['field_id'])) {
                        $chapter_id_array = Set::merge($chapter_id_array, $this->Attend->Course->Chapter->getChapterByField_id($this->request->data['Course']['field_id']));
                        $course_conditions = Set::merge($course_conditions, array('Course.chapter_id' => $chapter_id_array));
                    }
                }

                if (!empty($this->request->data['Course']['status'])) {
                    $course_conditions = Set::merge($course_conditions, array('Course.status' => $this->request->data['Course']['status']));
                }
                if (!empty($this->request->data['Course']['teacher_id'])) {
                    $course_conditions = Set::merge($course_conditions, array('Course.teacher_id' => $this->request->data['Course']['teacher_id']));
                }
                if (!empty($this->request->data['Course']['begin']) && !empty($this->request->data['Course']['end'])) {
                    $begin = new DateTime();
                    if ($begin->setDate($this->request->data['Course']['begin']['year'], $this->request->data['Course']['begin']['month'], $this->request->data['Course']['begin']['day'])) {
                        $course_conditions = Set::merge($course_conditions, array('Course.created >=' => $begin->format('Y-m-d 00:00:00')));
                        $end = new DateTime();
                        if ($end->setDate($this->request->data['Course']['end']['year'], $this->request->data['Course']['end']['month'], $this->request->data['Course']['end']['day'])) {
                            if ($begin > $end) {
                                return $this->Session->setFlash('Khoảng thống kê không hợp lệ, từ < đến', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                            } else {
                                $course_conditions = Set::merge($course_conditions, array('Course.created <=' => $end->format('Y-m-d 00:00:00')));
                            }
                        }
                    } else {

                        $end = new DateTime();
                        if ($end->setDate($this->request->data['Course']['end']['year'], $this->request->data['Course']['end']['month'], $this->request->data['Course']['end']['day'])) {

                            $course_conditions = Set::merge($course_conditions, array('Course.created <=' => $end->format('Y-m-d 00:00:00')));
                        }
                    }
                }
                $courses = $this->Attend->Course->find('all', array('conditions' => $course_conditions, 'recursive' => -1, 'fields' => array('id')));
                $course_id_array = Set::merge($course_id_array, Set::classicExtract($courses, '{n}.Course.id'));
                if (!empty($this->request->data['Attend']['is_passed'])) {
                    $student_course_conditions = Set::merge($student_course_conditions, array('Attend.is_passed' => $this->request->data['Attend']['is_passed']));
                }
                if (!empty($student_id_array)) {
                    $student_course_conditions = Set::merge($student_course_conditions, array('Attend.student_id' => $student_id_array));
                }
                if (!empty($course_id_array)) {
                    $student_course_conditions = Set::merge($student_course_conditions, array('Attend.course_id' => $course_id_array));
                }
                if ($this->Session->check('student_course_conditions')) {
                    $this->Session->delete('student_course_conditions');
                }
                $this->Session->write('student_course_conditions', $student_course_conditions);
                $attends = $this->Attend->find('all', array(
                    'fields' => array('id', 'course_id', 'student_id', 'is_passed', 'created'),
                    'conditions' => $student_course_conditions,
                    'contain' => array('Course' => array(
                            'fields' => array('id', 'name', 'teacher_id', 'chapter_id', 'created', 'status'),
                            'Chapter' => array('Field' => array('id', 'name'), 'fields' => array('id', 'name')),
                            'Teacher' => array('fields' => array('id', 'name')),
                        ),
                        'Student' => array('fields' => array('id', 'name'), 'Department' => array('id', 'name'))),
                ));
                $this->set('attends', $attends);

                $this->render('xuat_thong_ke_ds_student');
            }
            $departments = $this->Attend->Student->Department->find('list');
            $fields = $this->Course->Chapter->Field->find('list');
            $teacher_id_array = $this->Course->Teacher->getTeacherIdArray();
            $teachers = $this->Course->Teacher->find('list', array('conditions' => array('Teacher.id' => $teacher_id_array)));
            $this->set(compact('fields', 'teachers', 'fields', 'departments'));
        }
    }

    public function admin_thong_ke_student($export = null) {
        Configure::write('debug', 0);
        $student_id_array = array();
        $course_id_array = array();
        $student_conditions = array();
        $course_conditions = array();
        $student_course_conditions = array();
        $chapter_id_array = array();
        if ($export) {
            $student_course_conditions = $this->Session->read('student_course_conditions');
            $attends = $this->Attend->find('all', array(
                'fields' => array('id', 'course_id', 'student_id', 'is_passed', 'created'),
                'conditions' => $student_course_conditions,
                'contain' => array('Course' => array(
                        'fields' => array('id', 'name', 'teacher_id', 'chapter_id', 'created', 'status'),
                        'Chapter' => array('Field' => array('id', 'name'), 'fields' => array('id', 'name')),
                        'Teacher' => array('fields' => array('id', 'name')),
                    ),
                    'Student' => array('fields' => array('id', 'name'), 'Department' => array('id', 'name'))),
            ));
            $this->set('attends', $attends);

            $this->render('xuat_excel_ds_student');
        } else {
            if (!empty($this->request->data)) {
                if (!empty($this->request->data['Student']['department_id'])) {
                    $student_conditions = Set::merge($student_course_conditions, array('Student.department_id' => $this->request->data['Student']['department_id']));
                    $students = $this->Attend->Student->find('all', array('conditions' => $student_conditions, 'recursive' => -1, 'fields' => array('id')));
                    $student_id_array = Set::merge($student_id_array, Set::classicExtract($students, '{n}.Student.id'));
                }
                if (!empty($this->request->data['Course']['chapter_id'])) {
                    $course_conditions = Set::merge($course_conditions, array('Course.chapter_id' => $this->request->data['Course']['chapter_id']));
                } else {
                    if (!empty($this->request->data['Course']['field_id'])) {
                        $chapter_id_array = Set::merge($chapter_id_array, $this->Attend->Course->Chapter->getChapterByField_id($this->request->data['Course']['field_id']));
                        $course_conditions = Set::merge($course_conditions, array('Course.chapter_id' => $chapter_id_array));
                    }
                }

                if (!empty($this->request->data['Course']['status'])) {
                    $course_conditions = Set::merge($course_conditions, array('Course.status' => $this->request->data['Course']['status']));
                }
                if (!empty($this->request->data['Course']['teacher_id'])) {
                    $course_conditions = Set::merge($course_conditions, array('Course.teacher_id' => $this->request->data['Course']['teacher_id']));
                }
                if (!empty($this->request->data['Course']['begin']) && !empty($this->request->data['Course']['end'])) {
                    $begin = new DateTime();
                    if ($begin->setDate($this->request->data['Course']['begin']['year'], $this->request->data['Course']['begin']['month'], $this->request->data['Course']['begin']['day'])) {
                        $course_conditions = Set::merge($course_conditions, array('Course.created >=' => $begin->format('Y-m-d 00:00:00')));
                        $end = new DateTime();
                        if ($end->setDate($this->request->data['Course']['end']['year'], $this->request->data['Course']['end']['month'], $this->request->data['Course']['end']['day'])) {
                            if ($begin > $end) {
                                return $this->Session->setFlash('Khoảng thống kê không hợp lệ, từ < đến', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                            } else {
                                $course_conditions = Set::merge($course_conditions, array('Course.created <=' => $end->format('Y-m-d 00:00:00')));
                            }
                        }
                    } else {

                        $end = new DateTime();
                        if ($end->setDate($this->request->data['Course']['end']['year'], $this->request->data['Course']['end']['month'], $this->request->data['Course']['end']['day'])) {

                            $course_conditions = Set::merge($course_conditions, array('Course.created <=' => $end->format('Y-m-d 00:00:00')));
                        }
                    }
                }
                $courses = $this->Attend->Course->find('all', array('conditions' => $course_conditions, 'recursive' => -1, 'fields' => array('id')));
                $course_id_array = Set::merge($course_id_array, Set::classicExtract($courses, '{n}.Course.id'));
                if (!empty($this->request->data['Attend']['is_passed'])) {
                    $student_course_conditions = Set::merge($student_course_conditions, array('Attend.is_passed' => $this->request->data['Attend']['is_passed']));
                }
                if (!empty($student_id_array)) {
                    $student_course_conditions = Set::merge($student_course_conditions, array('Attend.student_id' => $student_id_array));
                }
                if (!empty($course_id_array)) {
                    $student_course_conditions = Set::merge($student_course_conditions, array('Attend.course_id' => $course_id_array));
                }
                if ($this->Session->check('student_course_conditions')) {
                    $this->Session->delete('student_course_conditions');
                }
                $this->Session->write('student_course_conditions', $student_course_conditions);
                $attends = $this->Attend->find('all', array(
                    'fields' => array('id', 'course_id', 'student_id', 'is_passed', 'created'),
                    'conditions' => $student_course_conditions,
                    'contain' => array('Course' => array(
                            'fields' => array('id', 'name', 'teacher_id', 'chapter_id', 'created', 'status'),
                            'Chapter' => array('Field' => array('id', 'name'), 'fields' => array('id', 'name')),
                            'Teacher' => array('fields' => array('id', 'name')),
                        ),
                        'Student' => array('fields' => array('id', 'name'), 'Department' => array('id', 'name'))),
                ));
                $this->set('attends', $attends);

                $this->render('xuat_thong_ke_ds_student');
            }
            $departments = $this->Attend->Student->Department->find('list');
            $fields = $this->Course->Chapter->Field->find('list');
            $teacher_id_array = $this->Course->Teacher->getTeacherIdArray();
            $teachers = $this->Course->Teacher->find('list', array('conditions' => array('Teacher.id' => $teacher_id_array)));
            $this->set(compact('fields', 'teachers', 'fields', 'departments'));
        }
    }

    public function register($course_id) {
        //Kiem tra khoa hoc co ton tai ko
        $this->Attend->Course->id = $course_id;
        $loggin_id = $this->Auth->user('id');
        if (!$this->Attend->Course->exists()) {
            throw new Exception('Không tồn tại khóa học.');
        }
        $conditions = array('Attend.student_id' => $loggin_id, 'Attend.course_id' => $course_id);

        $exist = $this->Attend->find('count', array('conditions' => $conditions, 'recursive' => -1));
        if ($exist > 0) {
            $this->Session->setFlash('Bạn đã đăng ký khóa học này rồi', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('student' => true, 'controller' => 'dashboards', 'action' => 'home'));
        }
        $data = array('student_id' => $loggin_id, 'course_id' => $course_id);
        if ($this->Attend->save($data)) {
            /* Gui mail thong bao da dang ky thanh cong */

            try {
                $gui_mail = Configure::read('SEND_MAIL_WHEN_ENROLLED_COURSE');
                if ($gui_mail) {
                    $subject = 'Thông báo đăng ký khóa học thành công!';
                    $message = 'Cảm ơn bạn đã tham gia khóa học ' . $this->Attend->Course->field('name');
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
        if (!$this->Attend->exists($id)) {
            throw new NotFoundException(__('Invalid students course'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Attend->save($this->request->data)) {
                $this->Session->setFlash(__('The students course has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The students course could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Attend.' . $this->Attend->primaryKey => $id));
            $this->request->data = $this->Attend->find('first', $options);
        }
        $students = $this->Attend->Student->find('list');
        $courses = $this->Attend->Course->find('list');
        $this->set(compact('students', 'courses'));
    }

    public function manager_delete($id = null) {
        $this->Attend->id = $id;
        if (!$this->Attend->exists()) {
            throw new NotFoundException(__('Invalid students course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Attend->delete()) {
            $this->Session->setFlash('Hủy đăng ký thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Hủy đăng ký không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect($this->request->referer());
    }
public function admin_delete($id = null) {
        $this->Attend->id = $id;
        if (!$this->Attend->exists()) {
            throw new NotFoundException(__('Invalid students course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Attend->delete()) {
            $this->Session->setFlash('Hủy đăng ký thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Hủy đăng ký không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect($this->request->referer());
    }
    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Attend->id = $id;
        if (!$this->Attend->exists()) {
            throw new NotFoundException(__('Invalid students course'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Attend->delete()) {
            $this->Session->setFlash('Hủy đăng ký thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        } else {
            $this->Session->setFlash('Hủy đăng ký không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect($this->request->referer());
    }

    public function student_thongbao() {
        $contain = array(
            'Course' => array('fields' => array('id', 'name'))
        );
        $khoa_da_dang_ky = $this->Attend->getEnrolledCourses($this->Auth->user('id'));
        $conditions = array('Course.id' => $khoa_da_dang_ky, 'Course.status' => COURSE_COMPLETED);
        $courses_notification = $this->Attend->find('all', array('conditions' => $conditions, 'contain' => $contain));
        $this->set(compact('$courses_notification'));
        return $courses_notification;
    }

    public function canceled($course_id) {

        $this->Attend->course_id = $course_id;
        $loggin_id = $this->Auth->user('id');
        $today = new DateTime();
        $data = array('student_id' => $loggin_id, 'course_id' => $course_id, 'Course.enrolling_expiry_date >=' => $today->format('Y-m-d H:i:s'));
        $row = $this->Attend->find('first', array('conditions' => $data, 'fields' => array('id')));
        if ($this->Attend->delete($row['Attend']['id'])) {
            /** Gui mail thong bao */
            try {
                $gui_mail = Configure::read('SEND_MAIL_WHEN_CANCEL_COURSE');
                if ($gui_mail) {
                    $today = new DateTime();
                    $subject = 'Thông báo hủy khóa học thành công!';
                    $message = 'Bạn đã hủy khóa học ' . $this->Attend->Course->field('name') . ' thành công vào lúc ' . $today->format('H:i:s, d/m/Y');
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

    public function manager_recieve($student_course_id = null) {
        $this->Attend->id = $student_course_id;
        if (!$this->Attend->exists()) {
            throw new Exception('Không tồn tại dòng dữ liệu này');
        }
        $this->request->accepts('post');
        $recieved = $this->Attend->field('is_recieved');
        $recieve_date = $this->Attend->field('recieve_date');
        if ($recieved) {
            $this->Session->setFlash('Học viên đã nhận bằng rồi vào ngày ' . $recieve_date);
            $this->redirect($this->request->referer());
        }
        if ($this->Attend->saveField('is_recieved', 1)) {
            $this->Attend->saveField('recieve_date', date('Y-m-d H:i:s'));
            $this->Session->setFlash('Học viên đã nhận bằng thành công vào lúc' . $this->Attend->field('recieve_date'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            $this->redirect($this->request->referer());
        }
    }

    public function manager_cancel_recieve($student_course_id = null) {
        $this->Attend->id = $student_course_id;
        if (!$this->Attend->exists()) {
            throw new Exception('Không tồn tại dòng dữ liệu này');
        }
        $this->request->accepts('post');
        $recieved = $this->Attend->field('is_recieved');
        if (!$recieved) {
            $this->Session->setFlash('Học viên vẫn chưa nhận bằng ');
            $this->redirect($this->request->referer());
        }
        if ($this->Attend->saveField('is_recieved', 0)) {
            $this->Attend->saveField('recieve_date', NULL);
            $this->Session->setFlash('Hủy nhận bằng thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));

            $this->redirect($this->request->referer());
        }
    }

    public function student_courses_studying() {
        $loggin_id = $this->Auth->user('id');
        $khoa_da_dang_ky = $this->Attend->getEnrolledCourses($loggin_id);
        $fields = $this->Attend->Course->Chapter->Field->find('list');
        $course = array();
        $conditions = array();
        $contain = array('Course' => array('fields' => array('id', 'name', 'status', 'session_number'), 'Teacher' => array('id', 'name'), 'Chapter' => array('id', 'name')));
        $courses_studying = array();
        if (!empty($khoa_da_dang_ky)) {
            $course_uncompleted = $this->Attend->Course->getCoursesUnCompleted();
            if (!empty($khoa_da_dang_ky) && !empty($course_uncompleted)) {
                $course = array_intersect($khoa_da_dang_ky, $course_uncompleted);
            }
            $conditions = array('Attend.course_id' => $course, 'Attend.student_id' => $loggin_id);
            if (!empty($this->request->data)) {
                $field_id = $this->request->data['field_name'];
                if (!empty($field_id)) {
                    $chapter_id = $this->Attend->Course->Chapter->getChapterByField_id($field_id);
                    $course_id = $this->Attend->Course->getCoursesByChapter_id($chapter_id);
                    $course = array_intersect($khoa_da_dang_ky, $course_uncompleted, $course_id);
                    $conditions = array('Attend.course_id' => $course, 'Attend.student_id' => $loggin_id);
                }
            }
            $this->set(compact('fields'));
            $courses_studying = $this->Attend->find('all', array('conditions' => $conditions, 'contain' => $contain));
            $this->set('courses_studying', $courses_studying);
            if ($this->request->is('ajax')) {
                $this->render('student_courses_studying_ajax');
            }
            $this->set(compact('fields'));
            $courses_studying = $this->Attend->find('all', array('conditions' => $conditions, 'contain' => $contain));
            $this->set('courses_studying', $courses_studying);
        } else {
            $this->set(compact('fields'));
            $this->set('courses_studying', $courses_studying);
        }
        if ($this->request->is('ajax'))
            $this->render('student_courses_studying_ajax');
        $this->set(compact('fields'));
        $this->set('courses_studying', $courses_studying);
    }

    public function student_attended() {
        $loggin_id = $this->Auth->user('id');
        $khoa_da_dang_ky = $this->Attend->getEnrolledCourses($loggin_id);
        $fields = $this->Attend->Course->Chapter->Field->find('list');
        $course = array();
        $conditions = array();
        $contain = array('Course' => array('fields' => array('id', 'name', 'status'), 'Teacher' => array('id', 'name'), 'Chapter' => array('id', 'name')));
        $courses_attended = array();
        if (!empty($khoa_da_dang_ky)) {
            $course_completed = $this->Attend->Course->getCoursesCompleted();
            if (!empty($khoa_da_dang_ky) && !empty($course_completed)) {
                $course = array_intersect($khoa_da_dang_ky, $course_completed);
            }
            $conditions = array('Attend.course_id' => $course, 'Attend.student_id' => $loggin_id);
            if (!empty($this->request->data)) {
                $field_id = $this->request->data['field_name'];
                if (!empty($field_id)) {
                    $chapter_id = $this->Attend->Course->Chapter->getChapterByField_id($field_id);
                    $course_id = $this->Attend->Course->getCoursesByChapter_id($chapter_id);
                    $course = array_intersect($khoa_da_dang_ky, $course_completed, $course_id);
                    $conditions = array('Attend.course_id' => $course, 'Attend.student_id' => $loggin_id);
                }
            }
            $this->set(compact('fields'));
            $courses_attended = $this->Attend->find('all', array('conditions' => $conditions, 'contain' => $contain));
            $this->set('courses_attended', $courses_attended);
            if ($this->request->is('ajax')) {
                $this->render('student_attended_ajax');
            }
            $this->set(compact('fields'));
            $courses_attended = $this->Attend->find('all', array('conditions' => $conditions, 'contain' => $contain));
            $this->set('courses_attended', $courses_attended);
        } else {
            $this->set(compact('fields'));
            $this->set('courses_attended', $courses_attended);
        }
        if ($this->request->is('ajax'))
            $this->render('student_attended_ajax');
        $this->set(compact('fields'));
        $this->set('courses_attended', $courses_attended);
    }

}
