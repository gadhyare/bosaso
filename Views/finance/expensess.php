<?php

/**
 * fileName: المصروفات
 */
?>
<div class="container">
    <div class="row">
        <?php $op = new Khas(); ?>
        <div class="col-xs-12 col-md-4  ">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php if (isset($_GET['a']) && $_GET['a'] == 'edit') : ?>
                    <?php $empupdate = $op->getgetexpensessToUpdate($_GET['ids']); ?>
                    <?php foreach ((array) $empupdate as $empupdatedo) : ?>
                        <div class="card p-0 rounded-0">
                            <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> تعديل النفقات المختارة </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exptypeid"> نوعية النفقات </label>
                                    <select name="exptypeid" id="exptypeid" class="form-control p-0 alert-info rounded-0">
                                        <?php $op->getexptypeList(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="acc_mov"> رقم الحساب </label>
                                    <select name="acc_mov" id="acc_mov" class="form-control rounded-0 p-0">
                                        <?php $op->getBankDataList(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="expensess_date"> التاريخ </label>
                                    <input type="date" name="expensess_date" id="expensess_date" value="<?php echo $empupdatedo['expensess_date']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>

                                <div class="form-group">
                                    <label for="expensess_amount"> المبلغ </label>
                                    <input type="number" name="expensess_amount" id="expensess_amount" value="<?php echo $empupdatedo['expensess_amount']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>


                                <div class="form-group">
                                    <label for="expensess_note"> التفاصيل </label>
                                    <textarea name="expensess_note" id="expensess_note" cols="30" rows="3" class="form-control p-0 alert-info rounded-0"><?php echo $empupdatedo['expensess_note']; ?></textarea>
                                </div>

                                <button type="submit" name="updateRecExpeness" class="btn success-color-dark text-white m-auto col-8 py-2"> <i class="fa fa-send"></i> </button>
                                <button type="submit" name="DeleteRecExpeness" class="btn danger-color-dark text-white m-auto col-3 float-left py-2"> <i class="fa fa-trash-o"></i> </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="card p-0 rounded-0">
                        <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> <?=$op->lang("add");?> نفقات جديدة </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exptypeid"> نوعية النفقات </label>
                                <select name="exptypeid" id="exptypeid" class="form-control p-0 alert-info rounded-0">
                                    <?php $op->getexptypeList(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="acc_mov"> رقم الحساب </label>
                                <select name="acc_mov" id="acc_mov" class="form-control rounded-0 p-0">
                                    <?php $op->getBankDataList(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="expensess_date"> التاريخ </label>
                                <input type="date" name="expensess_date" id="expensess_date" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <div class="form-group">
                                <label for="expensess_amount"> المبلغ </label>
                                <input type="number" name="expensess_amount" id="expensess_amount" class="form-control p-0 alert-info rounded-0" required>
                            </div>

                            <div class="form-group">
                                <label for="expensess_note"> التفاصيل </label>
                                <textarea name="expensess_note" id="expensess_note" cols="30" rows="3" class="form-control p-0 alert-info rounded-0"></textarea>
                            </div>
                            <button type="submit" name="addRecExpeness" class="btn success-color-dark text-white m-auto col-12 py-2"> <i class="fa fa-send"></i> </button>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-xs-12 col-md-8  ">
            <div class="card p-0 rounded-0">
                <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> قائمة النفقات </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead class="border">
                            <th class="p-1  border text-center alert-info text-dark"> # </th>
                            <th class="p-1  border text-center alert-info text-dark"> نوعية النفقة </th>
                            <th class="p-1  border text-center alert-info text-dark"> التاريخ </th>
                            <th class="p-1  border text-center alert-info text-dark"> المبلغ </th>
                            <th class="p-1  border text-center alert-info text-dark"> العمليات </th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $r = $op->getexpensess(); ?>
                            <?php foreach ((array) $r as $empExpeness) : ?>
                                <tr>
                                    <td class="p-1"> <a href="#" data-toggle="tooltip" title="<?php echo $empExpeness['expensess_note']; ?>"><?php echo $i++; ?></a> </td>
                                    <td class="p-1"> <?php echo $op->getSelexptypetxt($empExpeness['exptypeid']); ?> </td>
                                    <td class="p-1"> <?php echo $empExpeness['expensess_date']; ?> </td>
                                    <td class="p-1 text-center"> $<?php echo $empExpeness['expensess_amount']; ?> </td>
                                    <td class="p-1 text-center">
                                        <?php $numb = $empExpeness['expensess_id']; ?>
                                        <a href="<?php echo ROOT_URL; ?>/finance/expensess?a=edit&ids=<?php echo $numb; ?>" class="btn success-color-dark py-1 px-3 text-white"> <i class="fa fa-pencil p-0"></i> </a>
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