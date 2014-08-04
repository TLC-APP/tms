<?php

App::uses('AppController', 'Controller');

/**
 * Chapters Controller
 *
 * @property Chapter $Chapter
 * @property PaginatorComponent $Paginator
 */
class ChaptersController extends AppController {

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
        $role = $this->Session->read('layout');
        return $this->redirect(array('action' => $role . "_index"));
    }

    public function fill_selectbox($field_id = null) {
        //$this->autoRender = false;
        $conditions = array();
        if ($field_id) {
            $conditions = Set::merge($conditions, array('Chapter.field_id' => $field_id));
        }
        $chapters = $this->Chapter->find('list', array('conditions' => $conditions));
        $chapters=Set::merge($chapters,array(""=>"-- Tất cả --"));
        $this->set(array(
            'chapters' => $chapters,
            '_serialize' => array('chapters')
        ));
    }

    public function search() {
        if ($this->request->is('ajax')) {
            // Use data from serialized form
            $chapter_name = $this->request->data['chapter_name'];
            $this->Paginator->settings = array(
                'conditions' => array(
                    //  'Chapter.created_user_id' => $this->Auth->user('id'),
                    'Chapter.name like ' => '%' . $chapter_name . '%'
            ));
            $this->set('chapters', $this->Paginator->paginate());
            $this->render('search_results', 'ajax'); // Render the contact-ajax-response view in the ajax layout
        }
    }

    public function fields_manager_index() {
        $contain = array('User' => array('fields' => array('id', 'name')), 'Field');
        $manage_fields = $this->Chapter->Field->find('all', array('fields' => array('id'), 'recursive' => -1, 'conditions' => array(
                'Field.manage_user_id' => $this->Auth->user('id'))));
        $manage_fields_id_array = array();
        if (!empty($manage_fields)) {
            $manage_fields_id_array = Set::classicExtract($manage_fields, '{n}.Field.id');
        }
        $this->Paginator->settings = array('conditions' => array('Chapter.field_id' => $manage_fields_id_array), 'contain' => $contain);
        $this->set('chapters', $this->Paginator->paginate());
    }

    public function fields_manager_view($id) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $contain = array('Attachment', 'User' => array('fields' => array('id', 'name')), 'Field');
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id), 'contain' => $contain);
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    public function fields_manager_add() {
        $loginId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Chapter->create();
            $this->request->data['Chapter']['created_user_id'] = $loginId;
            try {
                if ($this->Chapter->createWithAttachments($this->request->data)) {
                    $this->Session->setFlash('Thêm chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return $this->redirect(array('action' => 'index'));
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        $manage_fields = $this->Course->Chapter->Field->find('all', array('fields' => array('id'), 'recursive' => -1, 'conditions' => array(
                'Field.manage_user_id' => $loginId)));
        $manage_fields_id_array = array();
        if (!empty($manage_fields)) {
            $manage_fields_id_array = Set::classicExtract($manage_fields, '{n}.Field.id');
        }
        $fields = $this->Chapter->Field->find('list', array('conditions' => array('Field.id' => $manage_fields_id_array)));
        $this->set(compact('fields'));
    }

    public function fields_manager_edit($id = null) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chapter->save($this->request->data)) {
                $this->Session->setFlash('Cập nhật chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    public function manager_index() {
        $contain = array('User' => array('fields' => array('id', 'name')), 'Field');
        $this->Paginator->settings = array('contain' => $contain);
        $this->set('chapters', $this->Paginator->paginate());
    }

    public function admin_index() {
        $contain = array('User' => array('fields' => array('id', 'name')), 'Field');
        $this->Paginator->settings = array('contain' => $contain);
        $this->set('chapters', $this->Paginator->paginate());
    }

    public function manager_view($id) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $contain = array('Attachment', 'User' => array('fields' => array('id', 'name')), 'Field');
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id), 'contain' => $contain);
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    public function admin_view($id) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $contain = array('Attachment', 'User' => array('fields' => array('id', 'name')), 'Field');
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id), 'contain' => $contain);
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    public function manager_add() {
        $loginId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Chapter->create();
            $this->request->data['Chapter']['created_user_id'] = $loginId;
            try {
                if ($this->Chapter->createWithAttachments($this->request->data)) {
                    $this->Session->setFlash('Thêm chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return $this->redirect(array('action' => 'index'));
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    public function admin_add() {
        $loginId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->Chapter->create();
            $this->request->data['Chapter']['created_user_id'] = $loginId;
            try {
                if ($this->Chapter->createWithAttachments($this->request->data)) {
                    $this->Session->setFlash('Thêm chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return $this->redirect(array('action' => 'index'));
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }

        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    public function manager_edit($id = null) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chapter->save($this->request->data)) {
                $this->Session->setFlash('Cập nhật chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {

            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    public function admin_edit($id = null) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chapter->save($this->request->data)) {
                $this->Session->setFlash('Cập nhật chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        } else {

            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    /* end manager */
    /* Teacher com */

    public function teacher_view() {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $contain = array('CreatedUser' => array('fields' => array('id', 'name')), 'Field');
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id), 'contain' => $contain);
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $contain = array('Attachment', 'CreatedUser' => array('fields' => array('id', 'name')), 'Field');
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id), 'contain' => $contain);
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Chapter->create();
            $this->request->data['Chapter']['created_user_id'] = $this->Auth->user('id');
            if ($this->Chapter->save($this->request->data)) {
                $this->Session->setFlash('Thêm chuyên đề thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chapter->save($this->request->data)) {
                return $this->flash(__('The chapter has been saved.'), array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function fields_manager_delete($id = null) {

        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $this->request->onlyAllow('post', 'delete');
        if (!$this->Chapter->isOwnedBy($id, $this->Auth->user('id')) && (!$this->Chapter->User->isAdmin() || !$this->Chapter->User->isManager())) {
            $this->Session->setFlash('Bạn không có quyền xóa chuyên đề người khác tạo', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect($this->render());
        } else {
            $course_number = $this->Chapter->field('course_number');
            if ($course_number > 0) {
                $this->Session->setFlash('Có ' . $course_number . ' khóa học thuộc chuyên đề này, bạn cần xóa chúng trước đã.', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                return $this->redirect($this->render());
            } else {
                if ($this->Chapter->delete()) {
                    $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return $this->redirect($this->render());
                } else {
                    $this->Session->setFlash('Xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return $this->redirect($this->render());
                }
            }
        }
    }

    public function manager_delete($id = null) {

        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $this->request->onlyAllow('post', 'delete');
        if (!$this->Chapter->isOwnedBy($id, $this->Auth->user('id')) && (!$this->Chapter->User->isAdmin() || !$this->Chapter->User->isManager())) {
            $this->Session->setFlash('Bạn không có quyền xóa chuyên đề người khác tạo', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $course_number = $this->Chapter->field('course_number');
            if ($course_number > 0) {
                $this->Session->setFlash('Có ' . $course_number . ' khóa học thuộc chuyên đề này, bạn cần xóa chúng trước đã.', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                return $this->redirect(array('action' => 'index'));
            } else {
                if ($this->Chapter->delete()) {
                    $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    public function admin_delete($id = null) {

        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $this->request->onlyAllow('post', 'delete');
        if (!$this->Chapter->isOwnedBy($id, $this->Auth->user('id')) && (!$this->Chapter->User->isAdmin() || !$this->Chapter->User->isManager())) {
            $this->Session->setFlash('Bạn không có quyền xóa chuyên đề người khác tạo', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $course_number = $this->Chapter->field('course_number');
            if ($course_number > 0) {
                $this->Session->setFlash('Có ' . $course_number . ' khóa học thuộc chuyên đề này, bạn cần xóa chúng trước đã.', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                return $this->redirect(array('action' => 'index'));
            } else {
                if ($this->Chapter->delete()) {
                    $this->Session->setFlash('Xóa thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Xóa không thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    public function attachment_list($id) {
        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new Exception('Không tồn tại chuyên đề này');
        }
        $conditions = array('Attachment.model' => 'Chapter', 'Attachment.foreign_key' => $id);
        $attachments = $this->Chapter->Attachment->find('all', array('conditions' => $conditions, 'recursive' => -1));
        $this->set('attachments', $attachments);
    }

    public function upload($id = null) {
        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new Exception('Không tồn tại chuyên đề này');
        }
        if (!empty($this->request->data)) {
            try {
                if ($this->Chapter->createWithAttachments($this->request->data)) {
                    echo json_encode(array('status' => 1, 'chapter_id' => $id));
                    die();
                } else {
                    echo json_encode(array('status' => 0));
                    die();
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
    }

    public function download($attachment_id) {
        $path = $this->Chapter->Attachment->getFilePath($attachment_id, 'attachment');

        $this->response->file(
                $path, array('download' => true, 'name' => $this->Chapter->Attachment->getFileName($attachment_id))
        );
        return $this->response;
    }

}
