<div class="container">
    <div class="row">
        <?php $op = new Khas(); ?>
        <div class="col-xs-12 col-md-4  ">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php if (isset($_GET['a']) && $_GET['a'] == 'edit') : ?>
                    <?php $empupdate = $op->getEmpdeductiontoUpdate($_GET['ids']); ?>
                    <?php foreach ((array) $empupdate as $empdeductiondo) : ?>
                        <div class="card p-0 rounded-0">
                            <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("update a financial deduction for an employee");?></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="emp_id"><?=$op->lang("name");?></label>
                                    <select name="emp_id" id="emp_id" class="form-control p-0 alert-info rounded-0">
                                        <?php $op->getempList(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="action_month"> <?=$op->lang("financial month");?> </label>
                                <input type="month" name="action_month" id="action_month"  value="<?php echo $empdeductiondo['action_month'];?>" class="form-control rounded-0 p-0">
                            </div>
                                <div class="form-group">
                                    <label for="deductiontype_id"> <?=$op->lang("deduction type");?></label>
                                    <select name="deductiontype_id" id="deductiontype_id" class="form-control p-0 alert-info rounded-0">
                                        <?php $op->getSelltdeductiontypeList($empupdatedo['deductiontype_id']); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="emp_deductiont_date"> <?=$op->lang("date");?></label>
                                    <input type="date" name="emp_deductiont_date" id="emp_deductiont_date" value="<?php echo $empdeductiondo['emp_deductiont_date']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>
                                <div class="form-group">
                                    <label for="emp_deductiont_amount"> <?=$op->lang("amount");?> </label>
                                    <input type="number" name="emp_deductiont_amount" id="emp_deductiont_amount" value="<?php echo $empdeductiondo['emp_deductiont_amount']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>
                                <button type="submit" name="updateRecdeduction" class="btn success-color-dark text-white m-auto col-8 py-2"> <i class="fa fa-send"></i> </button>
                                <button type="submit" name="Deleteemp_deduction" class="btn danger-color-dark text-white m-auto col-3 float-left py-2"> <i class="fa fa-trash-o"></i> </button>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="card p-0 rounded-0">
                        <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("registration financial deduction for an employee");?></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="emp_id"> <?=$op->lang("name");?></label>
                                <select name="emp_id" id="emp_id" class="form-control p-0 alert-info rounded-0">
                                    <?php $op->getempList(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="action_month"> <?=$op->lang("financial month");?> </label>
                                <input type="month" name="action_month" id="action_month" class="form-control rounded-0 p-0">
                            </div>
                            <div class="form-group">
                                <label for="deductiontype_id"> <?=$op->lang("deduction type");?></label>
                                <select name="deductiontype_id" id="deductiontype_id" class="form-control p-0 alert-info rounded-0">
                                    <?php $op->getdeductiontypeList(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emp_deductiont_date"> <?=$op->lang("date");?></label>
                                <input type="date" name="emp_deductiont_date" id="emp_deductiont_date" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <div class="form-group">
                                <label for="emp_deductiont_amount"> <?=$op->lang("amount");?> </label>
                                <input type="number" name="emp_deductiont_amount" id="emp_deductiont_amount" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <button type="submit" name="addRecdeduction" class="btn success-color-dark text-white m-auto col-12 py-2"> <i class="fa fa-send"></i> </button>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-xs-12 col-md-8  ">
            <div class="card p-0 rounded-0">
                <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("list of financial deductions for employees");?> </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead class="border">
                            <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("no");?></th>
                            <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("name");?></th>
                            <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("date");?></th>
                            <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("deduction type");?></th>
                            <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("amount");?> </th>
                            <th class="p-1  border text-center alert-info text-dark"> <?=$op->lang("operation");?> </th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $r = $op->getemp_deductiont(); ?>
                            <?php foreach ((array) $r as $empdeduction) : ?>
                                <tr>
                                    <td class="p-1"> <?php echo $i++; ?> </td>
                                    <td class="p-1"> <?php echo $op->getempinfoById($empdeduction['emp_id'], 'emp_name'); ?> </td>
                                    <td class="p-1"> <?php echo $empdeduction['emp_deductiont_date']; ?> </td>
                                    <td class="p-1 text-center"> <?php echo $op->getSeltdeductiontypetxt($empdeduction['deductiontype_id']); ?> </td>
                                    <td class="p-1 text-center"> $<?php echo $empdeduction['emp_deductiont_amount']; ?> </td>
                                    <td class="p-1 text-center">
                                        <?php $numb = $empdeduction['emp_deductiont_id']; ?>
                                        <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=deduction&a=edit&ids=<?php echo $numb; ?>" class="btn success-color-dark py-1 px-3 text-white"> <i class="fa fa-pencil p-0"></i> </a>
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