     <?php
        /**
         * fileName: تعديل كلية
         */
        ?>
     <div class="card p-2 z-depth-0 border ">
         <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
             <?php foreach ($viewmodel as $edit_items) : ?>
                 <div class="form-group">
                     <label><?= $op->lang("faculty"); ?></label>
                     <input type="text" name="fac_name_edit" value="<?php echo $edit_items['fac_name']; ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("faculty"); ?>">
                 </div>
                 <div class="form-group">
                     <label><?= $op->lang("code"); ?></label>
                     <input type="text" name="code_edit" value="<?php echo $edit_items['code']; ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("code"); ?>">
                 </div>
                 <div class="form-group">
                     <label><?= $op->lang("status"); ?></label>
                     <select name="active_edit" id="" class="form-control p-1  rounded-0">
                         <?php $op->is_active($edit_items['active']); ?>
                     </select>
                 </div>
             <?php endforeach; ?>
         </form>
     </div>
     </div>