<?php

/**
 * fileName: عرض مهمة
 */
?>
<div class="container">
    <?php foreach ($viewmodel as $ite) { ?>
        <?php $status = ($ite['status'] == 1) ? '<option value="1"> عادية </option><option value="2"> مستعجلة </option><option value="3"> مستعجلة جداً </option>' : (($ite['status'] == 2) ? '<option value="2">عادية </option><option value="1"> عادية </option><option value="3"> مستعجلة </option>' : '<option value="3"> مستعجلة </option><option value="1"> عادية </option><option value="2">عادية </option>'); ?>
        <?php $act1 = '<option value="1">جاري العمل عليها  </option><option value="2"> تمت المهمة  </option><option value="3"> تم تأجيلها </option><option value="4"> تم إلغاؤها </option><option value="5"> تم تحويلها </option>'; ?>
        <?php $act2 = '<option value="2"> تمت المهمة  </option><option value="1"> جاري العمل عليها </option> <option value="3"> تم تأجيلها </option><option value="4"> تم إلغاؤها </option><option value="5"> تم تحويلها </option>'; ?>
        <?php $act3 = '<option value="3"> تم تأجيلها </option><option value="1"> جاري العمل عليها </option><option value="2"> تمت المهمة  </option><option value="4"> تم إلغاؤها </option><option value="5"> تم تحويلها </option>'; ?>
        <?php $act4 = '<option value="4"> تم إلغاؤها </option><option value="1"> جاري العمل عليها </option><option value="2"> تمت المهمة  </option><option value="3"> تم تأجيلها </option><option value="5"> تم تحويلها </option>'; ?>
        <?php $act5 = '<option value="5"> تم تحويلها </option><option value="1"> جاري العمل عليها </option><option value="2"> تمت المهمة  </option><option value="3"> تم تأجيلها </option><option value="4"> تم إلغاؤها </option>'; ?>
        <?php $active = ($ite['active'] == 1) ? $act1 : (($ite['active'] == 2) ? $act2 : (($ite['active'] == 3) ? $act3 : (($ite['active'] == 4) ? $act4 : (($ite['active'] == 4) ? $act4 : $act5)))); ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-5 p-3 forms">
            <div class="form-group">
                <?php echo $ite['title']; ?>
            </div>
            <?php $disabled = ($ite['user']  === $_SESSION["log_id"]) ? 'disabled' : '' ;?>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label> درجة العمل </label> <span class="float-left"> </span>
                        <select name="status_edit" class="form-control rounded-0" <?=$disabled;?>>
                            <?php echo $status; ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label> الحالة</label>
                        <select name="active_edit" class="form-control rounded-0 px-3 py-1">
                            <?php echo $active; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label> الموضوع </label>
                <p class="border p-1"><?php echo $ite['topic']; ?></p>
            </div>
            <div class="card rounded border">
                <div class="card-header danger-color-dark py-1 text-white h6">
                    من يرى الرسالة
                </div>
                <div class="card-body py-1">
                    <?php $p  = str_replace("[", '', str_replace("]", "", $ite['user_id'])); ?>
                    <?php $nm = explode(",", $p); ?>
                    <?php foreach ($nm as $name) : ?>
                        <?php $nw = str_replace('"', '', $name); ?>
                        <?php echo $op->get_user_info($nw, 'user_name'); ?> -
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
    <?php } ?>
</div>