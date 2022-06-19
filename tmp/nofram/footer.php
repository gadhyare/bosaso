 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
 </div>
 </div>
 </div>


 <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery.scrollbar.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery.scrollbar.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/npm.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/highcharts.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/highcharts_init.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery-form.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/bootstrap.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/popper.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/admin-js.js"></script>

 <script src="<?php echo ROOT_URL; ?>/assets/js/jquery-1.7.2.min.js"></script>



 <!-- JQuery -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- Bootstrap tooltips -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
 <!-- Bootstrap core JavaScript -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <!-- MDB core JavaScript -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>


 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>
 <script src="<?php echo ROOT_URL; ?>/assets/js/gaar.js"></script>
 <script>
   $(document).ready(function() {
     $('#myTable').DataTable({
       paging: true,
       fixedColumns: true,
       language: {
         "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
       }
     });


   });




   $(document).ready(function() {
     $('[data-toggle="tooltip"]').tooltip();
   });
 </script>

 <?php
  unset($_SESSION['msg']);
  unset($_SESSION['stu_id_info']);
  unset($_SESSION['pro_id_info']);
  ?>

 </body>

 </html>