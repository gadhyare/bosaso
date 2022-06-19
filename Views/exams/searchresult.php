    <?php
    /**
     * fileName: تقرير اختبار مادة
     */
    ?>
    <?php $op = new Khas(); ?>
    <?php $dep_id = (isset($_GET['dep_id'])) ? $_GET['dep_id'] : ''; ?>
    <?php $sec_id = (isset($_GET['sec_id'])) ? $_GET['sec_id'] : ''; ?>
    <?php $lev_id = (isset($_GET['lev_id'])) ? $_GET['lev_id'] : ''; ?>
    <?php $grp_id = (isset($_GET['grp_id'])) ? $_GET['grp_id'] : ''; ?>
    <?php $prog_id = (isset($_GET['prog_id'])) ? $_GET['prog_id'] : ''; ?>
    <?php $sub_id = (isset($_GET['sub_id'])) ? $_GET['sub_id'] : ''; ?>
    <div class="container">
        <div class="row">

            <div class="card rounded-0 p-1 border z-depth-0 col-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="selecteduLev"> <?= $op->lang("select level"); ?> </label>
                                    <select name="edulev_id" id="edulev_id" class="form-control rounded-0 p-0">
                                        <?php $op->GetSeledulevel($_GET['prog_id']); ?>
                                    </select>
                                    <br>
                                    <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> <?= $op->lang("select level"); ?> </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <?php if (isset($_GET['prog_id']) && !empty($_GET['prog_id'])) : ?>
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-2">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="selprog_id"> <?= $op->lang("select program"); ?> </label>
                                        <select name="prog_id" id="prog_id" class="form-control rounded-0 p-0">
                                            <?php $op->FullSelProgInfoByLev($_GET['prog_id']); ?>
                                        </select>
                                        <br>
                                        <button type="submit" name="selprog_id" class="btn primary-color-dark text-white rounded-0 col-12 m-auto py-2"> <?= $op->lang("select program"); ?></button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <?php if (isset($_GET['selprog_id'])) : ?>
            <div class="container">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-3">
                    <div class="container mt-5">
                        <div class="card   z-depth-0 border">
                            <div class="card-header  unique-color-dark text-white font-weight-bold text-center p-1"> <?= $op->lang("exam report"); ?> </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?= $op->lang("shift"); ?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="dep_id" id="dep_id" style="font-size: 70%;">>
                                                <?php $op->getSelDepartment($dep_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?= $op->lang("section"); ?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="sec_id" id="sec_id" style="font-size: 70%;">>
                                                <?php $op->getSelesection($sec_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?= $op->lang("level"); ?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="lev_id" id="lev_id" style="font-size: 70%;">>
                                                <?php $op->GetSellevels($lev_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-1">
                                        <label> <?= $op->lang("group"); ?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="grp_id" id="grp_id" style="font-size: 70%;">>
                                                <?php $op->GetSelgroups($grp_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label> <?= $op->lang("subject"); ?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1 float-right col-9 select2" name="sub_id" id="sub_id" style="font-size: 70%;">
                                                <?php $op->getSeleExsubjectByProgId($_GET['selprog_id']); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <div class="form-group pt-2">
                                            <?php $print_url = "prog_id=" . $_GET['prog_id'] . "&selprog_id=" . $_GET['selprog_id'] . "&dep_id=" . $dep_id . "&sec_id=" . $sec_id . "&lev_id=" . $lev_id . "&grp_id=" . $grp_id . "&sub_id=" . $sub_id; ?>
                                            <button class="btn primary-color-dark py-1 px-2  text-white float-left" name="btnFullPro"> <i class="fa fa-check"></i> </button>
                                            <a href="<?php echo ROOT_URL; ?>/exams/delselclsexam?lev_id=1" class="btn danger-color-dark py-1 px-2  text-white float-left"> <i class="fa fa-trash-o"> </i> <?= $op->lang("delete"); ?></a>
                                            <?php if (isset($_GET['do'])) : ?><a href="<?php echo ROOT_URL; ?>/exams/searchresultprint/?s&<?php echo $print_url; ?>" target="_blank" class="btn info-color-dark py-1 px-2  text-white float-left"> <i class="fa fa-print" aria-hidden="true"></i> </a><?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <div id="idCount"></div>
                <div class="container tab-pane">
                    <table class="table   text-center table-striped table-bordered table-responsive-lg">
                        <tr>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("Serial"); ?></td>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"><?= $op->lang("name"); ?></td>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"><?= $op->lang("id number"); ?> </td>
                            <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                                <?=$op->lang("first term");?>  
                            </td>
                            <td class="p-1 purple darken-4 text-white text-center" colspan="3">
                                <?=$op->lang("second term");?>  
                            </td>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("attendance"); ?> </td>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("total"); ?></td>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("appreciation"); ?></td>
                            <td class="p-1 purple darken-4 text-white text-center" rowspan="2"> <?= $op->lang("operation"); ?></td>
                        </tr>
                        <tr>
                            <td class="p-1 purple darken-4 text-white text-center"> <?=$op->lang("questions");?></td>
                            <td class="p-1 purple darken-4 text-white text-center"> <?=$op->lang("assignment");?></td>
                            <td class="p-1 purple darken-4 text-white text-center"> <?=$op->lang("test");?></td>
                            <td class="p-1 purple darken-4 text-white text-center"> <?=$op->lang("questions");?></td>
                            <td class="p-1 purple darken-4 text-white text-center"> <?=$op->lang("assignment");?></td>
                            <td class="p-1 purple darken-4 text-white text-center"> <?=$op->lang("test");?></td>
                        </tr>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php $items = json_decode($viewmodel); ?>
                            <?php if (count((array) $items) > 0) : ?>
                                <?php foreach ($items as $SearchResultShow => $val) : ?>
                                    <tr>
                                        <td class="p-0 text-center"> <i id="no"> <?php echo $no++; ?></i> </td>
                                        <td class="p-0 "> <?php echo $op->getStuInfoById($val->stu_id, "StuName"); ?></td>
                                        <td class="p-0 text-center"> <?php echo $op->getStuInfoById($val->stu_id, "stu_num"); ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->qu1; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->as1; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->ex1; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->qu2; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->as2; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->ex2; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->att; ?></td>
                                        <td class="p-0 text-center"> <?php echo $val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att; ?></td>
                                        <td class="p-0 text-center"> <?php echo $op->get_gpa($val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att); ?></td>
                                        <td class="p-0 text-center">
                                            <a href="<?php echo ROOT_URL; ?>/exams/updatestuexam/<?php echo $val->ex_id; ?>/<?php echo $_GET['action']; ?>" class="btn success-color-dark text-white border-0 rounded-0 px-1 py-0"><i class="fa fa-pencil p-0" aria-hidden="true"></i> </a>
                                            <a href="<?php echo ROOT_URL; ?>/exams/stdelexam/<?php echo $val->ex_id; ?>/<?php echo $_GET['action']; ?>" class="btn danger-color-dark text-white border-0 rounded-0 px-1 py-0"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if ($no == 1) {
                                echo '<tr class="alert alert-danger " > <td colspan="13" class="text-center"> عفواً ولكن لا توجد بيانات لعرضها  </td></tr>';
                            } ?>
                            <div class="alert alert-info float-left text-dark rounded-0 py-1 ml-1"> <?php if ($no > 1) echo 'عدد الطلبة هو: ' . ($no - 1); ?> </div>
                            </tr>
                    </table>

                </div>

            </div>
        <?php endif; ?>
    </div>
    </div>


    </div>


    <script>
        $('.select2').select2();
    </script>