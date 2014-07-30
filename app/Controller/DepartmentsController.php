<?php

App::uses('AppController', 'Controller');

/**
 * Departments Controller
 *
 * @property Department $Department
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DepartmentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'TinymceElfinder.TinymceElfinder');
    public $helpers = array('TinymceElfinder.TinymceElfinder');

    public function add() {
        if (!empty($this->request->data)) {
            if ($this->Department->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array('status' => 1, 'id' => $this->Department->id, 'name' => $this->Department->field('name'));
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Thêm thành công');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                /* Yeu cau bang ajax */
                if ($this->RequestHandler->isAjax()) {
                    $response = array('status' => 0, 'message' => '<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Cảnh báo</strong> Thêm không thành công. Vui lòng kiểm tra lại.</div>');
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Lưu không thành công');
                }
            }
        }
        $parents = $this->Department->ParentDepartment->find('list');
        $this->set(compact('parents'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function manager_index() {
        $this->Department->recursive = 0;
        $this->set('departments', $this->Paginator->paginate());
        //$data = $this->Department->generateTreeList();
    }

    public function admin_index() {
        $this->Department->recursive = 0;
        $this->set('departments', $this->Paginator->paginate());
        //$data = $this->Department->generateTreeList();
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        $options = array('fields'=>array('id','name','parent_id','truong_don_vi_id'),'conditions' => array('Department.' . $this->Department->primaryKey => $id));
        $this->set('department', $this->Department->find('first', $options));
    }

    public function admin_view($id = null) {
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id),'recursive'=>0);
        $this->set('department', $this->Department->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function manager_add() {
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) {
                $this->Session->setFlash('Thêm thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Thêm không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }
        $parents = $this->Department->ParentDepartment->find('list');
        $truongDonVis=$this->Department->TruongDonVi->find('list');
        $this->set(compact('parents','truongDonVis'));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) {
                $this->Session->setFlash('Thêm thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Thêm không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }
        $parents = $this->Department->ParentDepartment->find('list');
        $this->set(compact('parents'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Department->save($this->request->data)) {
                $this->Session->setFlash('Sửa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));

                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Sửa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id), 'recursive' => 0);
            $this->request->data = $this->Department->find('first', $options);
        }
        $parents = $this->Department->ParentDepartment->find('list');
        $truongDonVis=$this->Department->TruongDonVi->find('list');
        $this->set(compact('parents','truongDonVis'));
    }

    public function admin_edit($id = null) {
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Invalid department'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Department->save($this->request->data)) {
                $this->Session->setFlash('Sửa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));

                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Sửa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id), 'recursive' => 0);
            $this->request->data = $this->Department->find('first', $options);
        }
        $parents = $this->Department->ParentDepartment->find('list');
        $this->set(compact('parents'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_delete($id = null) {
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Invalid department'));
        }
        $this->request->onlyAllow('post', 'delete');
        $children = $this->Department->childCount();
        if ($children > 0) {

            $this->Session->setFlash('xóa không thành công vì còn '.$children.' đơn vị con thuộc đơn vị này!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            $this->redirect($this->request->referer());
            
        }
        
        $users = $this->Department->field('user_number');
        
        if ($users > 0) {

            $this->Session->setFlash('xóa không thành công vì còn '.$users.' người dùng thuộc đơn vị này!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            $this->redirect($this->request->referer());
            
        }
        
        if ($this->Department->delete()) {
            $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        } else {
            $this->Session->setFlash('xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_delete($id = null) {
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Invalid department'));
        }
        $this->request->onlyAllow('post', 'delete');
        $children = $this->Department->childCount();
        if ($children > 0) {

            $this->Session->setFlash('xóa không thành công vì còn '.$children.' đơn vị con thuộc đơn vị này!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            $this->redirect($this->request->referer());
            
        }
        
        $users = $this->Department->field('user_number');
        
        if ($users > 0) {

            $this->Session->setFlash('xóa không thành công vì còn '.$users.' người dùng thuộc đơn vị này!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            $this->redirect($this->request->referer());
            
        }
        if ($this->Department->delete()) {
            $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        } else {
            $this->Session->setFlash('xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
