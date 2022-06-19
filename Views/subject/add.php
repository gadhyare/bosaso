 <?php
    /**
     * fileName: الإضافة
     */
    ?>
 <div class="card  border p-3 z-depth-0">
     <div class="card-header  text-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("subjects"); ?> </div>
     <div class="card-body">
         <?php $op = new Khas(); ?>
         
         <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
             <div class="form-group">
                 <label> <?= $op->lang("subject name"); ?></label>
                 <input type="text" name="subject_name" id="subject_name" value="<?php echo $op->setPosts("subject_name"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم المادة الجديدة">
             </div>
             <div class="form-group">
                 <label><?= $op->lang("subject code"); ?></label>
                 <input type="text" name="subject_code" id="subject_code" value="<?php echo $op->setPosts("subject_code"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا كود المادة الجديدة">
             </div>
             <div class="form-group">
                 <label> <?= $op->lang("program"); ?> </label>
                 <select name="prog_id" id="prog_id" class="form-control p-1  rounded-0">
                     <?php echo $op->FullProgInfo(); ?>
                 </select>
             </div>
             <div class="form-group">
                 <label><?= $op->lang("status"); ?></label>
                 <select name="active" id="" class="form-control p-1  rounded-0">
                     <?php $op->is_active($_POST['active']); ?>
                 </select>
             </div>
         </form>
     </div>
 </div>