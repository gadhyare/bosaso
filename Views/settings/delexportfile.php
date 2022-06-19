 <?php

    /**
     * fileName: حذف الملفات المصدرة
     */
    ?>
 <div class="container col-xs-12 col-sm-12 col-md-10 m-auto text-center">
     <div class="card p-3 text-center z-depth-0">
         <?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : ""; ?>

         <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="text-center p-3">
             <button type="submit" name="DelFiles" class="btn danger-color-dark text-white float-right m-atuo"> <?=$op->lang("remove database files");?> </button>
             <br class="mt-3">
         </form>
     </div>
 </div>