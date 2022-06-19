<?php

/**
 * fileName:  تقرير مالية الفصل
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header( $op->lang("class fee report")); ?>
    <table class="print-table">
        <tr>
            <td class="p-0" colspan="2">
                <label> <?=$op->lang("program");?> </label>
                <?php echo  $op->GetSelProgInfoTxt($_GET['prog']); ?>
            </td>
            <td class="p-0" colspan="2">
                <label> <?=$op->lang("payment reaosne");?> </label>
                <?php echo  $op->getSelpaymentrestxt($_GET['Pay_Res_id']); ?>
            </td>
        </tr>
        <tr>
            <td class="p-0">
                <label> <?=$op->lang("shift");?> </label>
                <?php echo $op->getSelDepartmenttxt($_GET['dep']); ?>
            </td>
            <td class="p-0">
                <label> <?=$op->lang("seaction");?> </label>
                <?php echo $op->getSelesectiontxt($_GET['sec']); ?>
            </td>
            <td class="p-0">
                <label> <?=$op->lang("level");?> </label>
                <?php echo $op->GetSellevelstxt($_GET['lev']); ?>
            </td>
            <td class="p-0">
                <label> <?=$op->lang("group");?> </label>
                <?php echo $op->GetSelgroupsTxt($_GET['grp']); ?>
            </td>
        </tr>
    </table>

    <hr>
    <div id="idCount"></div>
    <?php $count =   $viewmodel; ?>
    <?php if (count((array) $viewmodel) > 0) : ?>
        <table class="print-table">
            <thead>
                <th class="p-1  text-center"> <?=$op->lang("no");?></th>
                <th class="p-1  text-center"> <?=$op->lang("name");?> </th>
                <th class="p-1  text-center"> <?=$op->lang("id number");?> </th>
                <th class="p-1  text-center"> <?=$op->lang("reqiured fee");?> </th>
                <th class="p-1  text-center"> <?=$op->lang("revious blunce");?> </th>
                <th class="p-1  text-center"> <?=$op->lang("discount");?> </th>
                <th class="p-1  text-center"> <?=$op->lang("payment");?> </th>
                <th class="p-1  text-center"> <?=$op->lang("balance");?> </th>
            </thead>
            <tbody>
                <?php $no = 1; ?>

                <?php foreach ($viewmodel as $item) : ?>
                    <tr>
                        <?php $pastBlance = $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id'], $_GET['prog']); ?>
                        <?php $want = $item['want']; ?>
                        <?php $Discount = $op->get_stu_paymnet_fee_select_class($item['Invoice_id'], 'Discount') ?? 0; ?>
                        <?php $want = $item['want']; ?>
                        <?php $amount = $op->get_stu_paymnet_fee_select_class($item['Invoice_id'], 'amount') ?? 0; ?>
                        <td class="p-1  text-center"> <?php echo $no++; ?> </td>
                        <td class="p-1  text-center"> <?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                        <td class="p-1  text-center"> <?php echo $op->getStuInfoById($item['stu_id'], 'stu_num'); ?> </td>
                        <td class="p-1  text-center"> <span id="want"><?php echo  $want; ?></span> $</td>
                        <td class="p-1  text-center"> <span id="pastPla"><?php echo $pastBlance; ?></span> $ </td>
                        <td class="p-1  text-center"> $<span id="discont"><?php echo $Discount; ?></span> </td>
                        <td class="p-1  text-center"> <span id="amount"><?php echo $amount; ?></span> $</td>
                        <td class="p-1  text-center"> <?php echo (($pastBlance + $want) - ($Discount + $amount)) ?? 0; ?> $</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot style="border-top: 1px solid #333 !important;">
                <tr class="border-dark">
                    <?php $totalWant = $op->get_class_fee_total($_GET['prog'], $_GET['dep'], $_GET['sec'], $_GET['lev'], $_GET['grp'], $_GET['Pay_Res_id']); ?>
                    <?php $ClassBlanceFee = $op->getClassBlanceFee($_GET['dep'], $_GET['lev'], $_GET['sec'], $_GET['grp'], $_GET['prog'], $_GET['Pay_Res_id'], 'amount'); ?>
                    <?php $ClassTotalPaidFee = $op->getClassTotalPaidFee($_GET['dep'], $_GET['lev'], $_GET['sec'], $_GET['grp'], $_GET['prog'], $_GET['Pay_Res_id'], 'amount'); ?>
                    <?php $ClassTotalDiscountFee = $op->getClassTotalPaidFee($_GET['dep'], $_GET['lev'], $_GET['sec'], $_GET['grp'], $_GET['prog'], $_GET['Pay_Res_id'], 'Discount'); ?>
                    <td class="p-1  text-center border-dark" colspan="3"> <?=$op->lang("totals");?> </td>
                    <td class="p-1  text-center border-dark"> <span id="wanta"><?php echo $totalWant; ?></span> $</td>
                    <td class="p-1  text-center border-dark"> <span id="pastPla"> <?php echo $ClassBlanceFee; ?> </span> $ </td>
                    <td class="p-1  text-center border-dark"> $<span id="discont"><?php echo $ClassTotalDiscountFee; ?></span> </td>
                    <td class="p-1  text-center border-dark"> <span id="amount"><?php echo $ClassTotalPaidFee; ?></span> $</td>
                    <td class="p-1  text-center border-dark"> $ <?php echo ($totalWant + $ClassBlanceFee) -   ($ClassTotalPaidFee  + $ClassTotalDiscountFee) ;?></td>
                </tr>
            </tfoot>

        </table>
    <?php else : ?>
        <?php echo  Data_Not_Founded; ?>
    <?php endif; ?>

    <br>
    <span class="sing-section"> <?=$op->lang("financial Officer");?>   </span>
</div>

<?php $op->get_report_footer(); ?>


<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });


    function getTotals(first, second, third, fourth, totalDiv) {
        var first = document.getElementById(first);
        var second = document.getElementById(second);
        var third = document.getElementById(third);
        var fourth = document.getElementById(fourth);
        var totalDiv = document.getElementById(totalDiv);

        totalDiv.innerText = (parseInt(first.innerText) + parseInt(second.innerText)) - (parseInt(third.innerText) + parseInt(
            fourth.innerText));
    }


    getTotals("wanta", "pastPla", "discont", "amount", "allPlance");
</script>