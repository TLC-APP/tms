<?php

App::uses('AppController', 'Controller');

/**
 * HocHams Controller
 *
 * @property HocHam $HocHam
 * @property PaginatorComponent $Paginator
 */
class HocHamsController extends AppController {

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
        $this->HocHam->recursive = 0;
        $this->set('hocHams', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->HocHam->exists($id)) {
            throw new NotFoundException(__('Invalid hoc ham'));
        }
        $options = array('conditions' => array('HocHam.' . $this->HocHam->primaryKey => $id));
        $this->set('hocHam', $this->HocHam->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!empty($this->request->data)) {
            $this->request->data['HocHam']['created_user_id'] = $this->Auth->user('id');
            if ($this->HocHam->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array('status' => 1, 'id' => $this->HocHam->id, 'name' => $this->HocHam->field('name'));
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
        if (!$this->HocHam->exists($id)) {
            throw new NotFoundException(__('Invalid hoc ham'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->HocHam->save($this->request->data)) {
                return $this->flash(__('The hoc ham has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('HocHam.' . $this->HocHam->primaryKey => $id));
            $this->request->data = $this->HocHam->find('first', $options);
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
        $this->HocHam->id = $id;
        if (!$this->HocHam->exists()) {
            throw new NotFoundException(__('Invalid hoc ham'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->HocHam->delete()) {
            return $this->flash(__('The hoc ham has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('The hoc ham could not be deleted. Please, try again.'), array('action' => 'index'));
        }
    }

}
