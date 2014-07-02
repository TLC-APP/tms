<?php

App::uses('AppController', 'Controller');

/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'TinymceElfinder.TinymceElfinder');
    public $helpers = array('TinymceElfinder.TinymceElfinder');

    /**
     * index method
     *
     * @return void
     */
    public function manager_index() {
        $contain = array('User' => array('fields' => array('id', 'name')));
        $this->Paginator->settings = array('contain' => $contain);
        $this->set('messages', $this->Paginator->paginate());
    }

    public function getLastMessage() {
        $conditions = array('Message.published' => 1);
        $contain = array('User' => array('fields' => array('id', 'name')));
        $messages = $this->Message->find('all', array('conditions' => $conditions, 'contain' => $contain, 'limit' => 5));
        return $messages;
    }
    
    public function teacher_getLastMessage() {
        $conditions = array('Message.published' => 1);
        $contain = array('User' => array('fields' => array('id', 'name')));
        $messages = $this->Message->find('all', array('conditions' => $conditions, 'contain' => $contain, 'limit' => 5));
        return $messages;
    }
    
    public function student_getLastMessage() {
        $conditions = array('Message.published' => 1);
        $contain = array('User' => array('fields' => array('id', 'name')));
        $messages = $this->Message->find('all', array('conditions' => $conditions, 'contain' => $contain, 'limit' => 5));
        return $messages;
    }

    public function xem_thong_bao($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
        $this->set('message', $this->Message->find('first', $options));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
        $this->set('message', $this->Message->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Message->create();
            $this->request->data['Message']['created_user_id'] = $this->Auth->user('id');
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Đã thêm thông báo thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Thêm thông báo không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }
        $categories = $this->Message->Category->find('list');
        $this->set(compact('categories'));
    }

    public function manager_edit($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Cập nhật thông báo thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $this->request->data = $this->Message->find('first', $options);
        }
        $categories = $this->Message->Category->find('list');
        $this->set(compact('categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {
        $this->Message->id = $id;
        if (!$this->Message->exists()) {
            throw new NotFoundException(__('Invalid message'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Message->delete()) {
             $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                return $this->redirect(array('action' => 'index'));
        }
    }

}

