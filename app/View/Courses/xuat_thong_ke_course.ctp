<?php

$this->PhpExcel->loadWorksheet(WWW_ROOT .'report/template/xuat_thong_ke_course.xlsx');
$this->PhpExcel->setDefaultFont('Times New Roman', 11);
$colunms = array(
    array('label' => 'STT', 'width' => 'auto', 'filter' => false),
    array('label' => 'Tên', 'width' => 'auto', 'filter' => true),
    array('label' => 'Chuyên đề', 'width' => 'auto', 'filter' => true),
    array('label' => 'Lĩnh vực', 'width' => 'auto', 'filter' => false),
    array('label' => 'Hướng dẫn viên', 'width' => 'auto', 'filter' => false),
    array('label' => 'Số buổi', 'width' => 'auto', 'filter' => false),
    array('label' => 'Tình trạng', 'width' => 'auto', 'filter' => true),
    array('label' => 'Công khai', 'width' => 'auto', 'filter' => true),
    array('label' => 'Số ĐK cho phép', 'width' => 'auto', 'filter' => false),
    array('label' => 'Số lượng đăng ký', 'width' => 'auto', 'filter' => false),
    array('label' => 'Đạt', 'width' => 'auto', 'filter' => false)
);
$styleArray = array(
       'borders' => array(
             'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FFFF0000'),
             ),
       ),
);
$this->PhpExcel->addTableHeader($colunms, array('font' => 'Times New Roman', 'bold' => true));
// data 
$stt = 1;
foreach ($courses as $course) {
    $status="";
    switch ($course['Course']['status']) {
        case COURSE_CANCELLED:
            $status='Đã hủy';
            break;
        case COURSE_COMPLETED:
            $status='Đã hoàn thành';
            break;
        case COURSE_UNCOMPLETED:
            $status='Chưa hoàn thành';
            break;
        case COURSE_REGISTERING:
            $status='Đang đăng ký';
            break;
        
        default:
            break;
    }
    $this->PhpExcel->addTableRow(array(
        $stt++,
        $course['Course']['name'],
        $course['Chapter']['name'],
        $course['Chapter']['Field']['name'],
        $course['Teacher']['name'],
        $course['Course']['so_buoi'],
        $status,
        $course['Course']['is_published'],
        $course['Course']['max_enroll_number'],
        $course['Course']['register_student_number'],
        
        $course['Course']['pass_number']
    ));
}
$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();



