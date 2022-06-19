<?php

/**
 * fileName: تعديل جهة دفع
 */
?>
<?php $item = json_decode($viewmodel); ?>
<?php foreach ($item as $key => $val) : ?>
    <div class="card border z-depth-0 p-3">
        <div class="card-header"> <?=$op->lang("update");?> <?=$op->lang("fee type");?>  </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for=""><?=$op->lang("fee type");?></label>
                    <input type="text" name="PaymentRes" id="PaymentRes" class="form-control" value="<?php echo $val->PaymentRes; ?>">
                </div>
                <div class="form-group">
                    <label for=""><?=$op->lang("status");?></label>
                    <select name="active" id="active" class="form-control p-0">
                        <?php $op->is_active($op->pro_field($val->active)); ?>
                    </select>
                </div> 
            </form>
        </div>
    </div>
<?php endforeach; ?>