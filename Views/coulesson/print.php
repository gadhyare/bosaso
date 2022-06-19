<?php

/**
 * fileName: طباعة المجموعات
 */
?>
<?php
$d = DIR . 'lib' . SB . 'mpdf' . SB . 'vendor' . SB . 'autoload.php';


require $d;



$mpdf  = new \Mpdf\Mpdf(['autoArabic' => true]);
  $op = new Khas();?>
    <?php $dataitem = json_decode($viewmodel); ?>
    <table class="table" cellspacing="0">
        <tr>
            <td> المجموعة </td>
            <td> المجموعة </td>
        </tr>
    </table>
     <table  width="100%" class="tables" >
        <tr>
            <td> # </td>
            <td> المجموعة </td>
            <td> الحالة </td>
        </tr>
        <?php foreach ($dataitem as $val) : ?>
            <tr>
                <td><?php echo $val->grp_id; ?> </td>
                <td> <?php echo $val->group_name; ?> </td>
                <td> <?php echo $val->active;?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php 
$data = ob_get_clean();
 
$mpdf->autoLangToFont = true;
$mpdf->WriteHTML($data);

$mpdf->Output(DIR . 'filesdir' . SB . 'mmmmm.pdf'); ?>

<embed src="<?php echo ROOT_URL . '/filesdir/mmmmm.pdf'; ?>" type="application/pdf" width="100%" height="600px" />