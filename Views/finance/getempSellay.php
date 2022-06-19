<?php

/**
 * fileName: تقرير مرتبات الموظفين 
 */
?>
<?php $op = new Khas(); ?>
<?php if ($viewmodel) : ?>
    <table class="table table-striped table-bordered" id="myTable">
        <thead class="border">
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("no");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("name");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("bouns");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("discount");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("debits");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("basic salary");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("net salary");?> </th>
            <th class="p-1 pink darken-3 text-white text-center" style="font-size:80%"> <?=$op->lang("operation");?> </th>
        </thead>
        <tbody>
            <?php $is = 1; ?>
            <?php foreach ($viewmodel as $item) : ?>
                <tr>
                    <td class="p-1 text-center">
                        <?php echo $is++; ?>
                        <input type="hidden" name="getId" id="getId" value="<?php echo $item['empSellary_id']; ?>">
                        <input type="hidden" name="action_month" id="action_month" value="<?php echo $item['action_month']; ?>">
                    </td>
                    <td class="p-1 text-right" style="font-size:80%;direction:rtl !important">
                        <?php echo $op->getempinfoById($item['emp_id'], "emp_name") . " | " . $item['emp_id']; ?> </td>
                    <td class="p-1 text-center">$<?php echo $item['emp_allowance']; ?></td>
                    <td class="p-1 text-center">$<?php echo $item['emp_deductiont']; ?></td>
                    <td class="p-1 text-center">$<?php echo $item['emp_debt']; ?></td>
                    <td class="p-1 text-center">$<?php echo $item['empSellary']; ?></td>
                    <td class="p-1 text-center">
                        $<?php echo ($item['empSellary'] + $item['emp_allowance']) - ($item['emp_deductiont'] + $item['emp_debt']); ?>
                        <?php $netSellary = ($item['empSellary'] + $item['emp_allowance']) - ($item['emp_deductiont'] + $item['emp_debt']); ?>
                    </td>
                    <td class="p-1 text-center">
                        <a href="<?php echo ROOT_URL; ?>/finance/empsellarypaid/<?php echo $item['emp_id']; ?>?empSellary_id=<?php echo $item['empSellary_id']; ?>&sellery=<?php echo $netSellary; ?>&action_month=<?php echo $item['action_month']; ?>" target="_blank" class="btn py-1 px-2 success-color-dark text-white"> <i class="fa fa-dollar"></i> </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <?php echo Data_Not_Founded; ?>
<?php endif; ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="getDataHere">
        </div>
    </div>
</div>