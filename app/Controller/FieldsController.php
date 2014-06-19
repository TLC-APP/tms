<?php

App::uses('AppController', 'Controller');

/**
 * Fields Controller
 *
 * @property Field $Field
 * @property PaginatorComponent $Paginator
 */
class FieldsController extends AppController {

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
    public function index() {
        $this->Field->recursive = 0;
        $this->set('fields', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Field->exists($id)) {
            throw new NotFoundException(__('Invalid field'));
        }
        $options = array('conditions' => array('Field.' . $this->Field->primaryKey => $id));
        $this->set('field', $this->Field->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Field->create();
            if ($this->Field->save($this->request->data)) {
                return $this->flash(__('The field has been saved.'), array('action' => 'index'));
            }
        }
        $manageUsers = $this->Field->ManageBy->find('list');
        $this->set(compact('fields', 'manageUsers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Field->exists($id)) {
            throw new NotFoundException(__('Invalid field'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Field->save($this->request->data)) {
                return $this->flash(__('The field has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Field.' . $this->Field->primaryKey => $id));
            $manageUsers = $this->Field->ManageBy->find('list');
            $this->set(compact('fields', 'manageUsers'));
            $this->request->data = $this->Field->find('first', $options);
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
        $this->Field->id = $id;
        if (!$this->Field->exists()) {
            throw new NotFoundException(__('Invalid field'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Field->delete()) {
            return $this->flash(__('The field has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The field could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

    /* Created by Nguyen Thai at 10h26 pm 10.06.2014 */

    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Field->create();
            if ($this->Field->save($this->request->data)) {
                return $this->flash(__('The field has been saved.'), array('action' => 'index'));
            }
        }
        $manageUsers = $this->Field->ManageBy->find('list');
        $this->set(compact('fields', 'manageUsers'));
    }

    public function manager_index() {
        $contain = array('CreatedUser' => array('fields' => array('id', 'name')), 'ManageBy' => array('fields' => array('id', 'name')));

        $this->Paginator->settings = array('contain' => $contain);
        $this->set('fields', $this->Paginator->paginate());
    }

}
