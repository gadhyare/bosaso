<?php

/**
 * fileName: طباعة مديونيات الموظفين
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header("تقرير مديونيات الموظفين"); ?>

    <h6 class="text-center border-top"><?=$op->lang("from date");?>: <?php echo  $_GET['DFrm']; ?>   <?=$op->lang("to date");?>: <?php echo  $_GET['Dto']; ?> </h6>
    <table class="print-table">
        <thead>
            <th class="border text-center p-1"><?=$op->lang("no");?> </th>
            <th class="border text-center p-1"><?=$op->lang("name");?> </th>
            <th class="border text-center p-1"><?=$op->lang("date");?></th>
            <th class="border text-center p-1"><?=$op->lang("financial month");?></th>
            <th class="border text-center p-1"><?=$op->lang("amount");?></th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
                <tr>
                    <td class="text-center"> <?php echo $no++; ?> </td>
                    <td class="text-right"> <?php echo $op->getempinfoById($item['emp_id'], "emp_name"); ?> </td>
                    <td class="text-center"> <?php echo $item['emp_debt_date']; ?> </td>
                    <td class="text-center"> <?php echo $item['action_month']; ?> </td>
                    <td class="text-center"> $<?php echo $item['emp_debt_amount']; ?> </td>
                </tr>
            <?php endforeach; ?>
        <tfoot>
            <tr>
                <td class="border text-center" colspan="4"><?=$op->lang("total");?></td>
                <td class="border text-center"> $<?php echo $op->getSumempdebtprint($_GET['DFrm'], $_GET['Dto']); ?> </td>
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