 <?php
  /**
   * fileName: الرئيسية
   */
  ?>
 <div class="container">
   <button type="button" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white" data-toggle="modal" data-target="#dd" onclick="showDetails('<?php echo ROOT_URL; ?>/subject/add/', 'AddModalLbl')">
     <i class="fa fa-plus" aria-hidden="true"></i> <?= $op->lang("add"); ?> <?= $op->lang("subjects"); ?>
   </button>
   <a href="<?php echo ROOT_URL; ?>/subject/ordersubByfacl" class="btn danger-color-dark text-white px-3 py-1"> <?= $op->lang("subjects by specialization"); ?> </a>
   <a href="<?php echo ROOT_URL; ?>/subject/trash" class="btn primary-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white clreafix"><i class="fa fa-trash" aria-hidden="true"></i> </a>

   <?php $op = new Khas(); ?>
   <table class="table table-striped" id="myTable">
     <thead>
       <tr>
         <th class="p-1 bg-dark text-center"> <?= $op->lang("Serial"); ?></th>
         <th class="p-1 bg-dark text-center"> <?= $op->lang("subject name"); ?></th>
         <th class="p-1 bg-dark text-center"> <?= $op->lang("subject code"); ?></th>
         <th class="p-1 bg-dark text-center"> <?= $op->lang("program"); ?> </th>
         <th class="p-1 bg-dark text-center"> <?= $op->lang("status"); ?></th>
         <th class="p-1 bg-dark text-center"><?= $op->lang("operation"); ?></th>
       </tr>
     </thead>
     <tbody>
       <?php $i = 1; ?>
       <?php $json = json_decode($viewmodel); ?>
       <?php foreach ($json   as $items => $key) : ?>
         <tr>
           <td class="p-1"><?php echo $i++; ?></td>
           <td class="p-1"><?php echo $key->subject_name;  ?></td>
           <td class="p-1"><?php echo $key->subject_code;  ?></td>
           <td class="p-1">
             <?php echo $op->FulltextProgInfo($key->prog_id); ?>
           </td>
           <?php $status = ($op->pro_field($key->active) == 1) ? $op->lang("active") : $op->lang("non active"); ?>
           <td class="p-1"><?php echo  $status; ?> </td>
           <input type="hidden" name="edit_id" value="<?php echo $key->sub_id; ?>">
           <td class="p-1">
             <?php if ($op->chk_prog_rols($op->stringify($_SESSION['log_id']), $key->prog_id)) : ?>
               <!-- Button trigger modal -->
               <button type="button" class="btn primary-color-dark text-white rounded-0 py-1 px-2 px-3" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/subject/update/<?php echo $key->sub_id; ?>', 'yui');getId('<?php echo $key->sub_id; ?>')">
                 <i class="fa fa-pencil"></i>
               </button>
               <a href="<?php echo ROOT_URL; ?>/subject/delete/<?php echo $key->sub_id; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 px-3 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
             <?php endif; ?>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
 </div>



 <!-- Modal add ==============================================================================================================-->
 <div class="modal fade" id="dd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-body" id="AddModalLbl">

       </div>
       <div class="modal-footer">
         <button type="button" onclick="addRec('<?php echo ROOT_URL; ?>/subject/add?addRec=yes')" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("save"); ?> </button>
       </div>
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
         <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/subject/update?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?= $op->lang("update"); ?> </button>
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