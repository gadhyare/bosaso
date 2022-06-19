 <?php $op = new Khas(); ?>
 <div class="container">
     <a href="<?php echo ROOT_URL; ?>/finance/reports?op=emp&rep=debt" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير الديون </a>
     <a href="<?php echo ROOT_URL; ?>/finance/reports?op=emp&rep=allowance" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير العلاوات </a>
     <a href="<?php echo ROOT_URL; ?>/finance/reports?op=emp&rep=deduction" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير الخصم </a>
     <a href="<?php echo ROOT_URL; ?>/finance/reports?op=emp&rep=sellary" class="btn blue-grey darken-3  text-white  m-0 border rounded z-depth-0 m-auto py-1 "> تقارير المرتبات </a>
 </div>
 <div class="container">
     <div class="card z-depth-0 border-0">
         <div class="card-header danger-color-dark text-white text-center p-1 mt-1 tounded-0"> تقرير حسابات الموظفين </div>
         <div class="card-body p-1">
             <div class="row">
                 <div class="col-xs-12 col-md-6">
                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="border py-1 px-3" enctype="multipart/form-data" id="form1">
                         <div class="form-group">
                             <label for="dtFrom"> تاريخ البداية</label>
                             <input type="date" name="dtFrom" id="dtFrom" class="form-control  rounded-0 ">
                             <label for="dtTo"> تاريخ النهاية </label>
                             <input type="date" name="dtTo" id="dtTo" class="form-control  rounded-0 ml-1">
                             <br>
                             <button type="submit" name="searchdebtBydate" id="searchdebtBydate" class="btn danger-color-dark col-12 py-2 text-white  m-auto"> البحث بين تاريخ <i class="fa fa-search"></i> </button>
                         </div>
                     </form>
                 </div>
                 <div class="col-xs-12 col-md-6">
                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="border py-1 px-3" enctype="multipart/form-data" id="form2">
                         <div class="form-group ">
                             <label for="emp_id"> اسم الموظف </label>
                             <select name="emp_id" id="emp_id" class="form-control  rounded-0 p-0">
                                 <?php $op->getempList(); ?>
                             </select>
                             <br>
                             <button type="submit" name="searchdebtByempId" id="searchdebtByempId" class="btn danger-color-dark col-12 py-2 text-white  m-auto"> البحث باسم الموظف <i class="fa fa-search"></i> </button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>