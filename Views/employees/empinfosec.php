  <?php
    /**
     * fileName:   معلومات  الموظف  
     */
    ?>
  <?php foreach ($viewmodel as $item) : ?>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
          <div class="container-fluid " > 
                  <?php $op = new Khas(); ?>
                  <span class="text-center my-3" style="font-size: 22px !important;"> <?=$op->lang("employee personal information");?> </span>
                  <br>
                  <br>
                  <br>
                   
                          <div class="row">
                              <div class="col-xs-12 col-md-10">
                                <div class="container">
                                    <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_name"><?=$op->lang("name");?>  </label>
                                              <input type="text" name="emp_name" id="emp_name" value="<?php echo $item['emp_name']; ?>" class="form-control   py-3 rounded-0" required>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_name"> <?=$op->lang("gender");?> </label>
                                              <select name="emp_gender" id="emp_gender" class="form-control   py-3 rounded-0">
                                                  <option value="1"><?=$op->lang("male");?></option>
                                                  <option value="2"><?=$op->lang("female");?></option>
                                              </select>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_DOB"> <?=$op->lang("date of birth");?></label>
                                              <input type="date" name="emp_DOB" id="emp_DOB" value="<?php echo  $item['emp_DOB']; ?>" min="1-1-1999" class="form-control   py-3 rounded-0" required>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_POB">   <?=$op->lang("place of birth");?> </label>
                                              <input type="text" name="emp_POB" id="emp_POB" value="<?php echo  $item['emp_POB']; ?>" class="form-control   py-3 rounded-0" required>
                                            </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_nationality"> <?=$op->lang("nationality");?> </label>
                                              <input type="text" name="emp_nationality" value="<?php echo  $item['emp_nationality']; ?>" id="emp_nationality" class="form-control   py-3 rounded-0" required>
                                            </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_address"> <?=$op->lang("address");?> </label>
                                              <input type="text" name="emp_address" id="emp_address" value="<?php echo  $item['emp_address']; ?>" class="form-control   py-3 rounded-0" required>
                                            </div> 
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_phones"> <?=$op->lang("phones");?> </label>
                                              <input type="text" name="emp_phones" id="emp_phones" value="<?php echo  $item['emp_phones']; ?>" class="form-control   py-3 rounded-0" required>
                                            </div> 
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_email">   <?=$op->lang("email");?> </label>
                                              <input type="email" name="emp_email" id="emp_email" value="<?php echo  $item['emp_email']; ?>" class="form-control   py-3 rounded-0" required>
                                            </div>
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_regDate">   <?=$op->lang("register date");?> </label>
                                              <input type="date" name="emp_regDate" id="emp_regDate" value="<?php echo  $item['emp_regDate']; ?>" class="form-control   py-3 rounded-0" required min="1-1-1999">
                                            </div> 
                                          <div class="col-xs-12 col-sm-12 col-md-4">
                                              <label for="emp_stustatus"> <?=$op->lang("status");?> </label>
                                              <select name="emp_stustatus" id="emp_stustatus" class="form-control  alert-info rounded-0 p-1">
                                                  <option value="1"> <?=$op->lang("active");?> </option>
                                                  <option value="2"> <?=$op->lang("non active");?> </option>
                                              </select>
                                            </div>
                                          <div class="col-xs-12 col-sm-12 col-md-8">
                                              <label for="emp_note"> <?=$op->lang("note");?> </label>
                                              <textarea name="emp_note" id="emp_note" class="form-control   py-3 rounded-0" cols="30" rows="3" required><?php echo  $item['emp_note']; ?></textarea>
                                            </div>  
                                    </div>
                                </div> 
                              </div>
                              <div class="col-xs-12 col-md-2 text-center">
                                  <input type="hidden" value="<?php echo  $item['emp_pic']; ?>" name="emp_pic_show">
                                  <img src="<?php echo ROOT_URL; ?>/uplouds/<?php echo ($item['emp_pic'] != "") ? $item['emp_pic'] : $op->siteSetting('siteLogo'); ?>" class="w-75 border" alt="">
                                  <input type="file" id="file" name="emp_pic" value="<?php echo ($item['emp_pic'] != '') ? $item['emp_pic'] : ''; ?>" class=" text-dark file-sec" accept="image/*">
                                  <label for="file" class="btn unique-color-dark text-white px-3 py-1 w-75" style="font-size: 70%"> </i> <?=$op->lang("select image");?> </label>
                                  <button type="submit" name="update_empInfo" class="btn success-color-dark text-white px-3 py-1 w-75"> <i class="fa fa-check px-4 py-1"></i> </button>
                              </div>
                          </div> 
          </div>
      </form>
  <?php endforeach; ?>