<?php

/**
 * fileName: سلة المهملات  للمستويات
 */
?>
<div class="container mt-3">
    <a href="<?php echo ROOT_URL; ?>/edulevel" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"><i class="fa fa-home" aria-hidden="true"></i> <?=$op->lang("home");?> </a>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="py-0 px-1 bg-dark"> <?= $op->lang("Serial"); ?></th>
                    <th class="py-0 px-1 bg-dark"> <?= $op->lang("educational level"); ?></th>
                    <th class="py-0 px-1 bg-dark"> <?= $op->lang("code"); ?> </th> 
                    <th class="py-0 px-1 bg-dark" colspan="2"><?= $op->lang("operation"); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($viewmodel as $item) : ?>

                    <tr>
                        <td class="p-1">
                            <?php echo $i++; ?>
                            <input type="checkbox" name="chid[]" id="chid" value="<?php echo $item['edulev_id']; ?>">
                        </td>
                        <td class="p-1"><?php echo $item['edulev_name'];  ?></td>
                        <td class="p-1"><?php echo $item['code'];  ?></td>
                        <td class="p-1">
                            <a href="<?php echo ROOT_URL; ?>/edulevel/trash?replace=yes&ids=<?php echo $item['edulev_id']; ?>" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-undo" aria-hidden="true"></i> </a>
                            <a href="<?php echo ROOT_URL; ?>/edulevel/trash?remove=yes&ids=<?php echo $item['edulev_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>