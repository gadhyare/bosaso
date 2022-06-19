<?php

/**
 * fileName: المؤهلات العلمية للطالب
 */
?>
<?php if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
} ?>
<?php echo $op->get_report_header("معلومات الطالب"); ?>
<div class="container  m-auto">
  <?php foreach ($viewmodel as $stu_info_update) { ?>
    <div class="card mb-1  rounded-0">
      <div class="card-header mdb-color darken-3 text-white text-center    rounded-0" role="tab" id="headingOne">
        <h5 class="mb-0" style="font-size:90%">
          المعلومات الشخصية للطالب
        </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> اسم الطالب </label>
              <input type="text" required="required" name="StuName" value="<?php echo $stu_info_update['StuName']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="أدخل هنا اسم الطالب">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> الرقم الجامعي </label>
              <input type="text" name="stu_id" value="<?php echo $stu_info_update['stu_id']; ?>" class="form-control bg-white input-sm p-1  rounded-0">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> اسم الأم </label>
              <input type="text" required="required" value="<?php echo $stu_info_update['mothername']; ?>" name="mothername" class="form-control input-sm p-1  rounded-0" placeholder="اسم الأم">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0 text-center">
              <?php $stu_pic = ($stu_info_update['stu_pic'] != "") ? ROOT_URL . "/" . "uplouds/" . $stu_info_update['stu_pic'] : ""; ?>
              <img src="<?php echo $stu_pic; ?>" alt="" id="student_img" style="width:100px;height:100px;" class="border border-danger img-thumbnail">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> الجنس </label>
              <select name="gender" class="form-control input-sm p-1  rounded-0" id="">
                <option value="1" selected> ذكر </option>
                <option value="2"> أنثى </option>
              </select>
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> مكان الميلاد </label>
              <input type="text" required="required" value="<?php echo $stu_info_update['POB']; ?>" name="POB" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> الجنسية </label>
              <input type="text" required="required" name="Natinality" value="<?php echo $stu_info_update['Natinality']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الجنسية ">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> عنوان السكن </label>
              <input type="text" required="required" name="StuAddress" value="<?php echo $stu_info_update['StuAddress']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" عنوان السكن ">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> المدينة </label>
              <input type="text" required="required" name="city" value="<?php echo $stu_info_update['city']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" المدينة ">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> الدولة </label>
              <input type="text" required="required" name="contry" value="<?php echo $stu_info_update['contry']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الدولة ">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="form-group input-group-sm p-1 m-0">
              <label> الهواتف </label>
              <input type="text" required="required" name="Phones" value="<?php echo $stu_info_update['Phones']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الهواتف ">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-header mdb-color darken-3 text-white rounded-0" role="tab" id="headingThree">
      <h5 class="mb-0" style="font-size:90%">
        معلومات قريب للطالب
      </h5>
    </div>
    <div class="card-block p-1">
      <?php require("subfolderforstudentsinfo/Studentrelinfo.php"); ?>
    </div>
    <div class="card-header mdb-color darken-3 text-white rounded-0" role="tab" id="headingTwo">
      <h5 class="mb-0" style="font-size:90%">
        المؤهلات العلمية للطالب
      </h5>
    </div>
    <div class="card-block p-1">
      <?php require("subfolderforstudentsinfo/Studentacademicinfo.php"); ?>
    </div>
    <div class="card-header mdb-color darken-3 text-white rounded-0" role="tab" id="headingFour">
      <h5 class="mb-0" style="font-size:90%">
        المعلومات الدراسية للطالب
      </h5>
    </div>
    <div class="card-block p-1">
      <table class="table table-bordered">
        <?php require("subfolderforstudentsinfoStudentacademicPro.php"); ?>
      </table>
    </div>
</div>
<?php } ?>

<?php $op->get_report_footer(); ?>
</div>