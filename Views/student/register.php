<?php

/**
 * fileName:  تسجيل طالب
 */
?>

<?php $op = new Khas(); ?>
<div class="container">
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <button type="button" class="btn rgba-black-strong text-white float-right  py-2 px-3" data-toggle="modal" data-target="#exampleModalCenter">
      <i class="fa  fa-folder-open"></i> <?= $op->lang("select image"); ?>
    </button>
    <div class="container text-left">
      <input type="submit" name="add_stu" value="<?= $op->lang("next"); ?>" id="submit" class="btn bg-danger   rounded-0 text-white    mb-3  py-2 px-3">
      <a href="<?php echo ROOT_URL; ?>/student/info" class="btn primary-color-dark rounded-0 text-white mb-3 py-2 px-3"> <?= $op->lang("go back"); ?> </a>
    </div>
    <br>
    <div class="form-group input-group-sm p-1 m-0 text-center">
      <img src="" alt="" id="student_img" onError="this.onerror=null;this.src='<?php echo ROOT_URL; ?>/assets/img/1.png';" style="width:100px;height:100px;" class="border   float-left">
    </div>
    <div class="clearfix"></div>
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card mb-1  rounded-0">
        <div class="card-header accord-header mdb-color darken-3 text-center    rounded-0" role="tab" id="headingOne">
          <h5 class="mb-0 ">
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
                    <label>  <?= $op->lang("name"); ?> </label>
                    <input type="text" name="StuName" value="<?php echo $op->setPosts("StuName"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("name"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label>     <?= $op->lang("id number"); ?></label>
                    <input type="text" name="stu_num" value="<?php echo $op->setPosts("stu_num"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("id number"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label>  <?= $op->lang("mother"); ?></label>
                    <input type="text" name="mothername" value="<?php echo $op->setPosts("mothername"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("mother"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label>   <?= $op->lang("gender"); ?></label>
                    <select name="gender" class="form-control input-sm p-1  rounded-0" id="">
                      <option value="1" selected><?= $op->lang("male"); ?>   </option>
                      <option value="2">   <?= $op->lang("female"); ?></option>
                    </select>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> <?= $op->lang("date of birth"); ?> </label>
                    <input type="date" name="DOB" value="<?php echo $op->setPosts("DOB"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("date of birth"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label><?= $op->lang("place of birth"); ?></label>
                    <input type="text" name="POB" value="<?php echo $op->setPosts("POB"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("place of birth"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> <?= $op->lang("nationality"); ?> </label>
                    <input type="text" name="Natinality" value="<?php echo $op->setPosts("Natinality"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("nationality"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> <?= $op->lang("address"); ?></label>
                    <input type="text" name="StuAddress" value="<?php echo $op->setPosts("StuAddress"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("address"); ?>">
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> <?= $op->lang("city"); ?> </label>
                    <input type="text" name="city" value="<?php echo $op->setPosts("city"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("city"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> <?= $op->lang("country"); ?> </label>
                    <input type="text" name="contry" value="<?php echo $op->setPosts("contry"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("country"); ?>">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> <?= $op->lang("phones"); ?> </label>
                    <input type="text" name="Phones" value="<?php echo $op->setPosts("Phones"); ?>" class="form-control input-sm p-1  rounded-0" placeholder="<?= $op->lang("phones"); ?>">
                  </div>
                </td>
                <td>
                  <label for="reg_Date"><?= $op->lang("register date"); ?> </label>
                  <input type="date" name="reg_date" id="reg_date" class="form-control rounded-0 p-1 ">
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="stu_pic" value="<?php echo $op->setPosts("stu_pic"); ?>" id="stu_pic" value="">
    <input type="hidden" name="u" value="<?php echo $_SESSION['ROOT_URL']; ?>" id="u">
  </form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          <?= $op->lang("select file"); ?>
        </h5>
        <span class="float-left">
          <a href="<?php echo ROOT_URL; ?>/filemanager" class="btn primary-color-dark text-white p-1"><?= $op->lang("upload imag"); ?> </a>
        </span>
      </div>
      <div class="modal-body tab-pane-scroll">
        <?php show_images(); ?>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<script>
  function reply_click(clicked_id) {
    var ps = document.getElementById("u").value + "/" + "uplouds/";
    document.getElementById("stu_pic").value = clicked_id;
    document.getElementById("student_img").src = ps + clicked_id;
  }
</script>