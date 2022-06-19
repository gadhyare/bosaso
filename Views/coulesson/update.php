<?php

/**
 * fileName:  تعديل درس دورة
 */
?>
<?php $p = new Khas(); ?>

<div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
    <?php $p = new Khas(); ?>
    <?php if ($viewmodel) : ?>
        <?php foreach ($viewmodel as $item) : ?>
            <div class="card  ">
                <div class="card-header  text-dark font-weight-bold text-center p-1"> تعديل درس دورة </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group" id="div">
                            <label> عنوان الدورة </label>
                            <input type="text" name="les_link" id="les_link" value="<?php echo $item['les_link']; ?>" class="form-control p-1  rounded-0">

                        </div>
                        <input type="submit" name="edit_submit" value="تعديل" class="btn primary-color-dark text-white px-3 py-2">
                        <a href="<?php echo ROOT_URL; ?>/coulesson/<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white p-2">إلغاء</a>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <?php echo Data_Not_Founded; ?>
    <?php endif; ?>
</div>