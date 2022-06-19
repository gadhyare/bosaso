 <?php
    /**
     * fileName: التعديل
     */
    ?>

 <div class="card  p-3 z-depth-0 border">
     <div class="card-body">
         <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
             <?php foreach ($viewmodel as $edit_items) : ?>
                 <div class="form-group">
                     <label> <?= $op->lang("subject name"); ?></label>
                     <input type="text" name="subject_name_edit" value="<?php echo $edit_items['subject_name'] ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("subject name"); ?>">
                 </div>
                 <div class="form-group">
                     <label><?= $op->lang("subject code"); ?></label>
                     <input type="text" name="subject_code_edit" value="<?php echo $edit_items['subject_code'] ?>" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("subject code"); ?>">
                 </div>
                 <div class="form-group">
                     <label> <?= $op->lang("program"); ?> </label>
                     <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0">
                         <?php echo $op->FullSelProgInfo($edit_items['prog_id']); ?>
                     </select>
                 </div>
                 <div class="form-group">
                     <label><?= $op->lang("status"); ?></label>
                     <select name="selected_value" id="selected_value" class="form-control p-1  rounded-0">
                         <?php $op->is_active($edit_items['active']); ?>
                     </select>
                 </div>
             <?php endforeach; ?>
         </form>
     </div>
 </div>