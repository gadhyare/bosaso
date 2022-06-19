<?php

/**
 * fileName: سند قبض رسوم
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>

    <?php echo $op->get_report_header($op->lang("fee receipt voucher")); ?>
    <?php foreach ((array) $viewmodel as $item) : ?>



        <table class="print-table">
            <tr>
                <td> <?=$op->lang("name");?>:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                <td> <?=$op->lang("id number");?>: <?php echo $item['stu_id']; ?> </td>
                <td colspan="3"> <?=$op->lang("program");?>: <?php echo $op->GetSelProgInfoTxt($item['prog_id']); ?> </td>
            </tr>
            <tr>
                <td> <?=$op->lang("section");?> :<?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                <td> <?=$op->lang("shift");?>: <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                <td> <?=$op->lang("level");?>: <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                <td> <?=$op->lang("group");?>: <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
                <td> <?=$op->lang("payment reason");?>: <?php $op->getPayResoTxt($item['Pay_Res_id']); ?> </td>
            </tr>
            <tr>
                <td> <?=$op->lang("current required fee");?>: <?php echo  $item['want']; ?>$ </td>
                <td colspan="2"> <?=$op->lang("revious");?>: <?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id'], $item['prog_id']); ?>$ </td>
                <td colspan="2"> <?=$op->lang("total required");?>: <span id="totWant"><?php echo $item['want'] + $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id'], $item['prog_id']); ?></span>$ </td>
            </tr>
        </table>
        <br>
    <?php endforeach; ?>
    <table class="print-table">
        <thead>
            <td> <?=$op->lang("no");?> </td>
            <td> <?=$op->lang("voucher number");?> </td>
            <td> <?=$op->lang("date");?> </td>
            <td> <?=$op->lang("descount");?> </td>
            <td> <?=$op->lang("paid");?> </td>
            <td> <?=$op->lang("note");?> </td>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php $row =  $op->getstuFeetranstion($_GET['id']); ?>
            <?php foreach ((array) $row as $item) : ?>
                <tr>
                    <td style="width:5%"> <?php echo $i++; ?> </td>
                    <td style="width:15%"> <?php echo $item['statment_num']; ?> </td>
                    <td style="width:10%"> <?php echo $item['payDate']; ?> </td>
                    <td style="width:10%"> $<?php echo $item['Discount']; ?> </td>
                    <td style="width:5%"> $<?php echo $item['amount']; ?> </td>
                    <td style="width:40%"> <?php echo $item['note']; ?> </td>
                </tr>
            <?php endforeach; ?>
        <tfoot>
            <tr>
                <td colspan="3"> الإجمالي </td>
                <td style="width:15%"> $<?php echo $op->getallstupaidFeeCuLev($_GET['id'], 'Discount') ?? 0; ?> </td>
                <td style="width:10%"> <span id="totPaid"> <?php echo $op->getallstupaidFeeCuLev($_GET['id'], 'amount') ?? 0 ?> </span>$ </td>
                <td style="width:10%"> <span id="totPlance"> </span> $ </td>
            </tr>
        </tfoot>

        </tbody>
    </table>
    <br>
    <span class="sing-section" style="margin-top:10px;float:right"> <?=$op->lang("receiver");?> </span>
    <span class="sing-section" style="margin-top:10px;float:left"> <?=$op->lang("financial Officer");?> </span>
</div>

<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
    var totPlance = document.getElementById("totPlance");
    var totWant = document.getElementById("totWant");
    var totPaid = document.getElementById("totPaid");

    totPlance.innerHTML = totWant.innerHTML - totPaid.innerHTML;
</script>