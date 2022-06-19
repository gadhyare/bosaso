    <?php
    /**
     * fileName: رفع درجات فصل
     */
    ?>
    <?php $op = new Khas(); ?>
    <a href="<?php echo ROOT_URL; ?>/downloads/examlist.xlsx" target="_blank" class="btn  info-color-dark text-white rounded-0 m-auto  py-1 px-3 float-left">
        <i class="fa fa-download" aria-hidden="true"></i> <?=$op->lang("download exam list form");?> </a>
    <div class="clearfix"></div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="card rounded-0 p-1 border z-depth-0">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="selecteduLev"> <?=$op->lang("select level");?>   </label>
                                <select name="edulev_id" id="edulev_id" class="form-control rounded-0 p-0">
                                    <?php $op->GetSeledulevel($_GET['prog_id']); ?>
                                </select>
                                <br>
                                <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> <?=$op->lang("select");?> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <?php if (isset($_GET['prog_id'])) : ?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <select class="form-control  p-1" id="FullPro" name="FullPro" onchange="getDg()">
                                <?php $op->FullSelProgInfoByLev($_GET['prog_id']); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="Sel_Pro_stu" class="btn red darken-4 text-white py-2 px-5  mt-0 float-right"> <?=$op->lang("student grades");?> </button>
                            <button type="submit" name="Sel_Pro_cls" class="btn green darken-4 text-white py-2 px-5  mt-0 float-left"><?=$op->lang("class degrees");?> </button>
                        </div>
                    </form>
                    <br><br>
                <?php endif; ?>
            </div>
        </div>
    </div>