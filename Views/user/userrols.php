  <?php
  /**
   * fileName: تحديد الصفحات الممنوعة من الأعضاء
   */
  ?>
  <?php $op = new Khas(); ?>

  <div class="card">

    <div class="card-header">
      <h4 class="text-center col-6 m-auto text-success "> </h4>
      <i class="fa fa-user float-right text-right"> <?php echo  $op->get_user_info($_GET['userid'], 'user_name'); ?></i>
      <i class="fa fa-list float-left text-right"> <?php echo  $op->tran_user_role($op->get_user_info($_GET['userid'], 'role')); ?></i>
    </div>
    <div class="card-body">
      <?php
      $appility = new Abillity();
      $op = new Khas();
      $fun = $op->stringify($op->get_user_info($_GET['userid'], 'role'));
      $appility_info = $appility->$fun();
      $arr = implode(",", array_keys($appility_info));
      $folders = explode(",", $arr);
      $dir =     getcwd();
      foreach ($folders as $folder => $subfolder) :
      ?> <form action="<?php $_SERVER['PHP_SELF']; ?>?userid=<?php echo $_GET['userid']; ?>&info=<?php echo $subfolder; ?>" method="post" id="<?php echo $subfolder; ?>" name="<?php echo $subfolder; ?>">
          <button type="submit" class="btn danger-color-dark py-1 px-3 text-white float-left" name="btn-<?php $subfolder; ?>"> <?= $op->lang("update"); ?></button>
          <a href="<?php echo ROOT_URL; ?>/user/userrols?userid=<?php echo $_GET['userid']; ?>&info=<?php echo $subfolder; ?>&act=reset" class="btn btn-dark py-1 px-3 text-white float-left"> <?= $op->lang("reset section settings"); ?> </a>
          <?php
          echo   "<h5 class='text-right text-white primary-color-dark p-2'>::: " .   $op->get_stting_arabic($subfolder, $fun) . "  </h5>";
          if (strlen($subfolder) > 2) : ?>
            <div class="row">
              <?php $da = preg_grep('/^([^.])/', scandir($dir . "/Views/$subfolder"));
              foreach ($da as $subfolders => $t) :
                if (is_file($dir . "/Views/$subfolder/$t")) : ?>
                  <div class="form-group col-3 ">
                    <input type="checkbox" name="<?php echo  pathinfo($t, PATHINFO_FILENAME); ?>" id="" <?php echo $op->chk_pages_rols($_GET['userid'], $subfolder, pathinfo($t, PATHINFO_FILENAME)); ?>>
                    <?php echo  $op->get_file_name($dir . "/Views/$subfolder/$t"); ?>
                  </div>
                <?php endif; ?>
              <?php endforeach;   ?>
            </div>
          <?php endif; ?>
        </form>
      <?php endforeach;      ?>
    </div>
  </div>
  </div>