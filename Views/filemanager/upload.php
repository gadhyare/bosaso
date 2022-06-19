 <?php
    /**
     * fileName: رفع ملف
     */
    ?>
 <?php $op = new Khas(); ?>
 <div class="container col-xs-12 col-md-8 m-auto">
     <div class="card  rounded-0 z-depth-0 border">
         <div class="card-header unique-color-dark text-white text-center p-1   rounded-0"> <?= $op->lang("upload file"); ?> </div>
         <div class="card-body">
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="myform" id="myform" enctype="multipart/form-data">
                 <div class="form-group text-center">
                     <label for="uploadFile" class="col-12  text-center m-auto p-5  border alert alert-info">
                         <i class="fa fa-upload" style="font-size:3.5em;"></i>
                         <br>
                         <?= $op->lang("select"); ?>
                     </label>
                     <input type="file" name="uploadFile" id="uploadFile" accept=".jpeg,.jpg,.png,.gif"" style=" display: none">
                 </div>
                 <button type="submit" name="FileUp" class="btn danger-color-dark text-white px-3 py-1 float-left"> <?= $op->lang("upload file"); ?> </button>

             </form>
             <hr>
             <?php if (isset($_POST['FileUp'])) : ?>
                 <table class="table table-bordered table-striped ">
                     <tr>
                         <td class="p-1 border-0 "> <?= $op->lang("file name"); ?> </td>
                         <td class="p-1 border-0  text-left"> <?php echo  str_replace(pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION), "", $_FILES['uploadFile']['name']); ?> </td>
                     </tr>
                     <tr>
                         <td class="p-1 border-0 "> <?= $op->lang("file size"); ?> </td>
                         <td class="p-1 border-0  text-left"> <?php echo  "Kb " . number_format($_FILES['uploadFile']['size'] / 1024, 1); ?> </td>
                     </tr>
                     <tr>
                         <td class="p-1 border-0 "> <?= $op->lang("file type"); ?> </td>
                         <td class="p-1 border-0  text-left"> <?php echo $_FILES['uploadFile']['type']; ?> </td>
                     </tr>
                     <tr>
                         <td class="p-1 border-0 "> <?= $op->lang("file extension"); ?> </td>
                         <td class="p-1 border-0  text-left"> <?php echo pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);  ?> </td>
                     </tr>
                 </table>
             <?php endif; ?>
         </div>
     </div>
 </div>