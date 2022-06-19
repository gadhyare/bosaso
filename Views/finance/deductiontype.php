<?php
/**
 * fileName: أنواع الخصوم
 */
?>
<div class="container">
    <div class="row">
        <?php $op = new Khas(); ?>
        <div class="col-xs-12 col-md-4  ">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php if (isset($_GET['a']) && $_GET['a'] == 'edit') : ?>
                    <?php $empupdate = $op->getdeductiontypeToUpdate($_GET['ids']); ?>
                    <?php foreach ((array) $empupdate as $empupdatedo) : ?>
                        <div class="card p-0 rounded-0">
                            <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> تعديل أنواع الخصوم المالية</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="deductiontype"> اسم الخصم المالي </label>
                                    <input type="text" name="deductiontype" id="deductiontype" value="<?php echo $empupdatedo['deductiontype']; ?>" class="form-control p-0 alert-info rounded-0" required>
                                </div>
                                <div class="form-group">
                                    <label for="active"> الحالة </label>
                                    <select name="active" id="active" class="form-control p-0 alert-info rounded-0">
                                        <?php echo ($empupdatedo['active'] == 1) ? '<option value="1"> مفعل </option><option value="2"> غير مفعل </option>' : '<option value="2"> غير مفعل </option><option value="1"> مفعل </option>'; ?>
                                    </select>
                                </div>
                                <button type="submit" name="updateRecDept" class="btn success-color-dark text-white m-auto col-8 py-2"> <i class="fa fa-send"></i> </button>
                                <button type="submit" name="DeleteRecDept" class="btn danger-color-dark text-white m-auto col-3 float-left py-2"> <i class="fa fa-trash-o"></i> </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="card p-0 rounded-0">
                        <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> أنواع الخصوم المالية </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="deductiontype"> اسم الخصم المالي </label>
                                <input type="text" name="deductiontype" id="deductiontype" value="<?php echo $op->setPosts('deductiontype'); ?>" class="form-control p-0 alert-info rounded-0" required>
                            </div>
                            <div class="form-group">
                                <label for="active"> الحالة</label>
                                <select name="active" id="active" class="form-control p-0 alert-info rounded-0">
                                    <option value="1"> مفعل </option>
                                    <option value="2"> غير مفعل </option>
                                </select>
                            </div>
                            <button type="submit" name="addRec" class="btn success-color-dark text-white m-auto col-12 py-2"> <i class="fa fa-send"></i> </button>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-xs-12 col-md-8  ">
            <div class="card p-0 rounded-0">
                <div class="card-header unique-color-dark text-white text-center p-1 rounded-0"> قائمة أنواع الخصوم المالية </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead class="border">
                            <th class="p-1  border text-center alert-info text-dark"> # </th>
                            <th class="p-1  border text-center alert-info text-dark"> اسم الخصم </th>
                            <th class="p-1  border text-center alert-info text-dark"> الحالة </th>
                            <th class="p-1  border text-center alert-info text-dark"> العمليات </th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $r = $op->getdeductiontype(); ?>
                            <?php foreach ((array) $r as $empDept) : ?>
                                <tr>
                                    <td class="p-1"> <?php echo $i++; ?> </td>
                                    <td class="p-1"> <?php echo  $empDept['deductiontype']; ?> </td>
                                    <td class="p-1"> <?php echo ($empDept['active'] == 1) ? 'مفعل' : 'غير مفعل'; ?> </td>
                                    <td class="p-1 text-center">
                                        <?php $numb = $empDept['deductiontype_id']; ?>
                                        <a href="<?php echo ROOT_URL; ?>/finance/deductiontype?a=edit&ids=<?php echo $numb; ?>" class="btn success-color-dark py-1 px-3 text-white"> <i class="fa fa-pencil p-0"></i> </a>
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