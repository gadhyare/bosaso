<?php

/**
 * fileName: تعديل وسيلة تواصل
 */
?>

<div class="container col-xs-12 col-sm-12 col-md-6 m-auto">
    <div class="card">
        <div class="card-header">
            تعديل رابط موقع تواصل اجتماعي
        </div>
        <?php foreach ($viewmodel as $edit_items) : ?>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="socialmedia_name"> اسم الموقع </label>
                        <input type="text" name="socialmedia_name" id="socialmedia_name" class="form-control" value="<?php echo $edit_items["socialmedia_name"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="socialmedia_link"> رابط الموقع </label>
                        <input type="text" name="socialmedia_link" id="socialmedia_link" class="form-control" value="<?php echo $edit_items["socialmedia_link"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="socialmedia_logo"> شعار الموقع </label>
                        <input type="text" name="socialmedia_logo" id="socialmedia_logo" class="form-control" value="<?php echo $edit_items["socialmedia_logo"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="active"> حالة الموقع </label>
                        <select name="active" id="active" class="form-control">
                            <?php echo ($edit_items['active'] == 1)  ? '<option value="1">مفعل</option><option value="2">غير مفعل</option>' : '<option value="2">غير مفعل</option><option value="1">مفعل</option>'; ?>
                        </select>
                    </div>
                    <button type="submit" name="socialmediaedite" class="btn success-color-dark text-white float-right"> تعديل </button>
                    <a href="<?php echo ROOT_URL; ?>/settings/socialmedia" class="btn danger-color-dark text-white float-left"> <?=$op->lang("go back");?> </a>
                </form>
            </div>
        <?php endforeach; ?>


    </div>
</div>