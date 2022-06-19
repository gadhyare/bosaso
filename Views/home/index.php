 <?php
  /**
   * fileName: الرئيسية
   */
  ?>
 <?php $op = new khas(); ?>
 <?php $getLastStu = $op->get_last_registed_students(); ?>
 <?php $StNo = 1; ?>

 <div class="container-fluid  h-100 p-0">
   <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-4 mt-2">
       <div class="card      z-depth-0    border-unique p-0 rounded-0    px-1 py-1  " style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div style="font-size:80%" class="card-header    text-white font-weight-bold  p-1  rounded-0  " style="background-color:<?php echo $op->getThemeColor(); ?>"> <i class="fa fa-user"></i> <?= $op->lang("last registered students"); ?> </div>
         <div class="card-body   z-depth-0  p-1 bg-white ">
           <table id="dtHorizontalExample" class="table  table-striped   z-depth-0" cellspacing="0" width="100%">
             <thead>
               <tr>
                 <td scope="col" class="p-0  border text-center"> #</td>
                 <td scope="col" class="p-0  border text-center w-75"> <?= $op->lang("name"); ?></td>
                 <td scope="col" class="p-0  border text-center"> <?= $op->lang("details"); ?> </td>
               </tr>
             </thead>
             <tbody>
               <?php $lastStuInfo =  $op->getLastStuInfo(); ?>
               <?php foreach ((array) $lastStuInfo as $getLastStuRows) : ?>
                 <tr>
                   <td class="p-0  border text-center"> <?php echo $StNo++; ?> </td>
                   <td class="p-0  border   w-75"> <?php echo $op->pro_field($getLastStuRows['StuName']); ?> </td>

                   <td class="p-0  border text-center"> <a href="<?php echo ROOT_URL; ?>/student/update/<?php echo $op->pro_field($getLastStuRows['stu_id']); ?>" class="btn danger-color-dark text-white px-2 py-0 text-white   "><i class="fa fa-user"></i></a> </td>
                 </tr>
               <?php endforeach; ?>
             </tbody>
           </table>
         </div>
       </div>
       <br>
       <?php $lastFeeTrans =  $op->getLastfee_trans(); ?>
       <?php if (count((array) $lastFeeTrans) > 0) : ?>
         <div class="card       z-depth-0    border-unique p-0 rounded-0    px-1 py-1" style="background-color:<?php echo $op->getThemeColor(); ?>">
           <div style="font-size:80%" class="card-header    text-white font-weight-bold  p-1  rounded-0  " style="background-color:<?php echo $op->getThemeColor(); ?>">
             <i class="fa fa-money"></i> <?= $op->lang("The last students who paid tuition fees"); ?>
           </div>

           <div class="card-body   z-depth-0  px-1 py-1 bg-white ">
             <table id="dtHorizontalExample" class="table  table-striped        z-depth-0" cellspacing="0" width="100%">
               <thead>
                 <tr>
                   <td scope="col" class="p-0  border text-center"> #</td>
                   <td scope="col" class="p-0  border text-center w-75"> <?= $op->lang("name"); ?></td>
                   <td scope="col" class="p-0  border text-center"> <?= $op->lang("details"); ?> </td>
                 </tr>
               </thead>
               <tbody>
                 <?php $StNo = 1; ?>
                 <?php foreach ((array)$lastFeeTrans as $lastFeeTransrec) : ?>
                   <tr>
                     <td class="p-0  border text-center"> <?php echo $StNo++; ?> </td>
                     <td class="p-0  border w-75"> <?php echo $op->pro_field($op->getStuNameById($op->getStuInfoByInvoiceNum($lastFeeTransrec['Invoice_id']))); ?> </td>
                     <td class="p-0  border text-center"> <a href="<?php echo ROOT_URL; ?>/finance/paidstufee/<?php echo $op->pro_field($lastFeeTransrec['Invoice_id']); ?>" class="btn danger-color-dark text-white px-2 py-0 text-white"><i class="fa fa-dollar"></i></a> </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           </div>
         </div>
       <?php endif; ?>
       <div class="container       z-depth-0   mt-2   rounded-0 p-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div class="card       z-depth-0   mb-3 p-1 rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
           <div style="font-size:80%" class="card-header   border-0 text-white font-weight-bold  p-1  rounded-0  "> <i class="fa fa-info"></i> <?= $op->lang("system information"); ?> </div>
           <div class="card-body bg-white p-0" id="upgradeinfo">
             <div class="container text-center  py-3 "><img src="<?php echo ROOT_URL; ?>/images/tahmil10.gif" class="border-0 m-auto w-50"></div>
           </div>
           <p class="py-0 px-1 my-0 text-white text-center"> </p>
           <p class="py-0 px-1 my-0 text-white text-center"></p>
         </div>
       </div>
     </div>
     <div class="col-xs-12 col-sm-12 col-md-4  mt-2">
       <div class="card       z-depth-0   border-unique mb-3 p-0 rounded-0 " style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div style="font-size:80%" class="card-header    text-white font-weight-bold  p-1  rounded-0  " style="background-color:<?php echo $op->getThemeColor(); ?>">
           <i class="fa fa-folder-open"></i> <?= $op->lang("system statistics"); ?>
         </div>

         <div class="card-body  bg-white  z-depth-0  p-1">

           <div class="col-12 border">

             <i class="fa fa-user  "></i>
             <?= $op->lang("students"); ?> <apan class="float-right"><?php echo $op->pro_field($op->get_stu_num()); ?></span>

           </div>
           <div class="col-12 border">

             <i class="fa fa-list "></i>
             <?= $op->lang("Faculties"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countfaculty()); ?></span>

           </div>
           <div class="col-12 border">

             <i class="fa fa-tasks "></i>
             <?= $op->lang("programs"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countPrograms()); ?></span>

           </div>
           <div class="col-12 border">

             <i class="fa fa-address-card "></i>
             <?= $op->lang("sections"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countSection()); ?></span>
           </div>

           <div class="col-12 border">

             <i class="fa fa-group  "></i>
             <?= $op->lang("groups"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countGrp()); ?></span>

           </div>
           <div class="col-12 border">

             <i class="fa fa-level-up "></i>
             <?= $op->lang("levels"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countLev()); ?></span>

           </div>
           <div class="col-12 border">

             <i class="fa fa-book "></i>
             <?= $op->lang("subjects"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countSub()); ?></span>

           </div>
           <div class="col-12 border">

             <i class="fa fa-link "></i>
             <?= $op->lang("users"); ?> <apan class="float-right"><?php echo $op->pro_field($op->countUsers()); ?></span>

           </div>



         </div>
       </div>
       <div class="card       z-depth-0   mb-0 p-1 rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div style="font-size:80%" class="card-header   border-0 text-white font-weight-bold  p-1  rounded-0  " style="font-size:70%;"> <i class="fa fa-info"></i> <?= $op->lang("central bank of somaliland currency exchange rates"); ?> </div>
         <div class="card-body bg-white p-0">
           <?php require_once('exchange.php'); ?>
         </div>
       </div>

     </div>

     <div class="col-xs-12 col-sm-12 col-md-4  mt-2">
       <div class="card       z-depth-0    border-unique p-0 rounded-0    px-1 py-1" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div style="font-size:80%" class="card-header    text-white font-weight-bold  p-1  rounded-0  " style="background-color:<?php echo $op->getThemeColor(); ?>">
           <i class="fa fa-search"></i> <?= $op->lang("search by student number"); ?>
         </div>
         <div class="card-body   z-depth-0  px-1 py-1 bg-white ">
           <form action="" method="POST">
             <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-9"> 
                 <input type="text" name="s" id="s" class="form-control py-0 px-3" placeholder="search" style="font-size:70%;">
               </div>
               <div class="col-xs-12 col-sm-12 col-md-1">
                 <button type="submit" name="dosearch" class="btn py-1 px-3 text-white my-0" style="background-color:<?php echo $op->getThemeColor(); ?>"> <i class="fa fa-search"></i> </button>
               </div>
             </div>
           </form>
         </div>
       </div>
       <div class="card       z-depth-0    border-unique p-0 rounded-0    px-1 py-1" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div class="card-body   z-depth-0  px-1 py-1 bg-white ">
           <h3 class="text-center " id="currentDate">3/21/2021
           </h3>
           <h3 class="text-center " id="currentTime">3:41:18 PM
           </h3>
         </div>
       </div>
       <div class="container       z-depth-0   mt-2   rounded-0 p-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div class="card       z-depth-0   mb-3 p-1 rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
           <div style="font-size:80%" class="card-header   border-0 text-white font-weight-bold  p-1  rounded-0  "> <i class="fa fa-link"></i> <?= $op->lang("program links"); ?> </div>
           <div class="card-body bg-white">
             <div class="row">
               <?php $home_menu = new Abillity(); ?>
               <?php $op->pro_field($home_menu->get_menu_to_home($_SESSION['log_role'], $op->getThemeColor())); ?>
             </div>
           </div>
         </div>
       </div>
       <div class="container       z-depth-0   mt-2   rounded-0 p-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div class="card       z-depth-0   mb-3 p-1 rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
           <div style="font-size:80%" class="card-header   border-0 text-white font-weight-bold  p-1  rounded-0  "> <i class="fa fa-tasks"></i> <?= $op->lang("todo list"); ?> </div>
           <div class="card-body bg-white p-0">
             <ul class="list-group p-0">
               <?php foreach ($viewmodel as $todo) : ?>
                 <div class="list-group-item p-0 w-100 rouned-0 rouned-0    alert alert-<?php echo $op->getBgColor($todo['status']); ?> rouned-0" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/todolist/show/<?php echo $todo['id']; ?>', 'yui');getId('<?php echo $todo['id']; ?>')"> <?php echo $todo['title']; ?>
                 </div>
               <?php endforeach; ?>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- Modal edit ==============================================================================================================-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog  ">
     <div class="modal-content">
       <div id="id" style="display:none;"></div>
       <div class="modal-body" id='yui'>

       </div>
       <div class="modal-footer">
         <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/todolist/show?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> تعديل </button>
       </div>
     </div>
   </div>
 </div>

 <?php require_once("getInfo.php"); ?>
 <script>
   function getId(id) {
     document.getElementById("id").innerHTML = id;
   }

   function getIdv(val) {
     document.getElementById(val).innerHTML = id;
   }

   setInterval(() => {
     let d = new Date(),
       cdate = document.getElementById("currentDate"),
       ctime = document.getElementById("currentTime");

     cdate.innerText = d.toLocaleDateString();
     ctime.innerText = d.toLocaleTimeString();
   }, 1000);


   function showDetailss() {
     $('#upgradeinfo').load('<?php echo ROOT_URL; ?>/home/versioninfo/');
   }

   showDetailss();
 </script>