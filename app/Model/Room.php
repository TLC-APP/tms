<?php

App::uses('AppModel', 'Model');

/**
 * Room Model
 *
 * @property Course $Course
 */
class Room extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $virtualFields = array(
        'course_number' =>
        "SELECT count(id) as Room__course_number 
         FROM  courses_rooms as Course 
         where 
            Course.room_id=Room.id 
            ");

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Tên phòng không rỗng',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Tên phòng đã có',
                'last' => true
            )
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'CoursesRoom' => array(
            'className' => 'CoursesRoom',
            'foreignKey' => 'room_id',
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
    );

}
