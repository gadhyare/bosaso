  <?php
    /**
     * fileName:      تعديل الأقسام الوظيفية
     */
    ?>
  <?php foreach ($viewmodel as $item) : ?>
      <div class="card border p-3 z-depth-0">
          <div class="card-header unique-color-dark text-center text-white p-1"> <?=$op->lang("update");?><?=$op->lang("career section");?> </div>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
              <div class="card-body p-2">
                  <div class="form-group">
                      <label for="em_sec_name"> <?=$op->lang("career section");?> </label>
                      <input type="text" name="em_sec_name" id="em_sec_name" value="<?php echo $item['em_sec_name']; ?>" class="form-control rounded-0 p-1">
                  </div>
                  <div class="form-group">
                      <label for="active"> <?=$op->lang("status");?> </label>
                      <select name="active" id="active" class="form-control rounded-0 p-1">
                          <?php $op->is_active($item['active']); ?>
                      </select>
                  </div>
              </div>
          </form>
      </div>
  <?php endforeach; ?>