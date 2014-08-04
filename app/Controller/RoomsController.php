<?php

App::uses('AppController', 'Controller');

/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {

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
        $this->Room->recursive = 0;
        $this->set('rooms', $this->Paginator->paginate());
    }

    public function index_json() {
        $rooms = $this->Room->find('all');
        $this->set(array(
            'rooms' => $rooms,
            '_serialize' => array('rooms')
        ));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_view($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function manager_add() {
        if (!empty($this->request->data)) {
            if ($this->Room->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array('status' => 1, 'id' => $this->Room->id, 'name' => $this->Room->field('name'));
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Đã lưu thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
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
                    $this->Session->setFlash('Lưu không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                }
            }
        }
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            if ($this->Room->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array('status' => 1, 'id' => $this->Room->id, 'name' => $this->Room->field('name'));
                    $this->set('response', $response);
                    $this->set('_serialize', array('response'));
                } else {
                    $this->Session->setFlash('Đã lưu thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
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
                    $this->Session->setFlash('Lưu không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                }
            }
        }
    }

    public function admin_edit($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Room->save($this->request->data)) {
                $this->Session->setFlash('Đã lưu thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Lưu không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
            $this->request->data = $this->Room->find('first', $options);
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function manager_edit($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Room->save($this->request->data)) {
                $this->Session->setFlash('Đã lưu thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Lưu không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
            $this->request->data = $this->Room->find('first', $options);
        }
    }

    public function admin_index() {
        $this->Room->recursive = 0;
        $this->set('rooms', $this->Paginator->paginate());
    }

    public function manager_index() {
        $this->Room->recursive = 0;
        $this->set('rooms', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!empty($this->request->data)) {
            if ($this->Room->save($this->request->data)) {
                if ($this->request->is('ajax')) {
                    $response = array('status' => 1, 'id' => $this->Room->id, 'name' => $this->Room->field('name'));
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
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Room->save($this->request->data)) {
                $this->Session->setFlash(__('The room has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The room could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
            $this->request->data = $this->Room->find('first', $options);
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
        $this->Room->id = $id;
        if (!$this->Room->exists()) {
            throw new NotFoundException('Phòng không tồn tại');
        }
        $this->request->onlyAllow('post', 'delete');
        $course_number = $this->Room->field('course_number');
        if ($course_number > 0) {
            $this->Session->setFlash('Có '.$course_number.' khóa học đã đăng ký phòng này! Bạn không thể xóa!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            $this->redirect($this->request->referer());
        }
        if ($this->Room->delete()) {
            if ($this->Room->delete()) {
                $this->Session->setFlash('Đã xóa phòng thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect($this->request->referer());
            } else {
                $this->Session->setFlash('Xóa phòng không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                $this->redirect($this->request->referer());
            }
        }
    }

}
