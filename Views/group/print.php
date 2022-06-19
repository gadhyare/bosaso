<?php

/**
 * fileName: طباعة المجموعات
 */
?>
<?php
$op = new Khas();

$con = "";
$con .= ' 
<table     cellspacing="0" cellpadding="3" style="border: 0.5px solid #435560"  >
    <tr>
        <td style="background-color:#435560; color:#fff; text-align:center;"> م </td>
        <td style="background-color:#435560; color:#fff; text-align:center;"> القسم </td>
        <td style="background-color:#435560; color:#fff; text-align:center;"> الحالة </td>
    </tr> ';
$i = 1;

foreach ($viewmodel as $s) {
    $active = ($s['active'] == 1) ? "مفعل" : "غير مفعل";
    $con .=  '<tr>
        <td style="border: 0.1px solid #435560">' . $i++ . '</td> 
        <td style="border: 0.1px solid #435560">' . $s["group_name"] . '</td> 
        <td style="border: 0.1px solid #435560">' . $active . '</td> 
        </tr>';
}
$con .= "</table>";

$op->pdfData('الأقسام' , 'قائمة الأقسام في البرنامج' , $con);