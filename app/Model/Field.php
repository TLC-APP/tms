<?php

App::uses('AppModel', 'Model');

/**
 * Field Model
 *
 * @property Chapter $Chapter
 * @property CreatedUser $User
 */
class Field extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $actsAs=array('Containable');
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
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Chapter' => array(
            'className' => 'Chapter',
            'foreignKey' => 'field_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    /* belongsTo */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'created_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ManageBy' => array(
            'className' => 'User',
            'foreignKey' => 'manage_user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
