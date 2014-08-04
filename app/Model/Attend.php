<?php

App::uses('AppModel', 'Model');

/**
 * Attend Model
 *
 * @property Student $Student
 * @property Course $Course
 */
class Attend extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'student_id';
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
        $conditions = array('Attend.student_id' => $user_id);
        $attends = $this->find('all', array('conditions' => $conditions, 'recursive' => -1));
        $enrolled_courses_id_array = Set::classicExtract($attends, '{n}.Attend.course_id');
        return $enrolled_courses_id_array;
    }

    /* Ham lay danh sach id user tham gia khoa hoc dua vao id cua don vi */

    public function getEnrolledCoursesByDepartment($department_id = null) {
        $results = array();
        if ($department_id) {
            $users = $this->Student->getUserIdByDepartmentId($department_id,'Student'); //mang id cac user thuoc don vi
            
            $conditions = array('Attend.student_id' => $users);
            $results = $this->find('all', array('conditions' => $conditions, 'recursive' => -1));
            $results = Set::classicExtract($results, '{n}.Attend.course_id');
        }

        return $results;
    }

}
