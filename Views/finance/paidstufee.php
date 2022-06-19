<?php

/**
 * fileName: معلومات الرسوم
 */
?>
<div class="container col-9">
    <?php foreach ((array) $viewmodel as $item) : ?>
        <?php $op = new Khas(); ?>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="card p-0 rounded-0 border  z-depth-0">
                    <?php $op = new Khas(); ?>
                    <div class="card-header text-center text-white danger-color-dark p-1">
                        <?=$op->lang("student paid fee");?>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("id number");?> <?php echo $item['stu_id']; ?></td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getStuInfoById($item['stu_id'], 'stu_id'); ?> </td>
                                <td class="p-2" style="font-size: 80%"> <?=$op->lang("name");?> </td>
                                <td class="p-2" style="font-size: 80%" colspan="3"> <?php echo $op->getStuInfoById($item['stu_id'], "StuName"); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%">  <?=$op->lang("program");?> </td>
                                <td class="p-2" colspan="5" style="font-size: 80%"> <?php echo $op->GetSelProgInfoTxt($item['prog_id']); ?></td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%">  <?=$op->lang("shift");?>  </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%">  <?=$op->lang("section");?>  </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%">  <?=$op->lang("level");?>  </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%">  <?=$op->lang("group");?>  </td>
                                <td class="p-2" style="font-size: 80%"> <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>
                                <td class="p-2" style="font-size: 80%" colspan="3">  <?=$op->lang("payment reson");?>  </td>
                                <td class="p-2" style="font-size: 80%"> <?php $op->getPayResoTxt($item['Pay_Res_id']); ?> </td>
                            </tr>
                            <tr>
                                <td class="p-2" style="font-size: 80%" colspan="5">  <?=$op->lang("previous balance");?>  </td>
                                <td class="p-2" style="font-size: 80%"> $<?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id'], $item['prog_id']); ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="card z-depth-0 border">
                        <div class="card-header text-center text-white unique-color-dark p-1 mb-0">
                           <?=$op->lang("fee receipt voucher");?>
                        </div>
                        <div class="card-body pt-0 pb-1">
                            <div class="row">
                                <div class="col-12">
                                    <label for="acc_mov"> <?=$op->lang("account number");?> </label>
                                    <select name="acc_mov" id="acc_mov" class="form-control rounded-0 p-0">
                                        <?php $op->getBankDataList(); ?>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("payment datye");?>
                                    <input type="date" name="payDate" min="2019-01-01" value="<?php echo date("Y-m-d", time()); ?>" id="payDate" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("total required");?>
                                    <div class="row">
                                     
                                            <input type="number" name="want" id="want" value="<?php echo $item['want']; ?>" class="form-control rounded-0 mb-2" min="0" disabled>
                    
                                            <!-- Button trigger modal -->
                                            <a href="<?php echo ROOT_URL; ?>/finance/updatestufee/<?php echo $_GET['id']; ?>" class="btn primary-color-dark text-white m-auto py-2 px-3 col-12">
                                            <?=$op->lang("update");?> </a>
                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("dicount");?>
                                    <input type="number" name="Discount" id="Discount" value="0" min="0" value="<?php echo  $op->setPosts('Discount'); ?>" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("paymnet");?>
                                    <input type="number" name="amount" id="amount" value="<?php echo  $op->setPosts('amount'); ?>" step="any" class="form-control rounded-0" min="0">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("voucher number");?>
                                    <input type="text" name="statment_num" id="statment_num" value="<?php echo  $op->setPosts('statment_num'); ?>" min="0" class="form-control">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?=$op->lang("note");?>
                                    <input type="text" name="note" id="note" value="<?php echo  $op->setPosts('note'); ?>" class="form-control rounded-0" min="0">
                                </div>
                            </div>
                            <button type="submit" name="paidFee" class="btn success-color-dark text-white px-3 py-2"> <?=$op->lang("pay");?>   </button>
                            <a href="<?php echo ROOT_URL; ?>/finance/feepaid" class="btn danger-color-dark text-white float-left px-3 py-2"> <?=$op->lang("cancel");?> </a>
                            <a href="<?php echo ROOT_URL; ?>/finance/paidstufeeprint/<?php echo  $item['Invoice_id']; ?>" target="_blank" class="btn danger-color-dark text-white float-left px-3 py-2"> <i class="fa fa-print"></i> </a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    <br>

    <div class="card mt-3 z-depth-0 border    p-0 mb-0  m-auto  ">
        <div class="card-header z-depth-0  p-1  text-right  border-0 mb-0 ">
            <?=$op->lang("statement of current bond payments");?>
            <span class="float-left  pink darken-4 text-white p-1" style="font-size: 70%;">
                <?php $op->getcurrentFeeInfo($_GET['id'], 'amount', 'Discount'); ?>

                <?=$op->lang("total blance");?> :
                <?php echo $op->getallstupaidFeeExcCuLev($item['stu_id'], $item['lev_id'], $item['Pay_Res_id'], $item['prog_id']) + $op->stufeelevplance($_GET['id'], 'amount', 'Discount'); ?>$
            </span>
        </div>
        <?php $row =  $op->getstuFeetranstion($_GET['id']); ?>
        <table class="table  table-striped table-bordered">
            <thead>
                <th class="p-1 bg-white text-dark"> # </th>
                <th class="p-1 bg-white text-dark"> <?=$op->lang("voucher number");?> </th>
                <th class="p-1 bg-white text-dark"> <?=$op->lang("date");?> </th>
                <th class="p-1 bg-white text-dark"> <?=$op->lang("discount");?> </th>
                <th class="p-1 bg-white text-dark"> <?=$op->lang("paymnet");?> </th>
                <th class="p-1 bg-white text-dark"> <?=$op->lang("note");?> </th>
                <th class="p-1 bg-white text-dark"> <?=$op->lang("operation");?> </th>

            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ((array) $row as $item) : ?>
                    <tr>
                        <td class="p-1" style="width:5%"> <?php echo $i++; ?> </td>
                        <td class="p-1" style="width:15%"> <?php echo $item['statment_num']; ?> </td>
                        <td class="p-1" style="width:10%"> <?php echo $item['payDate']; ?> </td>
                        <td class="p-1" style="width:10%"> $<?php echo $item['Discount']; ?> </td>
                        <td class="p-1" style="width:5%"> $<?php echo $item['amount']; ?> </td>
                        <td class="p-1" style="width:40%"> <?php echo $item['note']; ?> </td>
                        <td class="p-1 text-center" style="width:10%;font-size: 70%;">
                            <span> <a href="<?php echo ROOT_URL; ?>/finance/updatepaidstufee/<?php echo $_GET['id']; ?>/?sta_id=<?php echo $item['sta_id']; ?>" class="bg-info text-white rounded-0  px-1 py-0 m-1 " data-toggle="tooltip" title="<?=$op->lang("update");?>"> <i class="fa fa-pencil p-0" aria-hidden="true"></i> </a> </span>
                            <span> <a href="<?php echo ROOT_URL; ?>/finance/delpaidstufee/<?php echo $_GET['id']; ?>/?sta_id=<?php echo  $item['sta_id']; ?>" class="danger-color-dark ml-1  text-white rounded-0 px-1 py-0 " data-toggle="tooltip" title="<?=$op->lang("delete");?>"> <i class="fa fa-trash  p-0" aria-hidden="true"></i> </a> </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="p-1 text-white bg-dark text-center" style="width:40%" colspan="6"> <?=$op->lang("total blance");?> </td>
                    <td class="p-1 text-white bg-dark text-center" style="width:40%"> <?php echo $op->stufeelevplance($_GET['id'], 'amount', 'Discount'); ?>$ </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>