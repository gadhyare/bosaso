  <?php
    /**
     * fileName: تسجيل موظف جديد
     */
    ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <div class="container  m-auto bg-white text-right">


          <div class="clearfix"></div>
          <div class="card">
              <?php $op = new Khas(); ?>
              <div class="card-header unique-color-dark text-white p-1">  <?=$op->lang("employee information") ;?>   </div>
              <div class="card-body">
                  <div class="container">
                      <div class="row">
                          <div class="col-xs-12 col-md-10">
                              <table class="table ">
                                  <tr>
                                      <td class="p-1">
                                          <label for="emp_name"> <?=$op->lang("name") ;?></label>
                                          <input type="text" name="emp_name" id="emp_name" value="<?php echo  $op->setPosts('emp_name'); ?>" class="form-control rounded-0 p-0" required>
                                      </td>
                                      <td class="p-1">
                                          <label for="emp_name"> <?=$op->lang("gender") ;?> </label>
                                          <select name="emp_gender" id="emp_gender" class="form-control rounded-0 p-0">
                                              <option value="1"><?=$op->lang("male") ;?></option>
                                              <option value="2"><?=$op->lang("female") ;?></option>
                                          </select>
                                      </td>
                                      <td class="p-1">
                                          <label for="emp_DOB"> <?=$op->lang("date of birth") ;?></label>
                                          <input type="date" name="emp_DOB" id="emp_DOB" value="<?php echo  $op->setPosts('emp_DOB'); ?>" min="1-1-1999" class="form-control rounded-0 p-0" required>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="p-1">
                                          <label for="emp_POB"> <?=$op->lang("place of birth") ;?> </label>
                                          <input type="text" name="emp_POB" id="emp_POB" value="<?php echo  $op->setPosts('emp_POB'); ?>" class="form-control rounded-0 p-0" required>
                                      </td>


                                      <td class="p-1">
                                          <label for="emp_nationality"> <?=$op->lang("nationality") ;?> </label>
                                          <input type="text" name="emp_nationality" value="<?php echo  $op->setPosts('emp_nationality'); ?>" id="emp_nationality" class="form-control rounded-0 p-0" required>
                                      </td>
                                      <td class="p-1">
                                          <label for="emp_address"> <?=$op->lang("address") ;?> </label>
                                          <input type="text" name="emp_address" id="emp_address" value="<?php echo  $op->setPosts('emp_address'); ?>" class="form-control rounded-0 p-0" required>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="p-1">
                                          <label for="emp_phones"> <?=$op->lang("phones") ;?> </label>
                                          <input type="text" name="emp_phones" id="emp_phones" value="<?php echo  $op->setPosts('emp_phones'); ?>" class="form-control rounded-0 p-0" required>
                                      </td>

                                      <td class="p-1">
                                          <label for="emp_email"> <?=$op->lang("email") ;?> </label>
                                          <input type="email" name="emp_email" id="emp_email" value="<?php echo  $op->setPosts('emp_email'); ?>" class="form-control rounded-0 p-0" required>
                                      </td>
                                      <td class="p-1">
                                          <label for="emp_regDate"> <?=$op->lang("register date") ;?></label>
                                          <input type="date" name="emp_regDate" id="emp_regDate" value="<?php echo  $op->setPosts('emp_regDate'); ?>" class="form-control rounded-0 p-0" required min="1-1-1999">
                                      </td>
                                  </tr>
                                  <tr>
                                      <td class="p-1">
                                          <label for="emp_stustatus"> <?=$op->lang("status") ;?> </label>

                                          <select name="emp_stustatus" id="emp_stustatus" class="form-control rounded-0 p-1">
                                              <option value="1"> <?=$op->lang("male") ;?> </option>
                                              <option value="2"> <?=$op->lang("female") ;?> </option>
                                          </select>
                                      </td>

                                      <td colspan="2" class="p-1">
                                          <label for="emp_note"> <?=$op->lang("note") ;?> </label>
                                          <textarea name="emp_note" id="emp_note" class="form-control rounded-0 p-0" cols="30" rows="3" required><?php echo  $op->setPosts('emp_note'); ?></textarea>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                          <div class="col-xs-12 col-md-2 text-center">
                              <input type="hidden" value="<?php echo  $op->setPosts('emp_pic'); ?>" name="emp_pic_show">
                              <img src="<?php echo ROOT_URL; ?>/uplouds/<?php echo ($op->setPosts('emp_pic') != "") ? $op->setPosts('emp_pic') : $op->siteSetting('siteLogo'); ?>" class="w-75 border" alt="">
                              <input type="file" id="file" name="emp_pic" class=" text-dark file-sec" accept="image/*">
                              <label for="file" class="btn unique-color-dark text-white px-3 py-1 w-75" style="font-size: 90%"> </i>   <?=$op->lang("select image") ;?></label>

                              <button type="submit" name="add_empInfo" class="btn success-color-dark text-white px-3 py-1 w-75"> <i class="fa fa-check px-4 py-1"></i> </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </form>