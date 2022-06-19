<?php

/**
 * fileName: طباعة قائمة طلبة  
 */
?>
<?php $op = new Khas(); ?>
 
<?php if (isset($_GET['prog'])) $op->chkSelProgtxt($_GET['prog']); ?>
    
    <?php

    
    $con ='
    <table >
        <tr>
            <td style="border:1px solid #333; font-size:14px;" colspan="4">
                <label> البرنامج </label>
                '. $op->GetSelProgInfoTxt($_GET['prog']) .'
            </td>
        </tr>
        <tr>
            <td style="border:1px solid #333; font-size:14px;">
                <label> الفترة </label>
                '. $op->getSelDepartmenttxt($_GET['dep']).'
            </td>
            <td style="border:1px solid #333; font-size:14px;">
                <label> القسم </label>
                '. $op->getSelesectiontxt($_GET['sec']).'
            </td>
            <td style="border:1px solid #333; font-size:14px;">
                <label> المستوى </label>
                '. $op->GetSellevelstxt($_GET['lev']).'
            </td>
            <td style="border:1px solid #333; font-size:14px;">
                <label> المجموعة </label>
                '.  $op->GetSelgroupsTxt($_GET['grp']). '
            </td>
        </tr>
    </table>
    <br>  
    <br>  
    <table >
        <tr>
            <td style="border:0.2px solid #AEAEAE;text-align:center;background-color:#36486b;color:#fff;font-size:14px;width:5%;" > م</td>
            <td style="border:0.2px solid #AEAEAE;text-align:center;background-color:#36486b;color:#fff;font-size:14px;width:30%;"> الاسم </td>
            <td style="border:0.2px solid #AEAEAE;text-align:center;background-color:#36486b;color:#fff;font-size:14px;width:20%;"> الرقم الجامعي </td>
            <td style="border:0.2px solid #AEAEAE;text-align:center;background-color:#36486b;color:#fff;font-size:14px;width:15%;"> تاريخ التسجيل </td>
            <td style="border:0.2px solid #AEAEAE;text-align:center;background-color:#36486b;color:#fff;font-size:14px;width:15%;"> الهاتف </td>
            <td style="border:0.2px solid #AEAEAE;text-align:center;background-color:#36486b;color:#fff;font-size:14px;width:15%;"> الحالة</td>
        </tr>
        ';
              $no = 1; 
              $items = json_decode($viewmodel); 
              if (count((array) $items) > 0) : 
                  foreach ($items as $SearchResultShow => $val) : 
                   $con .='<tr>
                        <td style="border:0.2px solid #AEAEAE;text-align:center;padding: 15px;font-size:14px;width:5%;"> <i id="no">' .$no++ . '</i> </td>
                        <td style="border:0.2px solid #AEAEAE; padding: 15px;font-size:14px;width:30%;">' .$op->getStuNameById($val->stu_id) .'</td>
                        <td style="border:0.2px solid #AEAEAE;text-align:center;padding: 15px;font-size:14px;width:20%;">' .$op->getStuInfoById($val->stu_id, "stu_num") .'</td>
                        <td style="border:0.2px solid #AEAEAE;text-align:center;padding: 15px;font-size:14px;width:15%;">' . date('Y-m-d' , strtotime($val->reg_date)) . '</td>
                        <td style="border:0.2px solid #AEAEAE;text-align:left;padding: 15px;font-size:14px;width:15%;">' .$op->getStuInfoById($val->stu_id, "Phones") .'</td>
                        <td style="border:0.2px solid #AEAEAE;text-align:center;padding: 15px;font-size:14px;width:15%;">' .$val->StuAddress .'</td>
                    </tr>'; 

                 endforeach;  
             endif;  
              
             
            $con .= '</table> ';

     $op->pdfData("كشف معلومات الفصل" ,  "كشف معلومات الفصل" , $con ); 
     
 