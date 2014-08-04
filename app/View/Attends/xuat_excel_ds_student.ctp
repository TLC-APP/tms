<?php

$this->PhpExcel->loadWorksheet(WWW_ROOT . 'report/template/student_list_report.xlsx');
$this->PhpExcel->setDefaultFont('Times New Roman', 11);
$colunms = array(
    array('label' => 'STT', 'width' => 'auto', 'filter' => false),
    array('label' => 'Họ Tên', 'width' => 'auto', 'filter' => true),
    array('label' => 'Đơn vị', 'width' => 'auto', 'filter' => true),
    array('label' => 'Khóa học', 'width' => 'auto', 'filter' => false),
    array('label' => 'Chuyên đề', 'width' => 'auto', 'filter' => false),
    array('label' => 'Lĩnh vực', 'width' => 'auto', 'filter' => false),
    array('label' => 'Ngày mở', 'width' => 'auto', 'filter' => true),
    array('label' => 'Tình trạng khóa', 'width' => 'auto', 'filter' => true),
    array('label' => 'Kết quả', 'width' => 'auto', 'filter' => false),
);
$this->PhpExcel->addTableHeader($colunms, array('font' => 'Times New Roman', 'bold' => true));
// data 
$stt = 1;
foreach ($attends as $row) {
    $status = "";
    switch ($row['Course']['status']) {
        case COURSE_CANCELLED:
            $status = 'Đã hủy';
            break;
        case COURSE_COMPLETED:
            $status = 'Đã hoàn thành';
            break;
        case COURSE_UNCOMPLETED:
            $status = 'Chưa hoàn thành';
            break;
        case COURSE_REGISTERING:
            $status = 'Đang đăng ký';
            break;

        default:
            break;
    }
    $this->PhpExcel->addTableRow(array(
        $stt++,
        $row['Student']['name'],
        $row['Student']['Department']['name'],
        $row['Course']['name'],
        $row['Course']['Chapter']['name'],
        $row['Course']['Chapter']['Field']['name'],
        $row['Course']['created'],
        $status,
        ($row['Attend']['is_passed']) ? 'Đạt' : 'Không đạt'
    ));
}
$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();



