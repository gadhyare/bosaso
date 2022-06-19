 <?php
    /**
     * fileName: تعديل قسم أكاديمي
     */
    ?>
    <?php $op = new Khas;?>
 <div class="card z-depth-0 p-3 border ">
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
         <?php foreach ($viewmodel as $edit_items) : ?>
             <div class="form-group">
                 <label><?= $op->lang("academics"); ?></label>
                 <input type="text" name="academics_edit" value="<?php echo $edit_items['academics'] ?>" class="form-control p-1  rounded-0" placeholder="<?=$op->lang("academics");?>">
             </div>
             <div class="form-group">
                 <label> <?= $op->lang("code"); ?> </label>
                 <input type="text" name="code_edit" value="<?php echo $edit_items['code'] ?>" class="form-control p-1  rounded-0" placeholder="<?=$op->lang("code");?>">
             </div>
             <div class="form-group">
                 <label><?= $op->lang("status"); ?></label>
                 <select name="selected_value" id="selected_value" class="form-control p-1  rounded-0" onclick="showhidden()">
                     <?php $op->is_active($edit_items['active']); ?>
                     ?>
                 </select>
             </div>
         <?php endforeach; ?>
     </form>
 </div>