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
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
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
        $createdUsers = $this->Message->User->find('list');
        $this->set(compact('createdUsers'));
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
        $this->set(compact('createdUsers'));
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

}
