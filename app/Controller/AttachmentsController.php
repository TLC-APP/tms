<?php

App::uses('AppController', 'Controller');

/**
 * Attachments Controller
 *
 * @property Attachment $Attachment
 * @property PaginatorComponent $Paginator
 */
class AttachmentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Attachment->id = $id;
        if (!$this->Attachment->exists()) {
            throw new NotFoundException(__('Invalid attachment'));
        }
        //$this->request->onlyAllow('post', 'delete');
        if ($this->Attachment->delete(($id))) {
            if ($this->request->is('ajax')) {
                echo json_encode(array('status'=>1));die;
            } else {
                $this->Session->setFlash('Đã xóa.', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect($this->referer());
            }
        }
    }

}
