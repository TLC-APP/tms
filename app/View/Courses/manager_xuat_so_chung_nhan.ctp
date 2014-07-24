<?php
$this->PhpExcel->loadWorksheet(WWW_ROOT . 'report/template/so_chung_nhan.xlsx');
$this->PhpExcel->setDefaultFont('Times New Roman', 11);
if (!empty($course['CoursesRoom'])) {
    $start = new DateTime($course['CoursesRoom']['0']['start']);
    $end = new DateTime($course['CoursesRoom'][count($course['CoursesRoom']) - 1]['end']);
    $this->PhpExcel->writeDataToCell(7, 'C', $start->format('d-m-Y'));
    $this->PhpExcel->writeDataToCell(7, 'E', $end->format('d-m-Y'));
}
$this->PhpExcel->writeDataToCell(5, 'C', $course['Chapter']['name']);
$this->PhpExcel->writeDataToCell(6, 'C', $course['Course']['name']);
$this->PhpExcel->setRow(10);
$stt = 1;
foreach ($course['Attend'] as $student) {
    $certificated_date = "";
    if (!empty($student['certificated_date'])) {
        $certificated_date = new DateTime($student['certificated_date']);
        $certificated_date = $certificated_date->format('d/m/Y');
    }
    $ngay_nhan_cc="";
    if (!empty($student['recieve_date'])) {
        $ngay_nhan_cc = new DateTime($student['recieve_date']);
        $ngay_nhan_cc = $ngay_nhan_cc->format('d/m/Y');
    }
    $ngay_sinh="";
    if (!empty($student['Student']['birthday'])) {
        $ngay_sinh = new DateTime($student['Student']['birthday']);
        $ngay_sinh = $ngay_sinh->format('d/m/Y');
    }
    $this->PhpExcel->addTableRow(array(
        $stt++,
        $student['Student']['name'],
        $student['Student']['Department']['name'],
        $ngay_sinh,
        $student['Student']['birthplace'],
        $student['certificated_number'],
        $certificated_date,
        $ngay_nhan_cc,
        "", //ky nhan
        $student['note'],
    ));
}
//$this->PhpExcel->writeDataToCell($this->PhpExcel->getRow() + 2, 'B', 'BAN GIÁM HIỆU');
$this->PhpExcel->writeDataToCell($this->PhpExcel->getRow() + 2, 'H', 'LẬP BẢNG');
$this->PhpExcel->output();



