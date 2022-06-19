  <?php
    /**
     * fileName:      مؤهلات الموظف  
     */
    ?>
  <?php $id = (isset($_GET['id'])) ? $_GET['id'] : ''; ?>
  <?php if ($id) : ?> 
          <div class="clearfix"></div>
          <div class="container col-xs-12 col-md-6  m-auto bg-white text-right z-depth-0">
              <div class="card  z-depth-0 border  rounded-0 ">
                  <div class="card-header py-2 px-1 text-center border-0 rounded-0 p-1 unique-color-dark text-white "> <?=$op->lang("qmployee Qualifications");?></div>
                  <div class="card-body px-2 border  rounded-0 ">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group row">
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_type"> <?=$op->lang("qualifications");?> </label>
                                  <input type="text" name="emp_qual_type" id="emp_qual_type" class="form-control p-1 rounded-0">
                              </div>
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_degree"> <?=$op->lang("qualification degree");?> </label>
                                  <select name="emp_qual_degree" id="emp_qual_degree" class="form-control p-1 rounded-0">
                                        <option value="1"><?=$op->lang("middle school");?></option>
                                        <option value="2"><?=$op->lang("Secondary/Scientific");?> </option>
                                        <option value="3"><?=$op->lang("Secondary/Literary");?> </option>
                                        <option value="4"><?=$op->lang("Secondary/Legal");?> </option>
                                        <option value="5"><?=$op->lang("Secondary/Industrial");?> </option>
                                        <option value="6"><?=$op->lang("Secondary/Agricultural");?> </option>
                                        <option value="7"><?=$op->lang("Bachelor");?> </option>
                                        <option value="8"><?=$op->lang("Higher Diploma");?> </option>
                                        <option value="9"><?=$op->lang("Master");?> </option>
                                        <option value="10"><?=$op->lang("PhD");?> </option>
                                        <option value="11"><?=$op->lang("other");?> </option>
                                  </select>

                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_year">   <?=$op->lang("qualification date");?> </label>
                                  <input type="date" name="emp_qual_year" id="emp_qual_year" class="form-control p-1 rounded-0">
                              </div>
                              <div class="col-xs-12 col-md-6">
                                  <label for="emp_qual_lang"><?=$op->lang("qualification language");?> </label>

                                  <select name="emp_qual_lang" id="emp_qual_lang" class="form-control p-1 rounded-0">
                                      <option value="<?=$op->lang("somali");?>"><?=$op->lang("somali");?></option>
                                      <option value="<?=$op->lang("arabic");?>"><?=$op->lang("arabic");?></option>
                                      <option value="<?=$op->lang("english");?>"><?=$op->lang("english");?></option>
                                      <option value="<?=$op->lang("french");?>"><?=$op->lang("french");?></option>
                                      <option value="<?=$op->lang("other");?>"><?=$op->lang("other");?></option>
                                  </select>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="emp_qual_hand">  <?=$op->lang("issuer");?> </label>
                              <input type="text" name="emp_qual_hand" id="emp_qual_hand" class="form-control p-1 rounded-0">
                          </div>
                          <div class="form-group">
                              <label for="emp_qual_note"> <?=$op->lang("notes about qualification");?> </label>
                              <textarea name="emp_qual_note" id="emp_qual_note" cols="30" rows="3" class="form-control p-1 rounded-0"></textarea>
                          </div>
                          <button type="submit" name="addRec" class="btn success-color-dark text-white px-3 py-1"> <?=$op->lang("save");?>   </button>
                          <a href="<?php echo ROOT_URL; ?>/employees/empinfoupdate/<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white px-3 py-1  float-left"> <?=$op->lang("go back");?> </a>
                      </form>
                  </div>
              </div>
          </div>
      <?php endif; ?>