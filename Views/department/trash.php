<?php

/**
 * fileName: سلة المهملات  للمستويات
 */
?>
<div class="container mt-3">
    <a href="<?php echo ROOT_URL; ?>/department" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"><i class="fa fa-home" aria-hidden="true"></i> الرئيسية </a>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="p-1 bg-dark text-center"> <?= $op->lang("Serial"); ?></th>
                    <th class="p-1 bg-dark"> <?= $op->lang("shift name"); ?> </th>
                    <th class="p-1 bg-dark text-center"><?= $op->lang("operation"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($viewmodel as $item) : ?>
                    <?php $status = ($op->pro_field($item['active']) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
                    <tr>
                        <td class="p-1">
                            <?php echo $i++; ?>
                            <input type="checkbox" name="chid[]" id="chid" value="<?php echo $op->pro_field($item['dep_id']); ?>">
                        </td>
                        <td class="p-1"><?php echo $op->pro_field($item['department_name']);  ?></td>
                        <td class="p-1">
                            <a href="<?php echo ROOT_URL; ?>/department/trash?replace=yes&ids=<?php echo $op->pro_field($item['dep_id']); ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-undo" aria-hidden="true"></i> </a>
                            <a href="<?php echo ROOT_URL; ?>/department/trash?remove=yes&ids=<?php echo $op->pro_field($item['dep_id']); ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>