<?php

App::uses('AppModel', 'Model');

class Attachment extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'attachment'
        ),
    );
    public $belongsTo = array(
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'foreign_key',
        ),
        'Chapter' => array(
            'className' => 'Chapter',
            'foreignKey' => 'foreign_key',
        )
    );

    public function getFilePath($id, $assciationName, $assciationClass = 'attachment') {

        $this->id = $id;
        if (!$this->exists()) {
            throw new Exception('Không tìm thấy file');
        }
        $file_name = $this->field('attachment');
        $dir = $this->field('dir');
        $model = $this->field('model');
        $path = WEBROOT_DIR . DS . FILE_DIR . DS . strtolower($assciationName) . DS . $assciationClass . DS . $dir . DS . $file_name;
        return $path;
    }

    public function getFileName($id) {

        $this->id = $id;
        if (!$this->exists()) {
            throw new Exception('Không tìm thấy file');
        }
        $file_name = $this->field('attachment');

        return $file_name;
    }

}
