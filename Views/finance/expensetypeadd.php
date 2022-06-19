<?php

/**
 * fileName: <?=$op->lang("add");?> أنواع الصرفيات
 */
?>
    <div class="card border p-3 z-depth-0 ">
        <div class="card-header   font-weight-bold text-center p-1 unique-color-dark text-white"> <?=$op->lang("add");?>  <?=$op->lang("expense type");?> </div>
        <div class="card-body">
            <?php $op = new Khas(); ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="exptype">  <?=$op->lang("expense type");?></label>
                    <input type="text" name="exptype" value="<?php echo $op->setPosts('exptype'); ?>" class="form-control p-1  rounded-0" placeholder="<?=$op->lang("expense type");?>">
                </div>
                <div class="form-group">
                    <label>  <?=$op->lang("status");?></label>
                    <select name="active" id="" class="form-control p-1  rounded-0">
                        <option value="1"><?=$op->lang("active");?></option>
                        <option value="2">  <?=$op->lang("non active");?></option>
                    </select>
                </div>
            </form>
        </div>
    </div>