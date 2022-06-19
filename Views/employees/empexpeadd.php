  <?php
    /**
     * fileName:     خبرات  سابقة للموظف
     */
    ?>
  <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
  <?php if ($id) : ?>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="clearfix"></div>
          <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
              <div class="card  z-depth-0 border  rounded-0 ">
                  <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> مؤهلات الموظف </div>
                  <div class="card-body px-2 border  rounded-0 ">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group  ">
                              <label for="empexpe_est"> <?=$op->lang("employer");?> </label>
                              <input type="text" name="empexpe_est" id="empexpe_est" class="form-control p-1 rounded-0">
                              <div class="form-group row">
                                  <div class="col-xs-12 col-md-6">
                                      <label for="empexpe_strdate"><?=$op->lang("register date");?></label>
                                      <input type="date" name="empexpe_strdate" id="empexpe_strdate" class="form-control p-1 rounded-0">
                                  </div>
                                  <div class="col-xs-12 col-md-6">
                                      <label for="empexpe_title"><?=$op->lang("job title");?></label>
                                      <input type="text" name="empexpe_title" id="empexpe_title" class="form-control p-1 rounded-0">
                                      </select>
                                  </div>

                              </div>
                              <div class="form-group row">
                                  <div class="col-xs-12 col-md-6">
                                      <label for="empexpe_degree"><?=$op->lang("career grades");?></label>
                                      <input type="text" name="empexpe_degree" id="empexpe_degree" class="form-control p-1 rounded-0">
                                  </div>
                                  <div class="col-xs-12 col-md-6">
                                      <label for="empexpe_levdate"><?=$op->lang("date of leaving work");?></label>
                                      <input type="date" name="empexpe_levdate" id="empexpe_levdate" class="form-control p-1 rounded-0">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="empexpe_note"><?=$op->lang("notes on previous work");?></label>
                                  <textarea name="empexpe_note" id="empexpe_note" cols="30" rows="3" class="form-control p-1 rounded-0"></textarea>
                              </div>
                              <button type="submit" name="addRec" class="btn success-color-dark text-white px-3 py-1"> <?=$op->lang("save");?>   </button>
                              <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> <?=$op->lang("go back");?> </a>
                      </form>
                  </div>
              </div>
          </div>
      <?php endif; ?>