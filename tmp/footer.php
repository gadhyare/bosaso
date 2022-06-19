 </div>
 </div>
 </div>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/popper.min.js"></script>

 <script src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/i18n/ar.js"></script>
 <script type="text/javascript" src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/datatables.min.js"></script>

 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery-form.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/bootstrap.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/admin-js.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/gaar.js"></script>

 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery-1.7.2.min.js"></script>


 <script type="text/javascript" src="<?php echo $op->siteSetting("siteUrl"); ?>assets/js/datatables.min.js"></script>
 <script>
<?php if(SYS_LANG === 'ar'):?>
  
   $(document).ready(function() {
     $('.myTable','#myTable1').DataTable({
       paging: true,
       fixedColumns: true,
       language: {
         "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
       }
     });
   }); 

 <?php else:?>

 
   $(document).ready(function() {
     $('.table').DataTable({
       paging: true,
       fixedColumns: true 
     });
   });
 

 <?php endif;?>

 if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
 }
 </script>
 <?php
  unset($_SESSION['msg']);
  unset($_SESSION['stu_id_info']);
  unset($_SESSION['pro_id_info']);
  ?>
 </body>

 </html>