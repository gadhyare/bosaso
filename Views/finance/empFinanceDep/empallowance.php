<div class="container">
    <div class="row">
        <?php $op = new Khas(); ?>
        <div class="col-xs-12 col-md-4  ">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php if (isset($_GET['a']) && $_GET['a'] == 'edit') : ?>
                    <?php $empupdate = $op->getEmpallowanceoUpdate($_GET['ids']); ?>
                    <?php foreach ((array) $empupdate as $empallowancedo) : ?>
                        <div class="card p-0 rounded-0">
                            <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"><?=$op->lang("employee bonus update");?> </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="emp_id"><?=$op->lang("name");?></label>
                                    <select name="emp_id" id="emp_id" class="form-control rounded-0 p-0">
                                        <?php $op->getempList(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="action_month"><?=$op->lang("financial month");?></label>
                                    <input type="month" name="action_month" id="action_month" value="<?php echo $empallowancedo['action_month']; ?>" class="form-control rounded-0 p-0">
                                </div>
                                <div class="form-group">
                                    <label for="allowancetype_id"><?=$op->lang("bonus type");?></label>
                                    <select name="allowancetype_id" id="allowancetype_id" class="form-control p-0 alert-info rounded-0">
                                        <?php $op->gSeltallowancetypeList($empupdatedo['allowancetype_id']); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="emp_allowance_date"><?=$op->lang("date");?></label>
                                    <input type="date" name="emp_allowance_date" id="emp_allowance_date" value="<?php echo $empallowancedo['emp_allowance_date']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>
                                <div class="form-group">
                                    <label for="emp_allowance_amount"><?=$op->lang("amount");?></label>
                                    <input type="number" name="emp_allowance_amount" id="emp_allowance_amount" value="<?php echo $empallowancedo['emp_allowance_amount']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>
                                <button type="submit" name="updateRecallowance" class="btn success-color-dark text-white m-auto col-8 py-2"> <i class="fa fa-send"></i> </button>
                                <button type="submit" name="Deleteemp_allowance" class="btn danger-color-dark text-white m-auto col-3 float-left py-2"> <i class="fa fa-trash-o"></i> </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="card p-0 rounded-0">
                        <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"><?=$op->lang("employee bonus registration");?></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="emp_id"><?=$op->lang("name");?></label>
                                <select name="emp_id" id="emp_idss" onchange="getRepos()" class="form-control p-0 alert-info rounded-0">
                                    <?php $op->getempList(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="action_month"><?=$op->lang("financial month");?></label>
                                <input type="month" name="action_month" id="action_month" class="form-control rounded-0 p-0">
                            </div>
                            <div class="form-group">
                                <label for="allowancetype_id"><?=$op->lang("bonus type");?></label>
                                <select name="allowancetype_id" id="allowancetype_id" class="form-control p-0 alert-info rounded-0">
                                    <?php $op->getallowancetypeList(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emp_allowance_date"><?=$op->lang("date");?></label>
                                <input type="date" name="emp_allowance_date" id="emp_allowance_date" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <div class="form-group">
                                <label for="emp_allowance_amount"><?=$op->lang("amount");?></label>
                                <input type="number" name="emp_allowance_amount" id="emp_allowance_amount" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <button type="submit" name="addRecallowance" class="btn success-color-dark text-white m-auto col-12 py-2"> <i class="fa fa-send"></i> </button>
                        </div>
                    </div>

                <?php endif; ?>
            </form>
            <div id="uio" class="p-2 danger-color-dark text-white text-center"></div>
        </div>
        <div class="col-xs-12 col-md-8  ">
            <div class="card p-0 rounded-0">
                <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"><?=$op->lang("employee bonus list");?> </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead class="border">
                            <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("no");?></th>
                            <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("name");?></th>
                            <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("date");?></th>
                            <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("bouns type");?></th>
                            <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("amount");?></th>
                            <th class="p-1  border text-center alert-info text-dark"><?=$op->lang("operation");?></th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $r = $op->getemp_allowance(); ?>
                            <?php foreach ((array) $r as $empallowance) : ?>
                                <tr>
                                    <td class="p-1"> <?php echo $i++; ?> </td>
                                    <td class="p-1"> <?php echo $op->getempinfoById($empallowance['emp_id'], 'emp_name'); ?> </td>
                                    <td class="p-1"> <?php echo $empallowance['emp_allowance_date']; ?> </td>
                                    <td class="p-1 text-center"> <?php echo $op->getSeltallowancetypetxt($empallowance['allowancetype_id']); ?> </td>
                                    <td class="p-1 text-center"> $<?php echo $empallowance['emp_allowance_amount']; ?> </td>
                                    <td class="p-1 text-center">
                                        <?php $numb = $empallowance['emp_allowance_id']; ?>
                                        <a href="<?php echo ROOT_URL; ?>/finance/empfinance?type=allowance&a=edit&ids=<?php echo $numb; ?>" class="btn success-color-dark py-1 px-3 text-white"> <i class="fa fa-pencil p-0"></i> </a>
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
