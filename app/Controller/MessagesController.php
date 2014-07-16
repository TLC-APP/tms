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

    public function getLastMessage($group_alias = 'student') {
        $group_id = $this->Message->CreatedUser->Group->getGroupIdByAlias($group_alias);
        $conditions = array('Message.published' => 1, 'Message.category_id' => $group_id);
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
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Message->recursive = 0;
        $this->set('messages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
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
    public function add() {
        if ($this->request->is('post')) {
            $this->Message->create();
            if ($this->Message->save($this->request->data)) {
                return $this->flash(__('The message has been saved.'), array('action' => 'index'));
            }
        }
        $createdUsers = $this->Message->CreatedUser->find('list');
        $categories = $this->Message->Category->find('list');
        $this->set(compact('createdUsers', 'categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Message->save($this->request->data)) {
                return $this->flash(__('The message has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $this->request->data = $this->Message->find('first', $options);
        }
        $createdUsers = $this->Message->CreatedUser->find('list');
        $categories = $this->Message->Category->find('list');
        $this->set(compact('createdUsers', 'categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Message->id = $id;
        if (!$this->Message->exists()) {
            throw new NotFoundException(__('Invalid message'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Message->delete()) {
            return $this->flash(__('The message has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The message could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    /**
     * manager_index method
     *
     * @return void
     */
    public function manager_index() {
        $this->Message->recursive = 0;
        $this->set('messages', $this->Paginator->paginate());
    }

    /**
     * manager_view method
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
     * manager_add method
     *
     * @return void
     */
    public function manager_add() {
        $loginId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Message->create();
            $this->request->data['Message']['created_user_id'] = $loginId;
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Đã thêm thông báo thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Thêm thông báo không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }
        $categories = $this->Message->Group->find('list');
        $this->set(compact('categories'));
    }

    public function manager_edit($id = null) {
        $loginId = $this->Auth->user('id');
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Message']['created_user_id'] = $loginId;
            if ($this->Message->save($this->request->data)) {
                $this->Session->setFlash('Cập nhật thông báo thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $this->request->data = $this->Message->find('first', $options);
        }
        $categories = $this->Message->Group->find('list');
        $this->set(compact('categories'));
    }
    
    /**
     * manager_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */


    /**
     * manager_delete method
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
            return $this->flash(__('The message has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The message could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

}
