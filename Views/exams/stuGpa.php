    <?php
    /**
     * fileName: GPA طالب
     */
    ?>
    <?php $sing = (isset($_SESSION['sing'])) ? $_SESSION['sing'] : ""; ?>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <?php $op = new Khas(); ?>
            <div class="card-header text-center text-white unique-color-dark"> <?=$op->lang("find student grades");?> </div>
            <div class="card-body border">
                <div class="form-group row ">
                    <div class="col-xs-12 col-md-6">
                        <label for="stu_id"> <?=$op->lang("find student grades");?></label>
                        <select name="stu_id" id="stu_id" class="select2 form-control">
                            <?php $op->get_stu_id_lists($_GET['id']); ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <label for="pro_id"> <?=$op->lang("select program");?> </label>
                        <select name="pro_id" id="pro_id" class="form-control p-0 float-right col-12 rounded-0 select2  ">
                            <?php $op->FullSelProgInfo($_GET['prog_id']); ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-md-3 ">
                        <label for="teans_type"> <?=$op->lang("form type");?> </label>
                        <select name="teans_type" id="teans_type" class="form-control">
                            <option value="false"> <?=$op->lang("with details");?>  </option>
                            <option value="true"> <?=$op->lang("finally");?>  </option>
                        </select>

                    </div>
                    <div class="col-xs-12 col-md-9 pt-3 text-center">
                        <button type="submit" name="pos" class="btn danger-color-dark text-white px-2 py-2 m-auto "> <i class="fa fa-paper-plane"></i> </button>
                        <?php if (isset($_GET['id']) && isset($_GET['prog_id'])) : ?>
                            <?php $stupro = (isset($_GET['stupro'])) ? "&stupro=" . $_GET['stupro'] : ""; ?>
                            <a href="<?php echo ROOT_URL . "/exams/stuGpaprint/" . $_GET['id'] . "?prog_id=" . $_GET['prog_id']; ?><?php echo $stupro; ?>" target="_blank" class="btn primary-color-dark   text-white px-2 py-2 m-auto  "> <?=$op->lang("details");?>  </a>
                            <a href="<?php echo ROOT_URL . "/exams/stufullGpapdf/" . $_GET['id'] . "?prog_id=" . $_GET['prog_id'] . "&teans_type=" . $_GET['teans_type'] . $stupro; ?>" target="_blank" class="btn success-color-dark   text-white px-2 py-2 m-auto  "> <?=$op->lang("GPA");?>  </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body border">
                <table class="table">
                    <tr>
                        <td>
                            <label for="firstString"><?=$op->lang("name of the first official");?></label>
                            <input type="text" name="firstString" id="firstString" class="form-control" value="<?php echo (isset($_SESSION['firstString'])) ? $_SESSION['firstString'] : ""; ?>">
                        </td>
                        <td>
                            <label for="secondtString"> <?=$op->lang("title of the first official");?> </label>
                            <input type="text" name="secondtString" id="secondtString" class="form-control" value="<?php echo (isset($_SESSION['secondtString'])) ? $_SESSION['secondtString'] : ""; ?>">
                        </td>
                        <td>
                            <label for="therdString"><?=$op->lang("name of the second official");?></label>
                            <input type="text" name="therdString" id="therdString" class="form-control" value="<?php echo (isset($_SESSION['therdString'])) ? $_SESSION['therdString'] : ""; ?>">
                        </td>
                        <td>
                            <label for="foruthString"> <?=$op->lang("title of the second official");?></label>
                            <input type="text" name="foruthString" id="foruthString" class="form-control" value="<?php echo (isset($_SESSION['foruthString'])) ? $_SESSION['foruthString'] : ""; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="regDate"><?=$op->lang("register date");?></label>
                            <input type="text" name="regDate" id="regDate" class="form-control" value="<?php echo (isset($_SESSION['regDate'])) ? $_SESSION['regDate'] : ""; ?>">
                        </td>
                        <td>
                            <label for="endDate"><?=$op->lang("graduate date");?> </label>
                            <input type="text" name="endDate" id="endDate" class="form-control" value="<?php echo (isset($_SESSION['endDate'])) ? $_SESSION['endDate'] : ""; ?>">
                        </td>  
                    </tr>
                </table>
            </div>
        </form>
        <?php foreach ((array) $viewmodel as $item) : ?>
            <table class="table border  m-auto border text-right">
                <tr>
                    <td class="p-1 border"> <?=$op->lang("name");?>:<?php echo $op->getStuNameById($item['stu_id']); ?> </td>
                    <td class="p-1 border"> <?=$op->lang("id numpber");?>: <?php echo $op->getStuInfoById($_GET['id'], 'stu_num'); ?> </td>
                    <td class="p-1 border" colspan="3"> <?=$op->lang("program");?>: <?php echo $op->GetSelProgInfoTxt($_GET['prog_id']); ?> </td>
                </tr>
                <tr>
                    <td class="p-1 border"> <?=$op->lang("section");?> :<?php echo $op->getSelesectionTxt($item['sec_id']); ?> </td>
                    <td class="p-1 border"> <?=$op->lang("shift");?>: <?php echo $op->getSelDepartmentTxt($item['dep_id']); ?> </td>
                    <td class="p-1 border"> <?=$op->lang("level");?>: <?php echo $op->GetSellevelsTxt($item['lev_id']); ?> </td>
                    <td class="p-1 border"> <?=$op->lang("group");?>: <?php echo $op->GetSelgroupsTxt($item['grp_id']); ?> </td>

                </tr>
            </table>
        <?php endforeach; ?>
    </div>

    <script>
        $('.select2').select2();
    </script>