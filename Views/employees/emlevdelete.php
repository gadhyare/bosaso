 <?php
    /**
     * fileName: حذف درجة وظيفية
     */
    ?>
 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
     <?php foreach ((array)$viewmodel as $delete_items) : ?>
         <div class="container p-2 mt-2 alert alert-danger  text-center  col-xs-12 col-sm-10 col-md-6">
             <p class="lead p-2 mt-2   text-center">
                 <?=$op->lang("are you sure to delete the record");?> [ <?php echo $delete_items['em_lev_name']; ?> ]  
             </p>
             <input name="delete_items" type="submit" class="btn success-color-dark text-white px-3 py-2  a-light py-2 text-weight-bold" value="<?=$op->lang("delete");?>">
             <a href="<?php echo ROOT_URL; ?>/employees/emlev" class="btn danger-color-dark text-white px-3 py-2 "><?=$op->lang("cancel");?></a>
         </div>
     <?php endforeach; ?>
 </form>