<?php

App::uses('AppModel', 'Model');

/**
 * Department Model
 *
 * @property Department $ParentDepartment
 * @property Department $ChildDepartment
 */
class Department extends AppModel {

    public $virtualFields = array(
        'user_number' =>
        "SELECT count(id) as Department__user_number 
         FROM  users as User 
         where 
            User.department_id=Department.id 
            ");

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $actsAs = array('Tree');

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
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Tên đơn vị này đã tồn tại'
            )
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'ParentDepartment' => array(
            'className' => 'Department',
            'foreignKey' => 'parent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'TruongDonVi' => array(
            'className' => 'User',
            'foreignKey' => 'truong_don_vi_id',
            'conditions' => '',
            'fields' => array('TruongDonVi.id','TruongDonVi.name'),
            'order' => array('TruongDonVi.name'=>'ASC')
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ChildDepartment' => array(
            'className' => 'Department',
            'foreignKey' => 'parent_id',
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'department_id',
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

}
