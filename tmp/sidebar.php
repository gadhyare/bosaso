 <?php $op = new khas();?>
 <ul class="list-group p-0  right-side  w-100   " style="background-color: <?php echo $op->getThemeColor();?> !important;  ">
      <?php $sidebar = new Abillity(); ?>
      <?php $sidebar->get_menu($_SESSION['log_role'] , $op->getThemeColor()); ?>
 </ul>