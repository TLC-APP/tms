<?php

App::uses('AppModel', 'Model');

/**
 * CoursesRoom Model
 *
 * @property Course $Course
 * @property Room $Room
 * @property CreatedUser $CreatedUser
 */
class CoursesRoom extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';
    public $actsAs = array('Containable');
    public $virtualFields = array(
        'room' =>
        "SELECT Room.name as CoursesRoom__room
         FROM  rooms as Room 
         where Room.id=CoursesRoom.room_id 
            ");

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nhập tên buổi'
            ),
            'mustUnique' => array(
                'rule' => array('checkTenDuyNhat', 'course_id'),
                'message' => 'Đã có buổi tên này thuộc khóa học rồi.',
                'on' => 'create'
            )
        ,
        ),
        'priority' => array(
            'mustUnique' => array(
                'rule' => array('checkUuTienDuyNhat', 'course_id'),
                'message' => 'Đã có buổi học trong khóa với độ ưu tiên này.',
                'on' => 'create'
            )
        ),
        'course_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Chưa có khóa học',
            ),
        ),
        'room_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Chưa chọn phòng',
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
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'course_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Room' => array(
            'className' => 'Room',
            'foreignKey' => 'room_id',
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

    public function checkTenDuyNhat($check, $course_id) {
        $conditions = array('CoursesRoom.course_id' => $this->data[$this->name][$course_id], 'CoursesRoom.title like' => $check['title']);
        $existing = $this->find('count', array('conditions' => $conditions));

        return($existing < 1);
    }

    public function checkUuTienDuyNhat($check, $course_id) {
        $conditions = array('CoursesRoom.course_id' => $this->data[$this->name][$course_id], 'CoursesRoom.priority' => $check['priority']);
        $existing = $this->find('count', array('conditions' => $conditions));

        return($existing < 1);
    }

    /* Lấy danh sách các khóa học hết buổi */

    public function layKhoaConBuoi() {
        $today = new DateTime();
        //Lấy danh sách các buổi có thời gian kết thúc >today
        $conditions = array('CoursesRoom.end >' => $today->format('Y-m-d H:i:s'));
        $rows = $this->find('all', array('conditions' => $conditions, 'recursive' => -1, 'fields' => array('DISTINCT CoursesRoom.course_id')));
        return Set::classicExtract($rows, '{n}.CoursesRoom.course_id');
    }

    //Lấy ra những khóa có start < today
    public function course_near_attend() {
        $this->recursive = -1;
        $today = new DateTime();
        $field = array('DISTINCT CoursesRoom.course_id');
        $conditions = array('CoursesRoom.start <' => $today->format('Y-m-d H:i:s'));
        $course_near = $this->find('all', array('conditions' => $conditions, 'fields' => $field));
        $courses_id_array = Set::classicExtract($course_near, '{n}.CoursesRoom.course_id');
        return $courses_id_array;
    }
    
    //Lấy ra những khóa có end < today
     public function course_attend() {
        $this->recursive = -1;
        $today = new DateTime();
        $field = array('DISTINCT CoursesRoom.course_id');
        $conditions = array('CoursesRoom.end >' => $today->format('Y-m-d H:i:s'));
        $course_near = $this->find('all', array('conditions' => $conditions, 'fields' => $field));
        $courses_id_array = Set::classicExtract($course_near, '{n}.CoursesRoom.course_id');
        //debug($courses_id_array);die;
        return $courses_id_array;
    }
}
