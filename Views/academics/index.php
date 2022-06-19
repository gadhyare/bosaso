 <?php
  /**
   * fileName: رئيسية الأقسام الأكاديمية
   */
  ?>

 <div class="container mt-3" style="font-size:90% !important;">
   <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-3">
       <div class="card shadow-0 border ">
         <div class="card-header  text-dark font-weight-bold text-center  "> <?= $op->lang("add"); ?> <?= $op->lang("academics"); ?> </div>
         <div class="card-body">
           <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
             <div class="form-group">
               <label> <?= $op->lang("name"); ?> <?= $op->lang("academics"); ?></label>
               <input type="text" name="academics_name" class="form-control py-0" style="font-size:90% !important;" placeholder="<?= $op->lang("academics"); ?>">
             </div>
             <div class="form-group">
               <label> <?= $op->lang("code"); ?> </label>
               <input type="text" name="code" class="form-control py-0" style="font-size:90% !important;" placeholder="<?= $op->lang("code"); ?>">
             </div>
             <div class="form-group">
               <label><?= $op->lang("status"); ?></label>
               <select name="active" id="" class="form-control py-0" style="font-size:90% !important;">
                 <option value="1"><?= $op->lang("active"); ?></option>
                 <option value="2"><?= $op->lang("non active"); ?></option>
               </select>
             </div>
             <input type="submit" name="submit" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
             <a href="<?php echo ROOT_URL; ?>/academics" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
           </form>
         </div>
       </div>
     </div>
     <div class="col-xs-12 col-sm-6 col-md-9">
       <a href="<?php echo ROOT_URL; ?>/academics/trash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>
       <br>
       <table class="table table-bordered table-striped  " id="myTable">
         <thead>
           <tr>
             <th class="py-0 px-1 bg-dark" style="font-size:90% !important;"> <?= $op->lang("Serial"); ?></th>
             <th class="py-0 px-1 bg-dark" style="font-size:90% !important;"> <?= $op->lang("name"); ?></th>
             <th class="py-0 px-1 bg-dark" style="font-size:90% !important;"> <?= $op->lang("code"); ?></th>
             <th class="py-0 px-1 bg-dark" style="font-size:90% !important;"> <?= $op->lang("status"); ?></th>
             <th class="py-0 px-1 bg-dark" style="font-size:90% !important;" colspan="2"><?= $op->lang("operation"); ?></th>
           </tr>
         </thead>
         <tbody>
           <?php $i = 1; ?>
           <?php foreach ($viewmodel as $itemss) : ?>
             <?php $status = ($itemss['active'] == 1) ?   $op->lang("non active")  :  $op->lang("active"); ?>
             <tr>
               <td class="py-0 px-1" style="font-size:90% !important;"><?php echo $i++; ?></td>
               <td class="py-0 px-1" style="font-size:90% !important;"><?php echo $itemss['academics'];  ?></td>
               <td class="py-0 px-1" style="font-size:90% !important;"><?php echo $itemss['code'];  ?></td>
               <td class="py-0 px-1" style="font-size:90% !important;"><?php echo $status; ?> </td>
               <input type="hidden" name="edit_id" value="<?php echo $itemss['academics_id']; ?>">
               <td class="py-0 px-1" style="font-size:90% !important;">
                 <!-- Button trigger modal -->
                 <button type="button" class="btn success-color-dark text-white rounded-0 my-1 py-0 px-2" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/academics/update/<?php echo $itemss['academics_id']; ?>', 'yui');getId('<?php echo $itemss['academics_id']; ?>')">
                   <i class="fa fa-pencil"></i>
                 </button>
                 <a href="<?php echo ROOT_URL; ?>/academics/delete/<?php echo $itemss['academics_id']; ?>" class="btn danger-color-dark text-white rounded-0 my-1 py-0 px-2 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
               </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
       </table>

     </div>
   </div>
 </div>


 <!-- Modal edit ==============================================================================================================-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div id="id" style="display:none;"></div>
       <div class="modal-body" id='yui'>

       </div>
       <div class="modal-footer">
         <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/academics/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
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
 </script>