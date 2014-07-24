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
                $this->Session->setFlash('Cập nhật lĩnh vực thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Field.' . $this->Field->primaryKey => $id), 'recursive' => -1);
            $this->request->data = $this->Field->find('first', $options);
        }
        $managers = $this->Field->ManageBy->getFieldsManagerIdArray();
        $manageUsers = $this->Field->ManageBy->find('list', array('conditions' => array('ManageBy.id' => $managers)));
        $this->set(compact('manageUsers'));
    }

    public function admin_edit($id = null) {
        if (!$this->Field->exists($id)) {
            throw new NotFoundException(__('Invalid field'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Field->save($this->request->data)) {
                $this->Session->setFlash('Cập nhật lĩnh vực thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Field.' . $this->Field->primaryKey => $id), 'recursive' => -1);
            $this->request->data = $this->Field->find('first', $options);
        }
        $managers=  $this->Field->ManageBy->getFieldsManagerIdArray();
        $manageUsers = $this->Field->ManageBy->find('list',array('conditions'=>array('ManageBy.id'=>$managers)));
        $this->set(compact('manageUsers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {
        $this->Field->id = $id;
        if (!$this->Field->exists()) {
            throw new NotFoundException(__('Invalid field'));
        }

        $this->request->onlyAllow('post', 'delete');
        $chapter_number = $this->Field->field('chapter_number');
        if ($chapter_number > 0) {
            $this->Session->setFlash('Có ' . $chapter_number . ' chuyên đề thuộc lĩnh vực này! Bạn không thể xóa!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            $this->redirect($this->request->referer());
        }
        if ($this->Field->delete()) {
            $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_delete($id = null) {
        $this->Field->id = $id;
        if (!$this->Field->exists()) {
            throw new NotFoundException(__('Invalid field'));
        }
        $this->request->onlyAllow('post', 'delete');
        $chapter_number = $this->Field->field('chapter_number');
        if ($chapter_number > 0) {
            $this->Session->setFlash('Có ' . $chapter_number . ' chuyên đề thuộc lĩnh vực này! Bạn không thể xóa!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            $this->redirect($this->request->referer());
        }
        if ($this->Field->delete()) {
            $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('action' => 'index'));
        }
    }

    /* Created by Nguyen Thai at 10h26 pm 10.06.2014 */

    public function manager_add() {
        $loginId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Field->create();
            $this->request->data['Field']['created_user_id'] = $loginId;
            if ($this->Field->save($this->request->data)) {
                $this->Session->setFlash('Thêm lĩnh vực thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        $managers = $this->Field->ManageBy->getFieldsManagerIdArray();
        $manageUsers = $this->Field->ManageBy->find('list', array('conditions' => array('ManageBy.id' => $managers)));
        $this->set(compact('fields', 'manageUsers'));
    }

    public function admin_add() {
        $loginId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Field->create();
            $this->request->data['Field']['created_user_id'] = $loginId;
            if ($this->Field->save($this->request->data)) {
                $this->Session->setFlash('Thêm lĩnh vực thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        $managers = $this->Field->ManageBy->getFieldsManagerIdArray();
        //debug($managers);
        $manageUsers = $this->Field->ManageBy->find('list', array('conditions' => array('ManageBy.id' => $managers)));
        //debug($manageUsers);die;
        $this->set(compact('fields', 'manageUsers'));
    }

    public function manager_index() {
        $contain = array('CreatedUser' => array('fields' => array('id', 'name')), 'ManageBy' => array('fields' => array('id', 'name')));
        $this->Paginator->settings = array('contain' => $contain);
        $this->set('fields', $this->Paginator->paginate());
    }

    public function admin_index() {
        $contain = array('CreatedUser' => array('fields' => array('id', 'name')), 'ManageBy' => array('fields' => array('id', 'name')));
        $this->Paginator->settings = array('contain' => $contain);
        $this->set('fields', $this->Paginator->paginate());
    }

}
