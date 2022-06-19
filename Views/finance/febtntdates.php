<?php

/**
 * fileName: طباعة تقرير الصرفيات بين تاريخين
 */
?>
<?php $op = new Khas(); ?>
<?php $pdf = new pdf(); ?> 
<?php $header = $op->lang("fee payments report between two dates"); ?>
<?php $title = $op->lang("from date") . ": " . $_GET['DFrm']  . $op->lang("from date") . ":" . $_GET['Dto']; ?>  
<?php $paid_res = $op->getPayResoTxt($_GET['stu_Pay_Res_id']);?>
<?php 
$con = "" ;
$con .= ' 
    <table   cellspacing="0" cellpadding="3" style="border: 0.25px solid #a1a1a1;"  >
        <tr>
            <td style="border:1px solid #333;;width:5% "> '.$op->lang("no") .' </td>
            <td style="border:1px solid #333;width:25%"> '.$op->lang("name") .'</td>
            <td style="border:1px solid #333;">  '.$op->lang("id number") .'</td>
            <td style="border:1px solid #333;">  '.$op->lang("date") .' </td>
            <td style="border:1px solid #333;">  '.$op->lang("voucher number") .' </td>
            <td style="border:1px solid #333;"> '.$op->lang("ammount") .' </td>
            <td style="border:1px solid #333;"> '.$op->lang("note") .' </td>
        </tr>
        <tbody>';
             $no = 1;  
             foreach ((array) $viewmodel as $item) :  
                 if ($op->GetSelFeeinfo($item['Invoice_id'], "Pay_Res_id") == $_GET['stu_Pay_Res_id']) :  
                    $con .= '<tr>
                        <td style="border:1px solid #333;width:5%" > ' .$no++   . ' </td>
                        <td style="border:1px solid #333;;width:25%" > ' .$op->getStuInfoById($op->getStuInfoByInvoiceNum($item['Invoice_id']), "StuName")  .' </td>
                        <td style="border:1px solid #333;" >' .$op->getStuInfoById($op->getStuInfoByInvoiceNum($item['Invoice_id']), "stu_num")  .' </td>
                        <td style="border:1px solid #333;" >' .$item['payDate']  .' </td>
                        <td style="border:1px solid #333;" >'.$item['statment_num']  . ' </td>
                        <td style="border:1px solid #333;" >' . $item['amount']  . ' </td>
                        <td style="border:1px solid #333;" >' .$item['note']  .' </td>
                    </tr>';
                 endif;  
             endforeach; ?>
        <?php $con .= '</tbody>
    </table> 
 ';

  $op->pdfData($header, $title, $con, $firstString, $secondtString, $therdString, $foruthString); 


 ?>
<script>
    window.print();
    window.addEventListener('cnacelprint', (event) => {
        window.close();
    });
</script>