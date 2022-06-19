 <?php
    /**
     * fileName: <?=$op->lang("add");?> عضو جديد
     */
    ?>
 <?php $op = new Khas(); ?>
 <div class="container mt-5 col-xs-12 col-md-6 m-auto">
     <div class="card  ">
         <div class="card-header  text-white unique-color-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("user"); ?> </div>
         <div class="card-body">
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                 <div class="row">
                     <div class="form-group col-xs-12 col-md-6">
                         <label> <?= $op->lang("user name"); ?></label>
                         <input type="text" name="user_name" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("user name"); ?>">
                     </div>
                     <div class="form-group col-xs-12 col-md-6">
                         <label> <?= $op->lang("email"); ?></label>
                         <input type="email" name="email" class="form-control p-1  rounded-0" placeholder="someone@exmple.com">
                     </div>
                     <div class="form-group col-xs-12 col-md-6">
                         <label> <?= $op->lang("password"); ?></label>
                         <input type="password" name="password" class="form-control p-1  rounded-0" placeholder="****">
                     </div>
                     <div class="form-group col-xs-12 col-md-6">
                         <label><?= $op->lang("confirm password"); ?></label>
                         <input type="password" name="confirm_password" class="form-control p-1  rounded-0" placeholder="****">
                     </div>
                     <div class="form-group col-xs-12 col-md-6">
                         <label> <?= $op->lang("user level"); ?> </label>
                         <select name="role" id="" class="form-control p-1  rounded-0">
                             <?php $op->tran_user_role_list($_POST['role'] ?? ""); ?>
                         </select>
                     </div>
                     <div class="form-group col-xs-12 col-md-6">
                         <label><?= $op->lang("status"); ?></label>
                         <select name="active" id="" class="form-control p-1  rounded-0">
                             <option value="1"><?= $op->lang("active"); ?></option>
                             <option value="2"><?= $op->lang("non active"); ?></option>
                         </select>
                     </div>
                 </div>
                 <input type="submit" name="submit" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
                 <a href="<?php echo ROOT_URL; ?>/user" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
             </form>
         </div>
     </div>
 </div>