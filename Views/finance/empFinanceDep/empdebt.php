<div class="container">
    <div class="row">
        <?php $op = new Khas(); ?>
        <div class="col-xs-12 col-md-4  ">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php if (isset($_GET['a']) && $_GET['a'] == 'edit') : ?>
                    <?php $empupdate = $op->getEmpDepToUpdate($_GET['ids']); ?>
                    <?php foreach ((array) $empupdate as $empupdatedo) : ?>
                        <div class="card p-0 rounded-0">
                            <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("pay debt for employee");?></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="emp_id"> <?=$op->lang("name");?></label>
                                    <select name="emp_id" id="emp_id" class="form-control p-0 alert-info rounded-0">
                                        <?php $op->getempList(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="acc_mov"> <?=$op->lang("account number");?></label>
                                    <select name="acc_mov" id="acc_mov" class="form-control rounded-0 p-0">
                                        <?php $op->getBankDataList(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="action_month"> <?=$op->lang("financial month");?></label>
                                    <input type="month" name="action_month" id="action_month" value="<?php echo $empupdatedo['action_month']; ?>" class="form-control rounded-0 p-0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="emp_debt_date">  <?=$op->lang("date");?> </label>
                                <input type="date" name="emp_debt_date" id="emp_debt_date" value="<?php echo $empupdatedo['emp_debt_date']; ?>" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <div class="form-group">
                                <label for="emp_debt_amount">  <?=$op->lang("amount");?> </label>
                                <input type="number" name="emp_debt_amount" id="emp_debt_amount" value="<?php echo $empupdatedo['emp_debt_amount']; ?>" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <button type="submit" name="updateRecDept" class="btn success-color-dark text-white m-auto col-8 py-2"> <i class="fa fa-send"></i> </button>
                            <button type="submit" name="DeleteRecDept" class="btn danger-color-dark text-white m-auto col-3 float-left py-2"> <i class="fa fa-trash-o"></i> </button>
                        </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="card p-0 rounded-0">
        <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("pay debt for employee");?></div>
        <div class="card-body">
            <div class="form-group">
                <label for="emp_id"> <?=$op->lang("name");?></label>
                <select name="emp_id" id="emp_id" class="form-control p-0 alert-info rounded-0">
                    <?php $op->getempList(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="acc_mov"> <?=$op->lang("acount number");?></label>
                <select name="acc_mov" id="acc_mov" class="form-control rounded-0 p-0">
                    <?php $op->getBankDataList(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="action_month"> <?=$op->lang("financial month");?></label>
                <input type="month" name="action_month" id="action_month" class="form-control rounded-0 p-0">
            </div>
            <div class="form-group">
                <label for="emp_debt_date"> <?=$op->lang("date");?> </label>
                <input type="date" name="emp_debt_date" id="emp_debt_date" class="form-control p-0 alert-info rounded-0" required>
            </div>
            <div class="form-group">
                <label for="emp_debt_amount"> <?=$op->lang("amount");?> </label>
                <input type="number" name="emp_debt_amount" id="emp_debt_amount" class="form-control p-0 alert-info rounded-0" required>
            </div>
            <button type="submit" name="addRecDept" class="btn success-color-dark text-white m-auto col-12 py-2"> <i class="fa fa-send"></i> </button>
        </div>
    </div>
<?php endif; ?>
</form>
    </div>
    <div class="col-xs-12 col-md-8  ">
        <div class="card p-0 rounded-0">
            <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("list of employees who have been paid debts");?></div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead class="border">
                        <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("no");?>  </th>
                        <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("name");?>  </th>
                        <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("date");?> </th>
                        <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("amount");?> </th>
                        <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("operation");?> </th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $r = $op->getempDept(); ?>
                        <?php foreach ((array) $r as $empDept) : ?>
                            <tr>
                                <td class="p-1"> <?php echo $i++; ?> </td>
                                <td class="p-1"> <?php echo $op->getempinfoById($empDept['emp_id'], 'emp_name'); ?> </td>
                                <td class="p-1"> <?php echo $empDept['emp_debt_date']; ?> </td>
                                <td class="p-1 text-center"> $<?php echo $empDept['emp_debt_amount']; ?> </td>
                                <td class="p-1 text-center">
                                    <?php $numb = $empDept['emp_debt_id']; ?>
                                    <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=debt&a=edit&ids=<?php echo $numb; ?>" class="btn success-color-dark py-1 px-3 text-white"> <i class="fa fa-pencil p-0"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>