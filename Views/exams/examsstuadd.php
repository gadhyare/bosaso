    <?php
    /**
     * fileName: رفع اختبار
     */
    ?>
    <?php $op = new Khas()  ?>
    <?php $dep_id = (isset($_POST['dep_id'])) ? $_POST['dep_id'] : ''; ?>
    <?php $sec_id = (isset($_POST['sec_id'])) ? $_POST['sec_id'] : ''; ?>
    <?php $lev_id = (isset($_POST['lev_id'])) ? $_POST['lev_id'] : ''; ?>
    <?php $grp_id = (isset($_POST['grp_id'])) ? $_POST['grp_id'] : ''; ?>
    <?php $ex_code = (isset($_POST['ex_code'])) ? $_POST['ex_code'] : 0; ?>
    <?php $ex_crid = (isset($_POST['ex_crid'])) ? $_POST['ex_crid'] : 0; ?>
    <?php $sub_id = (isset($_POST['sub_id'])) ? $_POST['sub_id'] : 0; ?>
    <?php $stu_id = (isset($_POST['stu_id'])) ? $_POST['stu_id'] : 0; ?>

    <?php if (isset($_GET['id'])) : ?>

        <div class="container col-xs-12 col-sm-12 col-md-10 m-auto  ">
            <div class="card  z-depth-2">
                <div class="card-header  text-white  unique-color-dark font-weight-bold text-center p-1"> <?=$op->lang("add new exam");?> </div>
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label> <?=$op->lang("shift");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="dep_id" id="dep_id">
                                        <?php $op->getSelDepartment($dep_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label> <?=$op->lang("section");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="sec_id" id="sec_id">
                                        <?php $op->getSelesection($sec_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label> <?=$op->lang("level");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="lev_id" id="lev_id">
                                        <?php echo  $op->GetSellevels($lev_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label> <?=$op->lang("group");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1" style="font-size:90%;" name="grp_id" id="grp_id">
                                        <?php echo $op->GetSelgroups($grp_id); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <label> <?=$op->lang("subject");?> </label>
                                <div class="form-group">
                                    <select class="form-control rounded-0 p-1 select2" style="font-size:70% !important;" name="sub_id" id="sub_id">
                                        <?php $op->getprog_id($_GET['id']); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <label> <?=$op->lang("code");?></label>
                                <div class="form-group">
                                    <input type="text" name="ex_code" id="ex_code" value="<?php echo $ex_code; ?>" class="form-control rounded-0 p-1" style="font-size:90%;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label> <?=$op->lang("cridet hours");?> </label>
                                <div class="form-group">
                                    <input type="number" name="ex_crid" id="ex_crid" value="<?php echo $ex_crid; ?>" class="form-control rounded-0 p-1" style="font-size:90%;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <label><?=$op->lang("id number");?> </label>
                                <div class="form-group">
                                    <input type="text" name="stu_id" id="stu_id" value="<?php echo $stu_id; ?>" class="form-control rounded-0 p-1" style="font-size:90%;">
                                </div>
                            </div>
                        </div>

                        <table class="table  text-center   mdb-color darken-3  ">
                            <tr>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white" colspan="3">
                                <?=$op->lang("frist tearm");?>
                                </td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white" colspan="3">
                                <?=$op->lang("second tearm");?>
                                </td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white" rowspan="2"> <?=$op->lang("attendance");?> </td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white" rowspan="2"> <?=$op->lang("total");?></td>
                            </tr>
                            <tr> 
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("questions");?></td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("assignment");?></td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("test");?></td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("questions");?></td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("assignment");?></td>
                                <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("test");?> </td>
                            </tr>
                            <tbody class="mdb-color darken-3">
                                <tr>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="qu1" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="qu1" value="<?php echo $op->setPosts('qu1'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="as1" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="as1" value="<?php echo $op->setPosts('as1'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="ex1" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="ex1" value="<?php echo $op->setPosts('ex1'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="qu2" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="qu2" value="<?php echo $op->setPosts('qu2'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="as2" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="as2" value="<?php echo $op->setPosts('as2'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="ex2" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="ex2" value="<?php echo $op->setPosts('ex2'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="att" onblur="getTotal();" type="numbar" maxlength="3" require value="0" name="att" value="<?php echo $op->setPosts('att'); ?>"></td>
                                    <td class=" p-1  text-center mdb-color darken-3 text-white"> <input class="form-control rounded-0 p-0 text-center " id="totals" onblur="getTotal();maxTotal();" type="numbar" maxlength="3" require value="0" name="totals" disabled></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" name="addExamForStu" id="addExamForStu" class="btn success-color-dark p-2  text-white"> <i class="fa fa-paper-plane"></i> <?=$op->lang("add");?> </button>

                        <a href="<?php echo ROOT_URL; ?>/exams/examselPro" class="btn danger-color-dark p-2  text-white float-left"> <i class="fa fa-arrow-left"> </i> <?=$op->lang("go back");?> </a>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>



    <script>
        $('.select2').select2();

        function getTotal() {
            var total = document.getElementById("totals");
            var qu1 = document.getElementById("qu1");
            var as1 = document.getElementById("as1");
            var ex1 = document.getElementById("ex1");
            var qu2 = document.getElementById("qu2");
            var as2 = document.getElementById("as2");
            var ex2 = document.getElementById("ex2");
            var att = document.getElementById("att");
            var addExamForStu = document.getElementById("addExamForStu");
            total.value = parseInt(qu1.value) + parseInt(as1.value) + parseInt(ex1.value) + parseInt(qu2.value) + parseInt(as2.value) + parseInt(ex2.value) + parseInt(att.value);
            if (total.value > 100) {
                total.classList.add("danger-color-dark");
                total.classList.add("text-white");
                addExamForStu.disabled = true;
            } else {
                total.classList.remove("danger-color-dark");
                total.classList.remove("text-white");
                addExamForStu.disabled = false;

            }
        }


        var dep = document.getElementById("dep").value;
        var sec = document.getElementById("sec").value;
        var lev = document.getElementById("lev").value;
        var grp = document.getElementById("grp").value;
        var sub = document.getElementById("sub").value;

        var department = document.getElementById("department");
        var section = document.getElementById("section");
        var level = document.getElementById("level");
        var group = document.getElementById("group");
        var subject = document.getElementById("subject");


        department.value = dep;
        section.value = sec;
        level.value = lev;
        group.value = grp;
        subject.value = sub;
    </script>