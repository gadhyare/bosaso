<?php

/**
 * fileName:   تعديل مرحلة دراسية
 */
?>

<script type="text/javascript">
    function showhidden() {

        $("select[name=active]").change(function() {
            $("input[name=selected_value]").val($(this).val());
        });
    }
</script>
<div class="col-md-8   mx-auto">
    <?php if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    } ?>
</div>
<div class="card  p-2 border z-depth-0">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <?php foreach ($viewmodel as $edit_items) : ?>
            <div class="form-group">
                <label><?= $op->lang("educational level"); ?></label>
                <input type="text" name="edulev_name_edit" value="<?php echo $edit_items['edulev_name']; ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("educational level"); ?>">
            </div>
            <div class="form-group">
                <label> <?= $op->lang("code"); ?> </label>
                <input type="text" name="code_edit" class="form-control p-1  rounded-0" value="<?php echo $edit_items['code']; ?>">
            </div>
            <div class="form-group">
                <label><?= $op->lang("status"); ?></label>
                <select name="active_edit" id="" class="form-control p-1  rounded-0">
                    <?php $op->is_active($op->pro_field($edit_items['active'])); ?>
                </select>
            </div>
        <?php endforeach; ?>
    </form>
</div>