<?php

/**
 * fileName: دفع مرتبات الموظفين
 */
?>
<div class="container p-0">
    <?php $op = new Khas(); ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="card z-depth-0 rounded-0 border  p-0 ">
                    <div class="card-header danger-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("pay employee salary");?> </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <?php if ($viewmodel) : ?>
                                    <?php foreach ($viewmodel as $paiditem) : ?>
                                        <tr>
                                            <td class="border p-1"> <?=$op->lang("name");?>: <?php echo $op->getempinfoById($paiditem['emp_id'], "emp_name"); ?>
                                                <input type="hidden" name="emp_ids" value="<?php echo $paiditem['emp_id']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border p-1"> <?=$op->lang("career section");?> : <?php echo $op->getJobsSecByempId($op->getempjobsInfo($paiditem['emp_id'], "em_sec_id")); ?> </td>
                                        </tr>
                                        <tr>
                                            <td class="border p-1"> <?=$op->lang("career level");?> : <?php echo $op->getJobsLevByempId($op->getempjobsInfo($paiditem['emp_id'], "em_lev_id")); ?> </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0 p-1 text-white unique-color-dark "> <?=$op->lang("financial month");?> :
                                                <input type="hidden" name="action_month" id="action_month" value="<?php echo (isset($_GET['action_month'])) ? $_GET['action_month'] : ''; ?>">
                                                <span class="float-left px-2 py-1"><?php echo (isset($_GET['action_month'])) ? $_GET['action_month'] : ''; ?> </span> </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0 p-1 text-white unique-color-dark "> <?=$op->lang("employee debts for the current month");?> :
                                                <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_debt']; ?> </span>
                                                <input type="hidden" name="emp_debt" id="emp_debt" value="<?php echo  $paiditem['emp_debt']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0 p-1 text-white unique-color-dark "> <?=$op->lang("employee bouns for the current month");?> : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_allowance']; ?> </span> </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0 p-1 text-white unique-color-dark "> <?=$op->lang("employee discount for the current month");?> : <span class="float-left px-2 py-1">$<?php echo  $paiditem['emp_deductiont']; ?>
                                                </span> </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0 p-1 text-white unique-color-dark "> <?=$op->lang("employee salary for the current month");?> : <span class="float-left px-2 py-1">$<?php echo  $paiditem['empSellary']; ?> </span> </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0 p-1 text-white unique-color-dark ">  <?=$op->lang("employee net salary");?> :
                                                <span class="float-left px-2 py-1">$<?php echo ($paiditem['empSellary'] + $paiditem['emp_allowance']) - ($paiditem['emp_deductiont'] + $paiditem['emp_debt']); ?>
                                                </span> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php echo Data_Not_Founded; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="card p-0 z-depth-0 border rounded-0">
                    <div class="card-header success-color-dark text-white p-1 text-center  rounded-0"> <?=$op->lang("pay salary for employee");?> </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="PaidDate"> <?=$op->lang("date");?> </label>
                            <input type="date" name="PaidDate" id="PaidDate" value="<?php echo date('Y-m-d'); ?>" class="form-control rounded-0 p-0 ">
                        </div>
                        <div class="form-group">
                            <label for="acc_mov"> <?=$op->lang("account number");?> </label>
                            <select name="acc_mov" id="acc_mov" class="form-control rounded-0 p-0">
                                <?php $op->getBankDataList(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="paidSeallery"> <?=$op->lang("salary");?></label>
                            <input type="hidden" name="getemp_debt" id="getemp_debt">
                            <input type="hidden" name="emp_idss">
                            <input type="number" name="paidSeallery" id="paidSeallery" value="<?php echo (isset($_GET['sellery']))  ? $_GET['sellery'] : '012325'; ?>" class="form-control rounded-0 p-0 ">
                        </div>
                        <button type="submit" name="PaidempSellary" id="PaidempSellary" onclick="PaidempSellary()" class="btn brown darken-3 text-white float-left   mr-1  m-auto py-1"> <?=$op->lang("pay");?> </button>
                        <a href="<?php echo ROOT_URL; ?>/finance/empsellarypaidprint/<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white float-right    m-auto py-1"> <i class="fa fa-print"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>






<script>
    var getemp_debt = document.getElementById("getemp_debt");
    var emp_debt = document.getElementById("emp_debt");

    var emp_idss = document.getElementById("emp_idss");
    var emp_ids = document.getElementById("emp_ids");

    getemp_debt.setAttribute("value", emp_debt.value);
    emp_idss.setAttribute("value", emp_ids.value);
</script>