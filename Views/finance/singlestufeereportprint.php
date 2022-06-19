<?php

/**
 * fileName: طباعة تقرير مدفوعات طالب
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php echo $op->get_report_header(  $op->lang('print student paymnets report') ); ?>


    <table class="print-table">
        <tr>
            <td class="p-0" colspan="2">
                <label>  <?=$op->lang('program');?>  </label>
                <?php echo  $op->GetSelProgInfoTxt($_GET['stu_prog']); ?>
            </td>
            <td class="p-0" colspan="2">
                <label>  <?=$op->lang('reasone');?>  </label>
                <?php echo  $op->getSelpaymentrestxt($_GET['stu_Pay_Res_id']); ?>
            </td>
        </tr>
        <tr>
            <td class="p-0" colspan="2">
                <label>  <?=$op->lang('name');?>  </label>
                <?php echo  $op->getStuInfoByStunm($_GET['id'], 'StuName'); ?>
            </td>
            <td class="p-0" colspan="2">
                <label>  <?=$op->lang('id number');?>    </label>
                <?php echo   $_GET['id']; ?>
            </td>
        </tr>
    </table>

    <hr>
    <div id="idCount"></div>
    <?php $count =   $viewmodel; ?>
    <?php if (count((array) $viewmodel) > 0) : ?>
        <br>

        <table class="print-table">
            <?php $no = 1; ?>
            <?php foreach ($viewmodel as $item) : ?>
                <thead>

                    <th class="p-0" colspan="2">
                    <?=$op->lang('shift');?> 
                        <?php echo $op->getSelDepartmenttxt($item['dep_id']); ?>
                    </th>
                    <th class="p-0">
                    <?=$op->lang('section');?> 
                        <?php echo $op->getSelesectiontxt($item['sec_id']); ?>
                    </th>
                    <th class="p-0">
                    <?=$op->lang('level');?> 
                        <?php echo $op->GetSellevelstxt($item['lev_id']); ?>
                    </th>
                    <th class="p-0">
                    <?=$op->lang('group');?> 
                        <?php echo  $op->GetSelgroupsTxt($item['grp_id']); ?>
                    </th>
                    <th class="p-1  text-center" colspan="2">$ <?php echo $item['want']; ?> </th>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-1  text-center">  <?=$op->lang('no');?>  </td>
                        <td class="p-1  text-center">  <?=$op->lang('paid date');?>  </td>
                        <td class="p-1  text-center">  <?=$op->lang('ammount');?>    </td>
                        <td class="p-1  text-center">  <?=$op->lang('discount');?>  </td>
                        <td class="p-1  text-center">  <?=$op->lang('no');?>  </td>
                        <td class="p-1  text-center">  <?=$op->lang('note');?>  </td>
                    </tr>
                    <?php $getSubData = $op->getFeeTansByInvoiceId($item['Invoice_id']); ?>
                    <?php foreach ((array) $getSubData as $getSubDataItems) : ?>
                        <tr>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['sta_id'] ?> </td>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['payDate']; ?> </td>
                            <td class="p-1  text-center"> $<?php echo $getSubDataItems['amount'] ?? 0; ?> </td>
                            <td class="p-1  text-center"> $<?php echo $getSubDataItems['Discount'] ?? 0; ?> </td>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['statment_num']; ?> </td>
                            <td class="p-1  text-center"> <?php echo $getSubDataItems['note']; ?></td>
                        </tr>
                </tbody>
            <?php endforeach; ?>
            <tr>
                <td class="p-1  text-center grey" colspan="2"> <?=$op->lang("total");?> </td>
                <td class="p-1  text-center grey"> $<?php echo $op->getallstupaidFeeCuLev($item['Invoice_id'], 'amount') ?? 0; ?> </td>
                <td class="p-1  text-center grey"> $<?php echo $op->getallstupaidFeeCuLev($item['Invoice_id'], 'Discount') ?? 0 ?> </td>
                <td class="p-1  text-center grey" colspan="2"> <?=$op->lang("balance");?>: <span id="totblance<?php echo $no++; ?>"> <?php echo $item['want'] -  $op->getallstupaidFeeCuLev($item['Invoice_id'], 'Discount') - $op->getallstupaidFeeCuLev($item['Invoice_id'], 'amount'); ?> </span> $ </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td class="p-1  text-left " colspan="6"> <?=$op->lang("total payment for current reasone");?>: <?php echo $op->getAllStuBlnace($_GET['id'], 'stu_id'); ?>$ </td>
        </tr>
        </table>
        <br>
        <br>
    <?php else : ?>
        <?php echo  Data_Not_Founded; ?>
    <?php endif; ?>

    <br>

    <span class="sing-section">  <?=$op->lang("financial Officer");?> </span>

    <?php $op->get_report_footer(); ?>
</div>




<script>
    window.print();


    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>