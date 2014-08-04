<?php
$this->PhpExcel->loadWorksheet(WWW_ROOT .'report/template/student_list.xlsx');
$this->PhpExcel->setDefaultFont('Times New Roman', 11);
if (!empty($course['CoursesRoom'])) {
    $start = new DateTime($course['CoursesRoom']['0']['start']);
    $end = new DateTime($course['CoursesRoom'][count($course['CoursesRoom']) - 1]['end']);
    $this->PhpExcel->writeDataToCell(6, 'E', $start->format('H:i, d-m-Y'));
    $this->PhpExcel->writeDataToCell(6, 'G', $end->format('H:i, d-m-Y'));
}
$this->PhpExcel->writeDataToCell(5, 'C', $course['Chapter']['name']);
$this->PhpExcel->writeDataToCell(6, 'C', $course['Course']['name']);
$colunms = array(
    array('label' => 'Stt', 'width' => 'auto', 'filter' => false),
    array('label' => 'Họ và Tên', 'width' => 'auto', 'filter' => true),
    array('label' => 'Đơn vị', 'width' => 'auto', 'filter' => true),
    array('label' => 'Ngày sinh', 'width' => 'auto', 'filter' => false),
    array('label' => 'Nơi sinh', 'width' => 'auto', 'filter' => false),
);
foreach ($course['CoursesRoom'] as $buoi) {
    $colunms = am($colunms, array(array('label' => $buoi['title'], 'width' => 'auto', 'filter' => false)));
   
}
$colunms = am($colunms, array(array('label' => 'Ghi chú', 'width' => 'auto', 'filter' => false)));
$styleArray = array(
       'borders' => array(
             'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FFFF0000'),
             ),
       ),
);
$this->PhpExcel->setRow(8);
$this->PhpExcel->addTableHeader($colunms, array('font' => 'Times New Roman', 'bold' => true));
// data 
$stt = 1;
foreach ($course['Attend'] as $student) {
    $this->PhpExcel->addTableRow(array(
        $stt++,
        $student['Student']['name'],
        $student['Student']['Department']['name'],
        $student['Student']['birthday'],
        $student['Student']['birthplace']
    ));
}
$this->PhpExcel->writeDataToCell($this->PhpExcel->getRow()+2, 'B', 'BAN GIÁM HIỆU');
$this->PhpExcel->writeDataToCell($this->PhpExcel->getRow()+2, 'G', 'LẬP BẢNG');
$this->PhpExcel->addTableFooter();
$this->PhpExcel->output();



