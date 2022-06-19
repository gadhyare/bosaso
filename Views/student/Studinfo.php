<?php

/**
 * fileName:  معلومات الطلبة
 */
?> 

<?php if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
} ?>
<br>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container text-left">
        <input type="submit" name="add" value="انهاء التسجيل" id="submit" class="btn danger-color-dark   rounded-0 text-white    mb-3  py-2 px-3" name="add_student">
        <a href="<?php echo ROOT_URL; ?>/student/info" class="btn primary-color-dark rounded-0 text-white mb-3 py-2 px-3"> الرجوع لبيانات الطلاب </a>
    </div>


    <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card mb-1  rounded-0">
            <div class="card-header accord-header primary-color-dark text-center    rounded-0" role="tab" id="headingOne">
                <h5 class="mb-0 ">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        المعلومات الدراسية للطالب
                    </a>
                </h5>
            </div>


            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block p-1 ">
                    <table class="table table-bordered">


                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> نظام الدراسة </label>
                                        <input type="hidden" name="StuNum" value="<?php echo  $_GET['id'] ?>">
                                        <select name="Stutype" class="form-control p-1  rounded-0" id="">
                                            <option value="1"> انتظام </option>
                                            <option value="2"> انتساب </option>
                                        </select>
                                    </div>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> حالة </label>
                                        <select name="Stustatus" class="form-control p-1  rounded-0" id="">
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
                                        <select onclick="dep_show()" name="Studepartment" id="" class="form-control p-1  rounded-0">
                                            <?php $op->get_department(); ?>
                                        </select>


                                    </div>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> القسم </label>
                                        <select name="Section" id="" class="form-control p-1  rounded-0">
                                            <?php $op->get_section(); ?>
                                        </select>

                                    </div>


                                </td>
                                <td>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> المجموعة </label>
                                        <select onclick="grp_show()" onload="loadData()" name="Stugroup" id="" class="form-control p-1  rounded-0">
                                            <?php $op->get_group(); ?>
                                        </select>
                                        <input type="hidden" name="selected_grp_value" value="1">
                                    </div>
                                    <div class="form-group input-group-sm p-1 m-0">
                                        <label> المستوى </label>
                                        <select onclick="lev_show()" onload="loadData()" name="StuLevel" id="" class="form-control p-1  rounded-0">
                                            <?php $op->get_level(); ?>
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