<?php

App::uses('AppModel', 'Model');

/**
 * StudentsCourse Model
 *
 * @property Student $Student
 * @property Course $Course
 */
class StudentsCourse extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'student_id';
    public $table = 'students_courses';
    public $actsAs = array('Containable');

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'student_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'course_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'is_passed' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'is_recieved' => array(
            'boolean' => array(
                'rule' => array('boolean'),
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Student' => array(
            'className' => 'User',
            'foreignKey' => 'student_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'course_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function getEnrolledCourses($user_id) {
        $conditions = array('StudentsCourse.student_id' => $user_id);
        $students_courses = $this->find('all', array('conditions' => $conditions, 'recursive' => -1));
        $enrolled_courses_id_array = Set::classicExtract($students_courses, '{n}.StudentsCourse.course_id');
        return $enrolled_courses_id_array;
    }

}
