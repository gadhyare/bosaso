<?php

/**
 * fileName: بحث معلومات طالب
 */
?>
<?php $op = new Khas()  ?>
<?php $FullPro = (isset($_GET['ids'])) ? $_GET['ids'] : ''; ?>
<?php $dep_id = (isset($_GET['dep_id'])) ? $_GET['dep_id'] : ''; ?>
<?php $sec_id = (isset($_GET['sec_id'])) ? $_GET['sec_id'] : ''; ?>
<?php $lev_id = (isset($_GET['lev_id'])) ? $_GET['lev_id'] : ''; ?>
<?php $grp_id = (isset($_GET['grp_id'])) ? $_GET['grp_id'] : ''; ?>

<div class="container-fuild">
    <div class="row">
        <div class="col-xs-12 col-12 col-md-3">
            <div class="card  z-depth-0 border mt-2">
                <div class="card-header  text-white  unique-color-dark font-weight-bold text-center p-1"> <?=$op->lang("class search");?> </div>
                <div class="card-body p-1">

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form1" class="  mt-1">

                        <div class="form-group">
                            <label for="selecteduLev"> <?=$op->lang("select level");?> </label>
                            <select name="edulev_id" id="edulev_id" class="form-control rounded-0 p-0">
                                <?php $op->GetSeledulevel($_GET['edulev_id']); ?>
                            </select>
                            <br>
                            <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> <?=$op->lang("select");?> </button>
                        </div>

                    </form>
                    <?php if (isset($_GET['edulev_id'])) : ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form2" class="  mt-1">
                            <div class="form-group   p-2">
                                <label> <?=$op->lang("program");?> </label>
                                <select class="form-control  p-1 rounded-0 " id="FullPro" name="FullPro" style="font-size: 85%">
                                    <?php $op->FullSelProgInfoByLev($_GET['edulev_id']); ?>
                                </select>
                                <br>
                            </div>
                            <div class="form-group">
                                <label> <?=$op->lang("shift");?> </label>
                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="dep_id" id="dep_id">
                                    <?php $op->getSelDepartment($dep_id); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> <?=$op->lang("section");?> </label>

                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="sec_id" id="sec_id">
                                    <?php $op->getSelesection($sec_id); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> <?=$op->lang("level");?> </label>

                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="lev_id" id="lev_id">
                                    <?php echo  $op->GetSellevels($lev_id); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> <?=$op->lang("group");?> </label>

                                <select class="form-control rounded-0 p-1" style="font-size:90%;" name="grp_id" id="grp_id">
                                    <?php echo $op->GetSelgroups($grp_id); ?>
                                </select>
                            </div>


                            <button type="submit" name="getData" id="getData" class="btn success-color-dark p-2  text-white  float-right"> <i class="fa fa-paper-plane"></i> <?=$op->lang("select");?> </button>
                            <button type="submit" name="delData" id="delData" class="btn danger-color-dark p-2  text-white  float-left"> <i class="fa fa-trash-o"></i> <?=$op->lang("delete");?> </button>
                        </form>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-12 col-md-9 border ">
            <?php if ($viewmodel) : ?>
                <?php $url_info = "ids=" . $_GET['ids'] . "&dep_id=" . $_GET['dep_id'] . "&sec_id=" . $_GET['sec_id'] . "&lev_id=" . $_GET['lev_id'] . "&grp_id=" . $_GET['grp_id']; ?>
                <?php $url_infoprint = "prog=" . $_GET['ids'] . "&dep=" . $_GET['dep_id'] . "&sec=" . $_GET['sec_id'] . "&lev=" . $_GET['lev_id'] . "&grp=" . $_GET['grp_id']; ?>
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/exporttoexcel?<?= $url_info; ?>" target="_blank" class="btn success-color-dark text-white  px-3 py-2   "> <i class="fa fa-download" aria-hidden="true"></i> <?=$op->lang("convert to excel");?> </a> 
                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/stuinfolistpdf/?<?= $url_infoprint; ?>" target="_blank" class="btn danger-color-dark text-white  px-3 py-2   "> <i class="fa fa-print" aria-hidden="true"></i> <?=$op->lang("print list");?> </a>
                <div class="table-responsive">

                    <table class="table" id="myTable">
                        <thead>
                            <th class="bg-light  text-center" style="font-size:70%"><?=$op->lang("id number");?></th>
                            <th class="bg-light text-center">
                                <input type="checkbox" name="chkall" id="chkall">
                            </th>
                            <th class="bg-light  text-center" style="font-size:90%"> <?=$op->lang("name");?> </th>
                            <th class="bg-light  text-center" style="font-size:90%"> <?=$op->lang("id number");?></th>
                            <th class="bg-light  text-center" style="font-size:90%"> <?=$op->lang("phones");?> </th>
                            <th class="bg-light  text-center" style="font-size:80%"><?=$op->lang("gender");?></th>
                            <th class="bg-light  text-center" style="font-size:80%"> <?=$op->lang("address");?> </th>
                            <th class="bg-light  text-center" style="font-size:80%"><?=$op->lang("register date");?></th>
                            <th class="bg-light  text-center" style="font-size:80%"><?=$op->lang("operation");?></th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($viewmodel as $itemss) : ?>
                                <?php $gender = ($itemss['gender'] == 2) ?  $op->lang("male")  :  $op->lang("female") ; ?>
                                <t>
                                    <td class=" text-center" style="font-size:70%"> <?php echo $itemss['stu_id']; ?> </td>
                                    <td class="text-center" style="font-size:70%"> <input type="checkbox" name="chk[]" id="chkitem" value="<?php echo $itemss['stu_id']; ?>"> </td>
                                    <td class="text-right" style="font-size:80%"> <?php echo $itemss['StuName'];  ?> </td>
                                    <td class="text-center" style="font-size:80%"> <?php echo $itemss['stu_num'];  ?> </td>
                                    <td class="text-center" style="font-size:80%"> <?php echo $op->getStuInfoById($itemss['stu_id'],    'Phones');  ?> </td>
                                    <td class="text-center" style="font-size:80%"> <?php echo $op->getSelesectionTxt($itemss['gender']);  ?> </td>
                                    <td class="text-center" style="font-size:80%"> <?php echo $itemss['StuAddress'];  ?> </td>
                                    <td class="text-center" style="font-size:80%"> <?php echo  $itemss['reg_date']; ?></td>
                                    <td class="text-center">
                                        <div class="dropdown m-auto">
                                            <button class="btn pink darken-3 text-white dropdown-toggle p-1 m-auto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?=$op->lang("operation");?>
                                            </button>
                                            <div class="dropdown-menu p-1 " aria-labelledby="dropdownMenuButton">
                                                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/update/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> <?=$op->lang("update");?> </a>
                                                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/student/stuInfoPrint/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> <?=$op->lang("print");?> </a>
                                                <a href="<?php echo rtrim(ROOT_URL, "/"); ?>/finance/feepaid/<?php echo $itemss['stu_id']; ?>" class="dropdown-item p-1"> <?=$op->lang("fee");?> </a>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <?php echo Data_Not_Founded; ?>
            <?php endif; ?>
        </div>
    </div>
</div>