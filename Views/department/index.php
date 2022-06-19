 <?php
  /**
   * fileName: رئيسية الفترات
   */
  ?>
 <?php $op = new Khas(); ?>
 <div class="container mt-3">

   <div class="row">
     <div class="col-xs-12 col-sm-6 col-md-3">
       <div class="card  ">
         <div class="card-header  text-dark font-weight-bold text-center p-1"> <?= $op->lang("add"); ?> <?= $op->lang("shifts"); ?> </div>
         <div class="card-body">
           <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
             <div class="form-group">
               <label> <?= $op->lang("shift name"); ?> </label>
               <input type="text" name="department_name" class="form-control p-1  rounded-0" placeholder="<?= $op->lang("shift name"); ?>">
             </div>

             <div class="form-group">
               <label> <?= $op->lang("status"); ?> </label>
               <select name="active" id="" class="form-control p-1  rounded-0">
                 <option value="1"><?= $op->lang("active"); ?></option>
                 <option value="2"><?= $op->lang("non active"); ?></option>
               </select>
             </div>

             <input type="submit" name="submit" value="<?= $op->lang("add"); ?>" class="btn primary-color-dark text-white px-3 py-2">
             <a href="<?php echo ROOT_URL; ?>/department" class="btn danger-color-dark text-white p-2"><?= $op->lang("cancel"); ?></a>
           </form>
         </div>
       </div>

     </div>
     <div class="col-xs-12 col-sm-6 col-md-9">
       <a href="<?php echo ROOT_URL; ?>/department/trash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>

       <table class="table table-bordered table-striped ">
         <thead>
           <tr>
             <th class="p-1 bg-dark"> <?= $op->lang("Serial"); ?></th>
             <th class="p-1 bg-dark"> <?= $op->lang("shift name"); ?> </th>
             <th class="p-1 bg-dark"> <?= $op->lang("status"); ?></th>
             <th class="p-1 bg-dark" colspan="2"><?= $op->lang("operation"); ?></th>
           </tr>
         </thead>
         <tbody>
           <?php $i = 1; ?>
           <?php foreach ($viewmodel as $item) : ?>
             <?php $status = ($op->pro_field($item['active']) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
             <tr>
               <td class="p-1"><?php echo $i++; ?></td>
               <td class="p-1"><?php echo $op->pro_field($item['department_name']);  ?></td>
               <td class="p-1"><?php echo $op->pro_field($status); ?> </td>
               <input type="hidden" name="edit_id" value="<?php echo $op->pro_field($item['dep_id']); ?>">
               <td class="p-1">
                 <!-- Button trigger modal -->
                 <button type="button" class="btn primary-color-dark text-white rounded-0 py-1 px-2" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/department/update/<?php echo $op->pro_field($item['dep_id']); ?>', 'yui');getId('<?php echo $op->pro_field($item['dep_id']); ?>')">
                   <i class="fa fa-pencil"></i>
                 </button>
                 <a href="<?php echo ROOT_URL; ?>/department/delete/<?php echo $op->pro_field($item['dep_id']); ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
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
         <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/department/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
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