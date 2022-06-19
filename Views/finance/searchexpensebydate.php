<?php

/**
 * fileName: طباعة تقرير الصرفيات بين تاريخين
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <div class="header-section">
        <div class="logo-section">
            <img src="<?php echo $op->siteSetting('siteUrl'); ?>/uplouds/<?php echo $op->siteSetting('siteLogo'); ?>" style="height:150px; width:150px;" class="rounded-circle p-0" alt="">
        </div>
        <div class="info-section">
            <?php echo $op->siteSetting('siteName'); ?>
            <br>
            <?php echo $op->siteSetting('siteDisc'); ?>
            <br>
            <?php echo $op->siteSetting('siteAddr'); ?>
            <br>
            <?php echo $op->siteSetting('sitePhones'); ?>
            <br>
            <?=$op->lang("print date");?>: <?php echo date("Y-M-d", time()); ?>
        </div>
    </div>
    <hr class="hr">
    <h1 class="text-center"><?=$op->lang("expenses report between two date");?> </h1>
    <h6 class="text-center border-top"> <?=$op->lang('from date');?>: <?php echo  $_GET['DFrm']; ?> <?=$op->lang('to date');?>: <?php echo  $_GET['Dto']; ?> </h6>
    <table class="print-table">
        <thead>
            <th class="border text-center p-1"> <?=$op->lang('no');?> </th>
            <th class="border text-center p-1"> <?=$op->lang('paid to');?> </th>
            <th class="border text-center p-1"> <?=$op->lang('date');?> </th>
            <th class="border text-center p-1"> <?=$op->lang('ammount');?> </th>
            <th class="border text-center p-1"> <?=$op->lang('date');?> </th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ((array) $viewmodel as $item) : ?>
                <tr>
                    <td class="text-center"> <?php echo $no++; ?> </td>
                    <td class="text-right"> <?php echo $op->getSelexptypetxt($item['exptypeid']); ?> </td>
                    <td class="text-center"> <?php echo $item['expensess_date']; ?> </td>
                    <td class="text-center"> $<?php echo $item['expensess_amount']; ?> </td>
                    <td class="text-center"> <?php echo $item['expensess_note']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>