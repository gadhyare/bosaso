<?php

/**
 * fileName: حذف مجموعة
 */
?>
<div class="container">
    <?php if ($viewmodel) : ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <?php foreach ($viewmodel as $delete_items) : ?>
                <div class="container p-2 mt-2 alert alert-danger text-white text-center font-weight-bold col-xs-12 col-sm-10 col-md-6">
                    <p class="lead p-2 mt-2 text-center text-dark">
                        هل انت متأكد من حذف السجل [ <?php echo $delete_items['les_id']; ?> ] ؟
                    </p>
                    <input name="delete_items" type="submit" class="btn primary-color-dark text-white px-3 py-2  a-light py-2 text-weight-bold" value="نعم">
                    <a href="<?php echo ROOT_URL; ?>/coulesson" class="btn danger-color-dark py-2 text-weight-bold text-white">إلغاء</a>
                </div>
            <?php endforeach; ?>
        </form>
    <?php else : ?>
        <?php echo Data_Not_Founded; ?>
    <?php endif; ?>
</div>