<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('هل أنت متأكد من القيام بالعملية التالية؟');">
    <div class="container-fluid p-1" style="background-color: <?php echo $op->getThemeColor(); ?> !important;">
        <a href=" <?php echo rtrim(ROOT_URL, "/"); ?>/student/register" class="btn primary-color-dark text-white  px-3 py-1  mt-0 "> <i class="fa fa-plus" aria-hidden="true"></i> تسجيل طالب جديد </a>
        <button type="submit" name="multiDel" id="multiDel" class="btn danger-color-dark text-white px-3 py-1 mt-0"> تغيير الحالة </button>
        <button type="submit" name="multChange" id="multChange" class="btn danger-color-dark text-white px-3 py-1 float-left mt-0"> تحويل القسم </button>
        <select name="changeto" id="changeto" class="form-control border rounded-0 col-2 text-center float-left p-0 mt-0  ml-2" style="font-size:80%">
            <?php $op->get_section(); ?>
        </select>
        <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/searchstuinfo" class="btn unique-color-dark text-white px-3 py-1 "> <i class="fa fa-search"></i> البحث </a>
        <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/downloads/empty_sudents_list.xlsx" class="btn success-color-dark text-white  px-3 py-1 mt-0   "> <i class="fa fa-download" aria-hidden="true"></i> قائمة طلبة </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped " id="myTable">
            <thead>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:70%">#</th>
                <th class="py-2 px-4 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:90%">
                    <input type="checkbox" name="chkall" id="chkall">
                </th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:90%"> الاسم </th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:90%"> الرقم الجامعي </th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:90%"> الصورة </th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:80%">الجنس</th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:80%">تاريخ الميلاد</th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:80%">مكان الميلاد</th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:70%"> الجنسية </th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:80%"> العنوان </th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:80%">تاريخ التسجيل</th>
                <th class="p-2 text-center" style="background-color: <?php echo $op->getThemeColor(); ?> !important; font-size:80%">العمليات</th>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($viewmodel as $itemss) : ?>
                    <?php $gender = ($itemss['gender'] == 2) ? "ذكر" : "أنثى"; ?>
                    <?php $bg_danger = ($itemss['active'] == 2) ? "alert-danger" : ""; ?>
                    <t>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center  " style="font-size:70%" scope="row"> <?php echo $i++; ?> </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:70%"> <input type="checkbox" name="chk[]" id="chkitem" value="<?php echo $itemss['stu_id']; ?>"> </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-right" style="font-size:80%">
                            <span data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="تحديث" onclick="showAllDetails('<?php echo ROOT_URL; ?>/student/update/<?php echo $itemss['stu_id']; ?>?show=yes', 'yui');getId('<?php echo $itemss['stu_id']; ?>')">
                                <?php echo $itemss['StuName'];  ?>
                            </span>
                        </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"> <?php echo $itemss['stu_num'];  ?> </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"> <img src="<?php echo  $op->get_image($itemss['stu_pic']); ?>" class="img-responsive rounded-circle" style="width:30px; height:30px;"> </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"> <?php echo $op->getSelesectionTxt($itemss['gender']);  ?> </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"><?php echo $itemss['DOB'];  ?></td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"><?php echo $itemss['POB'];  ?></td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"><?php echo $itemss['Natinality'];  ?></td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"> <?php echo $itemss['StuAddress'];  ?> </td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:80%"> <?php echo  $itemss['reg_date']; ?></td>
                        <td class="px-2 py-0 border <?= $bg_danger; ?> text-center" style="font-size:70%">
                            <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/stuinfoprint/<?php echo $itemss['stu_id']; ?>" target="_blank" data-toggle="tooltip" title="طباعة" class="btn primary-color-dark px-1 py-0 text-white"> <i class="fa fa-print"></i> </a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn success-color-dark  px-1 py-0  text-white" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="تحديث" onclick="showAllDetails('<?php echo ROOT_URL; ?>/student/update/<?php echo $itemss['stu_id']; ?>?show=yes', 'yui');getId('<?php echo $itemss['stu_id']; ?>')">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/finance/feepaid/<?php echo $itemss['stu_id']; ?>" target="_blank" data-toggle="tooltip" title="الرسوم" class="btn danger-color-dark  px-1 py-0  text-white"> <i class="fa fa-money"></i> </a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</form>


<!-- Modal edit ==============================================================================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="id" style='display:none'></div>
            <div class="modal-body" id='yui'>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/student/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> تعديل </button>
            </div>
        </div>
    </div>
</div>


<script>
    function getId(id) {
        document.getElementById("id").innerHTML = id;
    }

    function getIdv(val) {
        document.getElementById(val).innerHTML = id;
    }

    function reply_click(clicked_id) {
        var ps = document.getElementById("u").value + "/" + "uplouds/";
        document.getElementById("stu_pics").value = clicked_id;
        document.getElementById("student_img").src = ps + clicked_id;
    }
</script>