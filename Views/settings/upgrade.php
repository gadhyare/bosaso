 <?php

    /**
     * fileName: ترقية البرنامج
     */
    ?>
 <div class="container col-xs-12 col-sm-12 col-md-10 m-auto text-center">
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="text-center p-0">
         <button type="submit" name="upgrade" class="btn danger-color-dark mt-2 float-left rounded-0 mb-2 py-1 px-3 text-white"> ترقية </button>
         <br class="mt-3">
     </form>
     <div class="clearfix"></div>
     <div class="card       z-depth-0   mb-3 p-1 rounded-0" style="background-color:<?php echo $op->getThemeColor(); ?>">
         <div style="font-size:80%" class="card-header   border-0 text-white font-weight-bold  p-1  rounded-0  "> <i class="fa fa-info"></i> معلومات البرنامج </div>
         <div class="card-body bg-white p-0">
             <table id="dtHorizontalExample" class="table  table-striped        z-depth-0" cellspacing="0" width="100%">
                 <tr>
                     <td class="p-0  border  " colspan="2"> اسم البرنامج </td>
                     <td class="p-0  border text-left" colspan="2"> <?php echo $op->getVersion('name'); ?> </td>
                 </tr>
                 <tr>
                     <td class="p-0  border "> انسخة الحالية </td>
                     <td class="p-0  border text-left"> <?php echo $op->getVersion('version'); ?> </td>
                     <td class="p-0  border "> النسخة الجديدة </td>
                     <td class="p-0  border text-left"> <?php echo $_SESSION['update']; ?> </td>
                 </tr>
                 <tr>
                     <td class="p-0  border " colspan="2"> تطوير </td>
                     <td class="p-0  border text-left" colspan="2"> <?php echo $op->getVersion('developer')['name']; ?> </td>
                 </tr>
                 <tr>
                     <td class="p-0  border " colspan="2"> الهاتف </td>
                     <td class="p-0  border text-left" style="direction: ltr" colspan="2"><?php echo $op->getVersion('developer')['contact']['Phone']; ?></td>
                 </tr>
                 <tr>
                     <td class="p-0  border " colspan="2"> البريد الإلكتروني</td>
                     <td class="p-0  border text-left" colspan="2"> <?php echo $op->getVersion('developer')['contact']['email']; ?> </td>
                 </tr>
                 </tbody>
             </table>
         </div>
         <p class="py-0 px-1 my-0 text-white text-left"> </p>
         <p class="py-0 px-1 my-0 text-white text-left"></p>
     </div>
 </div>