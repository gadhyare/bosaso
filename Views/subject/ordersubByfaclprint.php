 <?php
    /**
     * fileName: طباعة المواد بحسب البرامج
     */
    ?>
 <br>
 <br>
 <?php $op = new Khas(); ?>
 <?php $op->chkSelProgtxt($_GET['pro_id']); ?>
 
 <?php $con = '<table border="1">
             <tr>
                 <td style="font-size:16px;background-color:#5b5b5b;color:#fff;"> المسلسل</td>
                 <td style="font-size:16px;background-color:#5b5b5b;color:#fff;"> اسم المادة</td>
                 <td style="font-size:16px;background-color:#5b5b5b;color:#fff;"> كود المادة</td>
                 <td style="font-size:16px;background-color:#5b5b5b;color:#fff;"> الحالة</td>
             </tr>';

    $i = 1;
    $json = json_decode($viewmodel);
    foreach ((array) $json   as $items => $key) :
        $active = ($key->active == 1) ? 'مفعل' : 'غير مفعل';
        $con .= '<tr>
                     <td style="font-size:16px;">' . $i  . '</td>
                     <td style="font-size:16px;">' . $key->subject_name . ' </td>
                     <td style="font-size:16px;">' . $key->subject_code . ' </td>
                     <td style="font-size:16px;">' . $active . ' </td>
                 </tr>';
        $i++;
    endforeach;
    $con .= '</table>';  
 $op->pdfData("قائمة مواد البرنامج", "قائمة مواد البرنامج", $con);