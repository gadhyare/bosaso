  <?php
    /**
     * fileName:     تعديل دورات الموظف  
     */
    ?>
  <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
  <?php foreach ($viewmodel as $items) : ?>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="clearfix"></div>
          <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
              <div class="card  z-depth-0 border  rounded-0 ">
                  <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> <?=$op->lang("update");?>  <?=$op->lang("employee training courses");?></div>
                  <div class="card-body px-2 border  rounded-0 ">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group ">
                              <label for="tra_cou_title"> <?=$op->lang("course title");?> </label>
                              <input type="text" name="tra_cou_title" id="tra_cou_title" value="<?php echo $items['tra_cou_title']; ?>" class="form-control p-1 rounded-0">
                          </div>
                          <div class="form-group">
                              <label for="tra_cou_date"> <?=$op->lang("course date");?>  </label>
                              <input type="date" name="tra_cou_date" id="tra_cou_date" value="<?php echo $items['tra_cou_date']; ?>" class="form-control p-1 rounded-0">
                          </div>
                          <div class="form-group">
                              <label for="tra_cou_est"> <?=$op->lang("organisers");?> </label>
                              <input type="text" name="tra_cou_est" id="tra_cou_est" value="<?php echo $items['tra_cou_est']; ?>" class="form-control p-1 rounded-0">
                          </div>
                          <div class="form-group">
                              <label for="tra_cou_due"> <?=$op->lang("duration of the course");?></label>
                              <input type="text" name="tra_cou_due" id="tra_cou_due" value="<?php echo $items['tra_cou_due']; ?>" class="form-control p-1 rounded-0">
                          </div>
                          <button type="submit" name="updateRec" class="btn success-color-dark text-white px-3 py-1"> <?=$op->lang("update");?></button>
                          <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['emp_id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> <?=$op->lang("go back");?> </a>
                      </form>
                  </div>
              </div>
          </div>
      <?php endforeach; ?>