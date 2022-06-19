<?php

/**
 * fileName: تقرير مالية البنك
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header($op->lang("account movement report")); ?>
 
    <table class="print-table float-right w-50">
        <tr>
            <td colspan="2"> <?=$op->lang("account number");?> : <?php echo $op->getSelBankInfoById($_GET['banacc'], 'Ban_name'); ?> | <?php echo $op->getSelBankInfoById($_GET['banacc'], 'Ban_num'); ?> </td>
        </tr>
        <tr>
            <td> <?=$op->lang("from date");?>: <?php echo  $_GET['DFrm']; ?></td>
            <td> <?=$op->lang("to date");?>: <?php echo  $_GET['Dto']; ?> </td>
        </tr>
        <tr>
            <td> <?=$op->lang("opeeing account");?>: <?php echo $op->getBankOpingamount($_GET['banacc']); ?> $ </td>
            <td> <?=$op->lang("current blunce");?>: <?php echo $op->getaccountCurrentBlance($_GET['banacc']); ?> $ </td>
        </tr>
    </table>
    <div class="clearfix"></div>
    <table class="print-table border">
        <thead>
            <th class="border  text-center p-1"> <?=$op->lang("no");?> </th>
            <th class=" border text-center p-1"> <?=$op->lang("date");?> </th>
            <th class=" border text-center p-1"> <?=$op->lang("deposits");?> </th>
            <th class=" border text-center p-1"> <?=$op->lang("withdrawal");?> </th>
            <th class=" border text-center p-1"> <?=$op->lang("reference no");?> </th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
                <tr>
                    <?php $Incoming = ($item['Incoming'] > 0) ? $item['Incoming'] : 0; ?>
                    <?php $Outbound = ($item['Outbound'] > 0) ? $item['Outbound'] : 0; ?>
                    <td class="border text-center"> <?php echo $no++; ?> </td>
                    <td class="border text-right"> <?php echo  $item['mov_date']; ?></td>
                    <td class="border text-center"> $<?php echo $Incoming; ?> </td>
                    <td class="border text-center"> $<?php echo $Outbound; ?> </td>
                    <td class="border text-center"> <?php echo $item['parem']; ?> </td>
                </tr>
            <?php endforeach; ?>
        <tfoot>
            <tr>
                <td class="border text-center"> </td>
                <td class="border text-right"> </td>
                <td class="border text-center"> $<?php echo $op->getaccountIncomingTotal($_GET['banacc'], $_GET['DFrm'], $_GET['Dto']); ?> </td>
                <td class="border text-center"> $<?php echo $op->getaccountOutboundTotal($_GET['banacc'], $_GET['DFrm'], $_GET['Dto']); ?> </td>
                <td class="border text-center"> </td>
            </tr>
        </tfoot>
        </tbody>
    </table>
</div>
<?php $op->get_report_footer(); ?>
<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>