<?php

/**
 * fileName: تعديل معلومات  طالب
 */
?>
<?php if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
} ?>
<div class="container  m-auto">
  <?php foreach ($viewmodel as $stu_info_update) { ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="container text-left">
        <button type="button" class="btn rgba-black-strong text-white float-right  py-1 px-3" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa  fa-folder-open"></i> <?= $op->lang("select image"); ?>
        </button>
      </div>
      <img src="<?php echo $op->get_image($stu_info_update['stu_pic']); ?>" alt="" id="student_img" style="width:100px;height:100px;" class="border bg-white border-danger img-thumbnail float-left">
      <br>
      <div class="clearfix"></div>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card mb-1  rounded-0">
          <div class="card-header accord-header  text-center    rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>" role="tab" id="headingOne">
            <h5 class="mb-0" style="font-size:90%">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= $op->lang("Student's personal information"); ?>
              </a>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block p-1 ">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> <?= $op->lang("name"); ?></label>
                      <input type="text" required="required" name="StuName" value="<?php echo $stu_info_update['StuName']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("name"); ?>">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> <?= $op->lang("id number"); ?></label>
                      <input type="text" name="stu_num" value="<?php echo $stu_info_update['stu_num']; ?>" class="form-control bg-white input-sm p-1  rounded-0">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> <?= $op->lang("mother"); ?></label>
                      <input type="text" required="required" value="<?php echo $stu_info_update['mothername']; ?>" name="mothername" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("mothers name"); ?>">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0  ">
                      <input type="hidden" name="stu_pic" value="<?php echo $op->setPosts("stu_pic"); ?>" id="stu_pics" value="">

                      <input type="hidden" name="u" value="<?php echo $_SESSION['ROOT_URL']; ?>" id="u">
                      <label> <?= $op->lang("register date"); ?></label>
                      <input type="date" name="reg_date" id="reg_date" class="form-control" value="<?php echo date("Y-m-d", time()); ?>">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label> <?= $op->lang("gender"); ?></label>
                      <select name="gender" class="form-control input-sm p-1  rounded-0" id="">
                        <option value="1" selected> <?= $op->lang("male"); ?> </option>
                        <option value="2"><?= $op->lang("female"); ?> </option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>    <?= $op->lang("date of birth"); ?> </label>
                      <input type="date" required="required" value="<?php echo $stu_info_update['DOB']; ?>" name="DOB" class="form-control input-sm p-1  rounded-0" placeholder=" <?= $op->lang("date of birth"); ?>   ">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>     <?= $op->lang("place of birth"); ?></label>
                      <input type="text" required="required" value="<?php echo $stu_info_update['POB']; ?>" name="POB" class="form-control input-sm p-1  rounded-0" placeholder=" <?= $op->lang("place of birth"); ?>   ">
                    </div>
                  </td>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>  <?= $op->lang("nationality"); ?> </label>
                      <input type="text" required="required" name="Natinality" value="<?php echo $stu_info_update['Natinality']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" <?= $op->lang("nationality"); ?> ">
                    </div>

                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>     <?= $op->lang("address"); ?></label>
                      <input type="text" required="required" name="StuAddress" value="<?php echo $stu_info_update['StuAddress']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="   <?= $op->lang("address"); ?> ">
                    </div>

                  </td>

                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>   <?= $op->lang("city"); ?></label>
                      <input type="text" required="required" name="city" value="<?php echo $stu_info_update['city']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" <?= $op->lang("city"); ?> ">
                    </div>
                  </td>

                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>   <?= $op->lang("country"); ?></label>
                      <input type="text" required="required" name="contry" value="<?php echo $stu_info_update['contry']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" <?= $op->lang("country"); ?> ">
                    </div>
                  </td>

                  <td>
                    <div class="form-group input-group-sm p-1 m-0">
                      <label>   <?= $op->lang("Phones"); ?></label>
                      <input type="text" required="required" name="Phones" value="<?php echo $stu_info_update['Phones']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" <?= $op->lang("Phones"); ?> ">
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
          <div class="card-body" style="background-color:<?php echo $op->getThemeColor(); ?>">
            <div class="modal-body tab-pane-scroll bg-white">
              <?php show_images(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>
  <div class="card mb-1  rounded-0">
    <div class="card-header accord-header  rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>" role="tab" id="headingThree">
      <h5 class="mb-0" style="font-size:90%">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         <?= $op->lang("Student's personal information"); ?>
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block p-1">
        <?php require("subfolderforstudentsinfo/Studentrelinfo.php"); ?>
      </div>
    </div>
  </div>
  <div class="card mb-1  rounded-0">
    <div class="card-header accord-header  rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>" role="tab" id="headingTwo">
      <h5 class="mb-0" style="font-size:90%">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <?= $op->lang("Student's academic qualifications"); ?>
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block p-1">
        <?php require("subfolderforstudentsinfo/Studentacademicinfo.php"); ?>
      </div>
    </div>
  </div>
  <div class="card mb-1  rounded-0">
    <div class="card-header accord-header  rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>" role="tab" id="headingFour">
      <h5 class="mb-0" style="font-size:90%">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsestudeis" aria-expanded="false" aria-controls="collapsestudeis">
               <?= $op->lang("Student's academic information"); ?>
        </a>
      </h5>
    </div>
    <div id="collapsestudeis" class="collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="card-block p-1">
        <table class="table table-bordered">
          <?php require("subfolderforstudentsinfo/StudentacademicPro.php"); ?>
        </table>
      </div>
    </div>
  </div>
</div>
</div>


<script>
  function reply_click(clicked_id) {
    var ps = document.getElementById("u").value + "/" + "uplouds/";
    document.getElementById("stu_pics").value = clicked_id;
    document.getElementById("student_img").src = ps + clicked_id;
  }
</script>