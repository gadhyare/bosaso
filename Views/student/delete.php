<?php

/**
 * fileName: حذف معلومات   طالب
 */
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <?php foreach ($viewmodel as $delete_items) : ?>
        <div class="container p-2 mt-2 danger-color-dark text-white text-center font-weight-bold ">
            <p class="lead p-2 mt-2 text-center text-dark">
                are you sure to delete the record [ <?php echo $delete_items['StuName']; ?> ] ؟
            </p>
            <input name="delete_items" type="submit" class="btn primary-color-dark text-white px-3 py-2  a-light py-2 text-weight-bold" value="<?=$op->lang("delete");?>">
            <a href="<?php echo ROOT_URL; ?>/student/info" class="btn danger-color-dark py-2 text-weight-bold text-white"><?=$op->lang("cancel");?></a>
        </div>

    <?php endforeach; ?>
</form>