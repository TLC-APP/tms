<?php

App::uses('AppModel', 'Model');

/**
 * Chapter Model
 *
 * @property Field $Field
 * @property Course $Course
 */
class Chapter extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $virtualFields = array(
        'course_number' =>
        "SELECT count(id) as Chapter__course_number 
         FROM  courses as Course 
         where 
            Course.chapter_id=Chapter.id 
            ");
    public $actsAs = array('Containable', 'Upload.Upload' => array(
            'image' => array(
                'fields' => array(
                    'dir' => 'image_path'
                )
            )
    ));

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique'=>array('rule'=>array('isUnique'),
                'message' => 'Tên chuyên đề đã tồn tại')
        ),
        'field_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
          /*  'mustUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Tên chuyên đề đã tồn tại',
                'last' => true),*/
        ),
    );
    public $belongsTo = array(
        'Field' => array(
            'className' => 'Field',
            'foreignKey' => 'field_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'created_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'chapter_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Attachment' => array(
            'className' => 'Attachment',
            'foreignKey' => 'foreign_key',
            'dependent' => false,
            'conditions' => array(
                'Attachment.model' => 'Chapter',
            ),
        ),
    );

    public function createWithAttachments($data) {
        // Sanitize your images before adding them
        $dstailieu = array();
        if (!empty($data['Attachment'][0])) {
            foreach ($data['Attachment'] as $i => $tailieu) {
                if (is_array($data['Attachment'][$i])) {
                    // Force setting the `model` field to this model
                    $tailieu['model'] = $this->name;

                    // Unset the foreign_key if the user tries to specify it
                    if (isset($tailieu['foreign_key'])) {
                        unset($tailieu['foreign_key']);
                    }
                    $dstailieu[] = $tailieu;
                }
            }
        }
        $data['Attachment'] = $dstailieu;
        if (empty($data[$this->name]['id'])) {
            $this->create();
        }
        return $this->saveAll($data, array('validate' => 'first', 'deep' => true));
    }

    public function isOwnedBy($chapter, $user) {
        return $this->field('id', array('id' => $chapter, 'created_user_id' => $user)) !== false;
    }

    public function getChapterByField_id($field_id) {
        $conditions = array('Chapter.field_id' => $field_id);
        $chapters = $this->find('all', array('conditions' => $conditions, 'recursive' => -1));
        $courses_id_array = Set::classicExtract($chapters, '{n}.Chapter.id');
        return $courses_id_array;
    }

}
