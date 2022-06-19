<?php

/**
 * fileName:    معلومات الرسوم
 */
?>
<div class="container col-7">
    <?php $op = new Khas(); ?>
    <div class="row">
        <?php foreach ((array) $viewmodel as $item) : ?>

            <div class="col-xs-12 col-md-6">
                <div class="card p-0 rounded-0 border-0 z-depth-1">
                    <?php $op = new Khas(); ?>
                    <div class="card-header text-center text-white danger-color-dark p-1">
                    <?=$op->lang("fee information");?>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("id number");?> </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $item['stu_id']; ?> </td>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("name");?> </td>
                                <td class="p-2" style="font-size: 80%" colspan="3"> <?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("program");?></td>
                                <td class="p-2" colspan="5" style="font-size: 80%"> <?php echo $op->GetSelProgInfoTxt($item['prog_id']); ?></td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("shift");?> </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("section");?> </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("level");?> </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("group");?> </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%" colspan="3"> <?=$op->lang("paymnet reasone");?> </td>
                                <td class="p-2" style="font-size: 80%"> <?php $op->getPayResoTxt($item['Pay_Res_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%" colspan="5"> <?=$op->lang("previous total");?> </td>
                                <td class="p-2" style="font-size: 80%"> $<?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id'], $item['prog_id']); ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php $row = $op->getstupaidfeetoupdate($_GET['sta_id']); ?>
        <?php foreach ((array) $row as $editItem) : ?>
            <div class="col-xs-12 col-md-6">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="card">
                        <div class="card-header text-center text-white unique-color-dark p-1 mb-0">
                        <?=$op->lang("fee receipt voucher");?> 
                        </div>
                        <div class="card-body pt-0 pb-1">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("paymnet date");?>
                                    <input type="date" name="payDate" min="2019-01-01" value="<?php echo $editItem['payDate']; ?>" id="payDate" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("total reqiured");?>
                                    <input type="number" name="want" id="want" value="<?php echo $editItem['want']; ?>" class="form-control rounded-0" min="0" disabled>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("discount");?>
                                    <input type="number" name="Discount" id="Discount" value="<?php echo $editItem['Discount']; ?>" min="0" value="<?php echo  $op->setPosts('Discount'); ?>" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("payment");?>
                                    <input type="number" name="amount" id="amount" value="<?php echo $editItem['amount']; ?>" step="any" class="form-control rounded-0" min="0">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("voucher number");?>  
                                    <input type="text" name="statment_num" id="statment_num" value="<?php echo $editItem['statment_num']; ?>" min="0" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("note");?>
                                    <input type="text" name="note" id="note" value="<?php echo  $editItem['note']; ?>" class="form-control rounded-0" min="0">
                                </div>
                            </div>
                            <button type="submit" name="stupaidfeeupdate" class="btn success-color-dark text-white px-3 py-2"> <?=$op->lang("fee reasone");?> </button>
                            <a href="<?php echo ROOT_URL; ?>/finance/paidstufee/<?php echo $_GET['id'];?>" class="btn danger-color-dark text-white float-left px-3 py-2"> <?=$op->lang("cancel");?> </a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <br>
</div>