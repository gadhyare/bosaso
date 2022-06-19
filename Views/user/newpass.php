         <?php if (isset($_GET['tokenid']) && $_GET['tokenid'] != "") : ?>
             <div class="card col-xs-12 col-md-4 m-auto  p-0 rounded-0 ">
                 <div class="card-header py-2 px-3 text-white text-center danger-color-dark">
                     <?php echo $op->lang("set new password"); ?>
                 </div>
                 <div class="card-body">
                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                         <div class="form-group">
                             <label for="user_password_edit"> <?php echo $op->lang("new password"); ?></label>
                             <input type="password" name="user_password_edit" id="user_password_edit" user_name class="form-control  ">
                         </div>
                         <div class="form-group">
                             <label for="user_password_confirm"> <?php echo $op->lang("confirma new password"); ?></label>
                             <input type="password" name="user_password_confirm" id="user_password_confirm" class="form-control   ">
                         </div>
                         <button type="submit" name="edit_usr_pass" class="btn col-12 py-2 m-auto unique-color-dark py-2 px-3 text-white"> <?php echo $op->lang("update password"); ?> </button>
                         <br>
                         <br>
                         <a href="<?php echo ROOT_URL; ?>/user/login" class="btn m-auto col-12 danger-color-dark text-white py-1 px-3"> <i class="fa fa-back"></i> <?php echo $op->lang("cancel"); ?> <i class="fa fa-reset"></i> </a>
                     </form>
                 </div>
             </div>
         <?php endif; ?>