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
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function manager_index() {
        $this->Department->recursive = 0;
        $this->set('departments', $this->Paginator->paginate());
        $data = $this->Department->generateTreeList();
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
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
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
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
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
        if ($this->Department->delete()) {
            $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        } else {
            $this->Session->setFlash('xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
