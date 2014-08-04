<?php

App::uses('AppController', 'Controller');

/**
 * HocVis Controller
 *
 * @property HocVi $HocVi
 * @property PaginatorComponent $Paginator
 */
class HocVisController extends AppController {

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
        $this->HocVi->recursive = 0;
        $this->set('hocVis', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->HocVi->exists($id)) {
            throw new NotFoundException(__('Invalid hoc vi'));
        }
        $options = array('conditions' => array('HocVi.' . $this->HocVi->primaryKey => $id));
        $this->set('hocVi', $this->HocVi->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!empty($this->request->data)) {
            $this->request->data['HocVi']['created_user_id'] = $this->Auth->user('id');
            if ($this->HocVi->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array('status' => 1, 'id' => $this->HocVi->id, 'name' => $this->HocVi->field('name'));
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Đã lưu thành công!');
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                /* Yeu cau bang ajax */
                if ($this->RequestHandler->isAjax()) {
                    $response = array('status' => 0, 'message' => '<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Cảnh báo!</strong> Lưu không thành công, vui lòng kiểm tra lại thông tin.</div>');
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Lưu không thành công');
                }
            }
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
        if (!$this->HocVi->exists($id)) {
            throw new NotFoundException(__('Invalid hoc vi'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->HocVi->save($this->request->data)) {
                return $this->flash(__('The hoc vi has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('HocVi.' . $this->HocVi->primaryKey => $id));
            $this->request->data = $this->HocVi->find('first', $options);
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
        $this->HocVi->id = $id;
        if (!$this->HocVi->exists()) {
            throw new NotFoundException(__('Invalid hoc vi'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->HocVi->delete()) {
            return $this->flash(__('The hoc vi has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The hoc vi could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

}
