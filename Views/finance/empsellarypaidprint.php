<?php

/**
 * fileName: طباعة سند قبض مرتب    
 */
?>
<br>
<br>
<div class="container print-page">
    <?php $op = new Khas(); ?>
    <?php $op->get_report_header($op->lang("employee salary receipt voucher")); ?>
    <table class="print-table">
        <tbody>
            <?php if ($viewmodel) : ?>
                <?php foreach ($viewmodel as $paiditem) : ?>
                    <tr>
                        <td class="border p-1"> <?=$op->lang("name");?>: <?php echo $op->getempinfoById($paiditem['emp_id'], "emp_name"); ?> </td>
                        <td class="border p-1"> <?=$op->lang("career section");?>: <?php echo $op->getJobsSecByempId($op->getempjobsInfo($paiditem['emp_id'], "em_sec_id")); ?> </td>
                        <td class="border p-1"> <?=$op->lang("career level");?> : <?php echo $op->getJobsLevByempId($op->getempjobsInfo($paiditem['emp_id'], "em_lev_id")); ?> </td>
                        <td class="border p-1  "> <?=$op->lang("financial month");?> :
                            <input type="hidden" name="action_month" id="action_month" value="<?php echo (isset($_GET['action_month'])) ? $_GET['action_month'] : ''; ?>">
                            <span class="float-left px-2 py-1"><?php echo (isset($_GET['action_month'])) ? $_GET['action_month'] : ''; ?> </span> </td>
                    </tr>
                    <tr>
                        <td class="border p-1  "> <?=$op->lang("employee debts for the current month");?> : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_debt']; ?> </span> </td>
                        <td class="border p-1  "> <?=$op->lang("employee bouns for the current month");?> : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_allowance']; ?> </span> </td>
                        <td class="border p-1  "> <?=$op->lang("employee discount for the current month");?>: <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_deductiont']; ?> </span> </td>
                        <td class="border p-1  "> <?=$op->lang("employee salary for the current month");?> : <span class="float-left px-2 py-1">$<?php echo  $paiditem['empSellary']; ?> </span> </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <?php echo Data_Not_Founded; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <hr>


    <?php $getempsellarypaidprint = $op->getempsellarypaidprint($_GET['id']); ?>
    <table class="print-table table-bordered">
        <tr>
            <td class="text-center">
            <?=$op->lang("voucher number");?>
            </td>
            <td class="text-center">
            <?=$op->lang("financial month");?>
            </td>
            <td class="text-center">
            <?=$op->lang("paid date");?>
            </td>

            <td class="text-center">
            <?=$op->lang("paid ammount");?>
            </td>
        </tr>
        <?php foreach ((array) $getempsellarypaidprint as $getempsellarypaidprintItem) : ?>
            <tr>
                <td class="text-center">
                    <?php echo $getempsellarypaidprintItem['emp_sellary_paid_id']; ?>
                </td>

                <td class="text-center">
                    <?php echo $getempsellarypaidprintItem['action_month']; ?>
                </td>
                <td class="text-center">
                    <?php echo $getempsellarypaidprintItem['emp_sellary_paid_date']; ?>
                </td>
                <td class="text-center">
                    $<?php echo $getempsellarypaidprintItem['emp_sellary_paid_ampount']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                <?=$op->lang("total");?>: <?php echo $op->getSumempsellarypaidprint($_GET['id']); ?>$
            </td>
        </tr>
    </table>
    <hr>

    <table class="print-table table-bordered">
         <tr>
             <td colspan="3">
                    <?=$op->lang("i declare that the above-mentioned have received the amounts of money specified in this bond");?>
             </td>
             <td>
                    <?=$op->lang("employee signature");?>: ____________
             </td>
         </tr>
     </table>

     <hr>
     <table class="print-table table-bordered">
         <tr>
             <td>
                    <?=$op->lang("signature of the authorized employee");?>
             </td>
             <td>
                ____________
             </td>
             <td>
                    <?=$op->lang("manager's signature");?>
             </td>
             <td>
                 ____________
             </td>
         </tr>
     </table>
</div>
</div>


<?php $op->get_report_footer(); ?>
<script>
    window.print();
    window.addEventListener('afterprint', (event) => {
        window.close();
    });
</script>