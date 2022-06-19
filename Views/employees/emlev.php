 <?php
  /**
   * fileName: معلومات درجة وظيفية
   */
  ?>
 <div class="container ">
   <div class="card m-auto col-xs-12 col-md-8 z-depth-0 border rounded-0 p-0">
     <div class="card-header unique-color-dark text-center text-white p-1"> <?=$op->lang("add a job degree");?>       </div>
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="card-body p-2">
         <div class="row">
           <div class="form-group col-xs-12 col-md-6">
             <label for="sem_lev_name"> <?=$op->lang("career grades");?> </label>
             <input type="text" name="em_lev_name" id="em_lev_name" value="<?php echo (isset($_POST['em_lev_name'])) ? $_POST['em_lev_name'] : ''; ?>" class="form-control rounded-0 p-1">
           </div>
           <div class="form-group col-xs-12 col-md-6">
             <div class="row">
               <div class="col-xs-12 col-md-10">
                 <label for="active"> <?=$op->lang("sttus");?> </label>
                 <select name="active" id="active" class="form-control rounded-0 p-1">
                   <option value="1"> <?=$op->lang("active");?> </option>
                   <option value="2">   <?=$op->lang("non active");?> </option>
                 </select>
               </div>
               <div class="col-xs-12 col-md-2 py-1 px-0">
                 <br>
                 <?php if ($op->adAction('emlevdelete')) : ?>
                   <button type="submit" name="btn_submit" id="btn_submit" class="btn success-color-dark text-white px-3 py-2"> <i class="fa fa-send"></i> </button>
                 <?php endif; ?>
               </div>
             </div>
           </div>
         </div>
       </div>
     </form>

     <hr>
     <table class="table tables ">
       <thead>
         <tr>
           <th class="p-1 bg-dark text-white"> <?=$op->lang("Serial");?></th>
           <th class="p-1 bg-dark text-white"> <?=$op->lang("career grades");?> </th>
           <th class="p-1 bg-dark text-white"> <?=$op->lang("sttus");?></th>
           <th class="p-1 bg-dark text-white" colspan="2"><?=$op->lang("operation");?></th>
         </tr>
       </thead>
       <tbody>
         <?php $i = 1; ?>
         <?php foreach ((array)$viewmodel as $item) : ?>
           <?php $status = ($item['active'] == 1) ? $op->lang("active") : $op->lang("non active"); ?>
           <tr>
             <td class="p-1"><?php echo $i++; ?></td>
             <td class="p-1"><?php echo $item['em_lev_name'];  ?></td>
             <td class="p-1"><?php echo $status; ?> </td>
             <input type="hidden" name="edit_id" value="<?php echo $item['em_lev_id']; ?>">
             <td class="p-1">
               <!-- Button trigger modal -->
               <?php if ($op->adAction('emlevupdate')) : ?>
                 <button type="button" class="btn primary-color-dark text-white rounded-0 py-1 px-2" data-toggle="modal" data-target="#exampleModal" onclick="showAllDetails('<?php echo ROOT_URL; ?>/employees/emlevupdate/<?php echo $item['em_lev_id']; ?>', 'yui');getId('<?php echo $item['em_lev_id']; ?>')">
                   <i class="fa fa-pencil"></i>
                 </button>
               <?php endif; ?>

               <?php if ($op->adAction('emlevdelete')) : ?>
                 <a href="<?php echo ROOT_URL; ?>/employees/emlevdelete/<?php echo $item['em_lev_id']; ?>" class="btn danger-color-dark text-white rounded-0 py-1 px-2 "> <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
               <?php endif; ?>
             </td>
           </tr>
         <?php endforeach; ?>
       </tbody>
     </table>
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
         <button type="button" onclick="updateRec('<?php echo ROOT_URL; ?>/employees/emlevupdate?updateRec=yes&ids='+ document.getElementById('id').innerHTML)" class="btn success-color-dark text-white py-1 px-3 rounded "> <?=$op->lang("update");?> </button>
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