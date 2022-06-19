<?php
/**
* fileName: افاضة فترة
*/
?>
 <div class="container mt-5 col-xs-12 col-sm-10 col-md-6">
     <div class="card  ">
         <div class="card-header  text-dark font-weight-bold text-center p-1"> <?=$op->lang("add");?> فترة جديدة </div>
         <div class="card-body">
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                 <div class="form-group">
                     <label> اسم الفترة </label>
                     <input type="text" name="department_name" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم الفترة الجديدة">
                 </div>

                 <div class="form-group">
                     <label> حالة الفترة </label>
                     <select name="active" id="" class="form-control p-1  rounded-0">
                         <option value="1">مفعل</option>
                         <option value="2">غير مفعل</option>
                     </select>
                 </div>

                 <input type="submit" name="submit" value="<?=$op->lang("add");?>" class="btn primary-color-dark text-white px-3 py-2">
                 <a href="<?php echo ROOT_URL; ?>/department" class="btn danger-color-dark text-white p-2"><?=$op->lang("cancel");?></a>
             </form>
         </div>
     </div>


 </div>