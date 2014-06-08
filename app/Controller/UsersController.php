<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash('Đăng nhập thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'), 'auth');
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                //$this->Session->setFlash('Tài khoản không đúng!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'), 'auth');
                /* Ket noi ldap kiem tra tai khoan */
                $username = $this->request->data['User']['username'];
                $password = $this->request->data['User']['password'];

                $user = $this->User->find('first', array('conditions' => array('User.username' => $username), 'recursive' => -1));
                App::uses('ldap', 'Lib');
                $ldap = new ldap();
                if (!empty($user)) {
                    /* Password khong hop le */

                    if ($ldap->auth($username, $password)) {
                        /* Tai khoan hop le tren LDAP */
                        /* Doi mat khau */
                        $user['User']['password'] = $password;
                        $this->User->id = $user['User']['id'];
                        $this->User->saveField('password', $password);
                        if ($this->Auth->login($user['User'])) {
                            $this->Session->setFlash('Đăng nhập thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'), 'auth');
                            return $this->redirect($this->Auth->redirectUrl());
                        } else {
                            $this->Session->setFlash('Cập nhật tài khoản thành không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                            return $this->redirect($this->Auth->redirectUrl());
                        }
                    } else {
                        $this->Session->setFlash('Tài khoản đăng nhập không đúng!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    }
                } else {
                    if ($ldap->auth($username, $password)) {
                        $ldap_user = $ldap->getInfo($username, $password);
                        $this->User->create();
                        $this->request->data['User']['name'] = $ldap_user['name'];
                        $this->request->data['User']['email'] = $ldap_user['email'];
                        $this->request->data['User']['activated'] = 1;
                        $this->request->data['Group']['0'] = $this->User->Group->getGroupIdByAlias('student');

                        if ($this->User->save($this->request->data)) {
                            $user = $this->User->find('first', array('conditions' => array('User.username' => $username), 'recursive' => -1));
                            if ($this->Auth->login($user['User'])) {
                                $this->Session->setFlash('Vui lòng cập nhật thông tin!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                                //$this->redirect(array())
                                return $this->redirect($this->Auth->redirectUrl());
                            }
                        } else {
                            $this->Session->setFlash('Không thể lưu thông tin User');
                        }
                    }
                }
            }
        }
    }

    public function logout() {
        $this->Session->delete('layout');
        $this->Session->delete('change_layout');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    public function view_as_student($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    public function student_profile($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'contain' => array('Department'));
        $this->set('user', $this->User->find('first', $options));
    }

    public function student_edit_profile($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            //debug($this->request->data);die;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Đã cập nhật thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'profile', $id, 'student' => true));
            } else {
                $this->Session->setFlash('Lỗi cập nhật hồ sơ!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $departments = $this->User->Department->find('list');
            $this->set('departments', $departments);
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /* Teacher */

    public function fields_manager_index() {
        $result = $this->User->getTeacherIdArray();
        $this->Paginator->settings = array(
            'recursive' => 0,
            'conditions' => array('User.id' => $result, 'User.created_user_id' => $this->Auth->user('id')));
        $this->set('users', $this->Paginator->paginate());
    }

    public function fields_manager_add() {
        if ($this->request->is('post')) {

            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                if (!isset($this->data['User']['user_group_id'])) {
                    $this->request->data['User']['Group'][0] = $this->User->Group->getGroupIdByAlias('teacher');
                }
                if (!EMAIL_VERIFICATION) {
                    $this->request->data['User']['email_verified'] = 1;
                }
                $ip = '';
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $this->request->data['User']['ip_address'] = $ip;
            }
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $userId = $this->User->getLastInsertID();
                $user = $this->User->findById($userId);
                if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
                    $this->User->sendRegistrationMail($user);
                }
                $this->Session->setFlash('Đã lưu tập huấn viên thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Có lỗi! Lưu không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }
        $hocHams = $this->User->HocHam->find('list');
        $hocVis = $this->User->HocVi->find('list');
        $this->set(compact('hocHams', 'hocVis'));
    }

    public function fields_manager_edit($id) {

        if (!$this->User->exists($id)) {
            throw new NotFoundException('Không tồn tại người này');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Đã lưu thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index_teacher'));
            } else {
                $this->Session->setFlash('Lưu không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $hocHams = $this->User->HocHam->find('list');
        $hocVis = $this->User->HocVi->find('list');
        $this->set(compact('groups', 'hocHams', 'hocVis'));
    }

    public function fields_manager_view($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    public function search_teacher() {
        $teacher = $this->User->getTeacherIdArray();
        $conditions = array('User.id' => $teacher);
        if (!empty($this->request->data['name'])) {
            $name = $this->request->data['name'];
            $conditions = Set::merge($conditions, array('User.name like' => "%{$name}%"));
        }
        $this->Paginator->settings = array('conditions' => $conditions, 'recursive' => 0);
        $this->set('users', $this->Paginator->paginate());
    }

    /* end teacher */

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            //debug($this->request->data);die;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function student_view_teacher($id = null) {

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $contain = array(
            'HocHam' => array('fields' => array('id', 'name')),
            'HocVi' => array('fields' => array('id', 'name')),
        );
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'contain' => $contain);
        $teacher = $this->User->find('first', $options);
        $this->set(compact('teacher'));
    }

}
