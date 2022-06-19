<?php

/**
 * fileName:   اظهار معلومات طالب
 */
?>>
<?php if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
} ?>
<?php foreach ($viewmodel as $stu_info_update) { ?>

  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container text-left">
      <input type="submit" name="add_stu" value="تعديل بيانات طالب" class="btn danger-color-dark   rounded-0 text-white    mb-3  py-2 px-3" name="add_student">
      <a href="<?php echo ROOT_URL; ?>/student/info" class="btn primary-color-dark rounded-0 text-white mb-3 py-2 px-3"> الرجوع لبيانات الطلاب </a>

    </div>



    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card mb-1  rounded-0">
        <div class="card-header accord-header primary-color-dark text-center    rounded-0" role="tab" id="headingOne">
          <h5 class="mb-0 ">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              المعلومات الشخصية للطالب
            </a>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-block p-1 ">
            <table class="table table-bordered">
              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> اسم الطالب </label>
                    <input type="text" required="required" name="StuName" value="<?php echo $stu_info_update['StuName']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="أدخل هنا اسم الطالب">

                  </div>
                </td>

                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الرقم الجامعي </label>
                    <input type="text" name="StuNum" value="<?php echo $stu_info_update['StuNum']; ?>" class="form-control bg-white input-sm p-1  rounded-0">


                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> اسم الأم </label>
                    <input type="text" required="required" value="<?php echo $stu_info_update['mothername']; ?>" name="mothername" class="form-control input-sm p-1  rounded-0" placeholder="اسم الأم">
                  </div>

                </td>


                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الجنس </label>
                    <select name="gender" class="form-control input-sm p-1  rounded-0" id="">
                      <option value="1" selected> ذكر </option>
                      <option value="2"> أنثى </option>
                    </select>
                  </div>

                </td>
              </tr>

              <tr>

                <td>

                  <div class="form-group input-group-sm p-1 m-0">
                    <label> تاريخ الميلاد </label>

                    <input type="date" required="required" value="<?php echo $stu_info_update['DOB']; ?>" name="DOB" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">


                  </div>

                </td>


                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> مكان الميلاد </label>
                    <input type="text" required="required" value="<?php echo $stu_info_update['POB']; ?>" name="POB" class="form-control input-sm p-1  rounded-0" placeholder=" مكان الميلاد ">
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الجنسية </label>
                    <input type="text" required="required" name="Natinality" value="<?php echo $stu_info_update['Natinality']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الجنسية ">
                  </div>

                </td>

                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> عنوان السكن </label>
                    <input type="text" required="required" name="StuAddress" value="<?php echo $stu_info_update['StuAddress']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" عنوان السكن ">
                  </div>

                </td>
              </tr>

              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> المدينة </label>
                    <input type="text" required="required" name="city" value="<?php echo $stu_info_update['city']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" المدينة ">
                  </div>
                </td>

                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الدولة </label>
                    <input type="text" required="required" name="contry" value="<?php echo $stu_info_update['contry']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الدولة ">
                  </div>
                </td>

                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الهواتف </label>
                    <input type="text" required="required" name="Phones" value="<?php echo $stu_info_update['Phones']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الهواتف ">
                  </div>
                </td>





              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="card mb-1  rounded-0">
        <div class="card-header accord-header primary-color-dark rounded-0" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              معلومات قريب للطالب
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="card-block p-1">

            <table class="table table-bordered">
              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> اسم القريب </label>
                    <input type="text" required="required" name="relname" value="<?php echo $stu_info_update['relname']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="اسم القريب ">
                  </div>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> صلة القرابة </label>
                    <input type="text" required="required" name="reltype" value="<?php echo $stu_info_update['reltype']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" صلة القرابة  ">
                  </div>


                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> درجة القرابة </label>
                    <input type="text" required="required" name="reldigree" value="<?php echo $stu_info_update['reldigree']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" درجة القرابة  ">
                  </div>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الهواتف </label>
                    <input type="text" required="required" name="relphones" value="<?php echo $stu_info_update['relphones']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الهواتف ">
                  </div>


                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="card mb-1  rounded-0">
        <div class="card-header accord-header primary-color-dark rounded-0" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              المؤهلات العلمية للطالب
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-block p-1">

            <table class="table table-bordered">
              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> درجة الشهادة </label>
                    <select name="Ctype" class="form-control input-sm p-1  rounded-0">
                      <option value="1" selected> ثانوية علمية </option>
                      <option value="2"> ثانوية أدبية </option>
                      <option value="3"> ثانوية شرعية </option>
                      <option value="4"> شهادة جامعية </option>
                      <option value="5"> أخرى </option>
                    </select>
                  </div>

                  <div class="form-group input-group-sm p-1 m-0">
                    <label> سنة التخرج </label>
                    <input type="date" required="required" name="CYear" value="<?php echo $stu_info_update['CYear']; ?>" class="form-control input-sm p-1  rounded-0" placeholder="سنة التخرج">
                  </div>



                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الجهة التي تخرج منها </label>
                    <input type="text" required="required" name="Cschool" value="<?php echo $stu_info_update['Cschool']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" الجهة التي تخرج منها    ">
                  </div>

                  <div class="form-group input-group-sm p-1 m-0">
                    <label> لغة الشهادة </label>
                    <input type="text" required="required" name="CLanuage" value="<?php echo $stu_info_update['CLanuage']; ?>" class="form-control input-sm p-1  rounded-0" placeholder=" لغة الشهادة   ">
                  </div>


                </td>
            </table>
          </div>
        </div>
      </div>


      <div class="card mb-1  rounded-0">
        <div class="card-header accord-header primary-color-dark rounded-0" role="tab" id="headingFour">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsestudeis" aria-expanded="false" aria-controls="collapsestudeis">
              المعلومات الدراسية للطالب
            </a>
          </h5>
        </div>
        <div id="collapsestudeis" class="collapse" role="tabpanel" aria-labelledby="headingFour">
          <div class="card-block p-1">
            <table class="table table-bordered">
              <tr>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> نظام الدراسة </label>
                    <select name="status" class="form-control input-sm p-1  rounded-0" id="">
                      <option value="1"> انتظام </option>
                      <option value="2"> انتساب </option>
                    </select>
                  </div>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> حالة </label>
                    <select name="status" class="form-control input-sm p-1  rounded-0" id="">
                      <option value="1"> مسجل </option>
                      <option value="2"> منقطع عن الدراسة </option>
                      <option value="3"> محول </option>
                      <option value="4"> تم طي قيده </option>
                      <option value="5"> تم ايقافه </option>
                    </select>
                  </div>
                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> الفترة </label>
                    <select onclick="dep_show()" name="department" id="" class="form-control input-sm p-1  rounded-0">
                      <?php $op->get_department($stu_info_update['Department']); ?>
                    </select>
                    <input type="hidden" name="selected_dep_value" value="1">

                  </div>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> القسم </label>
                    <input type="hidden" name="selected_sec_value" value="<?php echo $stu_info_update['Section']; ?>">
                    <select onclick="sec_show()" onload="loadData()" name="section" id="" class="form-control input-sm p-1  rounded-0">
                      <?php $op->get_section($stu_info_update['Section']); ?>
                    </select>

                  </div>


                </td>
                <td>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> المجموعة </label>
                    <select onclick="grp_show()" onload="loadData()" name="group" id="" class="form-control input-sm p-1  rounded-0">
                      <?php $op->get_group($stu_info_update['stuGroup']); ?>
                    </select>
                    <input type="hidden" name="selected_grp_value" value="<?php echo $stu_info_update['stuGroup']; ?>">
                  </div>
                  <div class="form-group input-group-sm p-1 m-0">
                    <label> المستوى </label>
                    <select onclick="lev_show()" onload="loadData()" name="level" id="" class="form-control input-sm p-1  rounded-0">
                      <?php $op->get_level($stu_info_update['StuLevel']); ?>
                    </select>
                    <input type="hidden" name="selected_lev_value" value="1">


                  </div>


                </td>

              </tr>
              <tr>

              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>
  <pre>

</pre>
<?php } ?>