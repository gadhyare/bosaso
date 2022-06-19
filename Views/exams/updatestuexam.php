    <?php
    /**
     * fileName:  تعديل اختبار طالب
     */
    ?>

    <?php
    $items = json_decode($viewmodel);

    if (count((array) $items)) : ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <?php $no = 1; ?>
            <?php foreach ($items as $SearchResultShow => $val) : ?>
                <?php $subCode =  preg_match_all('!\d+!', $val->ex_code, $matches);  ?>
                <div class="container">
                    <div class="container mt-5">
                        <div class="card   z-depth-2">
                            <div class="card-header  unique-color-dark text-white font-weight-bold text-center p-1"> <?=$op->lang("update student test rrsult");?> </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8 text-center">
                                        <div class="form-group  ">
                                            <label> <?=$op->lang("program");?> </label>
                                            <select class="form-control   p-0  rounded-0 float-right" id="prog_id" name="prog_id" style="font-size:85%">
                                                <?php $op->FullSelProgInfo($val->prog_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2 ">
                                        <label> <?=$op->lang("code");?> </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded-0 text-center" name="ex_code" id="ex_code" value="<?php echo $val->ex_code; ?>" style="font-size:85%">
                                           
                                        </div>
                                    </div>
                                    <div class=" col-xs-12 col-md-2 ">
                                        <label> <?=$op->lang("cridt hours");?> </label>
                                        <div class=" form-group">
                                            <input type="text" class="form-control rounded-0 text-center" name="ex_crid" id="ex_crid" value="<?php echo $val->ex_crid; ?>" style="font-size:85%">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?=$op->lang("shift");?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="dep_id" id="dep_id">
                                                <?php $op->getSelDepartment($val->dep_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?=$op->lang("section");?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="sec_id" id="sec_id">
                                                <?php $op->getSelesection($val->sec_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?=$op->lang("level");?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="lev_id" id="lev_id">
                                                <?php $op->GetSellevels($val->lev_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <label> <?=$op->lang("group");?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-1" name="grp_id" id="grp_id">
                                                <?php $op->GetSelgroups($val->grp_id); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4 p-0">
                                        <label> <?=$op->lang("subject");?> </label>
                                        <div class="form-group">
                                            <select class="form-control rounded-0 text-center p-0 float-right col-9" name="sub_id" id="sub_id">
                                                <?php $op->getSeleExsubject($val->sub_id); ?>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div id="idCount"></div>
                                <table class="table   text-center">
                                    <tr>
                                        <td class="mdb-color darken-3 p-2 text-white text-center" rowspan="2"><?=$op->lang("id number");?> </td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center" colspan="3">
                                        <?=$op->lang("first taerm");?>
                                        </td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center" colspan="3">
                                        <?=$op->lang("second tearm");?> 
                                        </td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center" rowspan="2"> <?=$op->lang("attendance");?> </td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center" rowspan="2"> <?=$op->lang("total");?></td>
                                    </tr>
                                    <tr>
                                        <td class="mdb-color darken-3 p-2 text-white text-center"> <?=$op->lang("questions");?></td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center"> <?=$op->lang("assignment");?></td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center"> <?=$op->lang("test");?></td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center"> <?=$op->lang("questions");?></td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center"> <?=$op->lang("assignment");?></td>
                                        <td class="mdb-color darken-3 p-2 text-white text-center"> <?=$op->lang("test");?> </td>
                                    </tr>

                                    <tbody>
                                        <tr>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="stu_id" id="stu_id" value="<?php echo $val->stu_id; ?>"> </td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="qu1" id="qu1" value="<?php echo $val->qu1; ?>"></td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="as1" id="as1" value="<?php echo $val->as1; ?>"></td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="ex1" id="ex1" value="<?php echo $val->ex1; ?>"></td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="qu2" id="qu2" value="<?php echo $val->qu2; ?>"></td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="as2" id="as2" value="<?php echo $val->as2; ?>"></td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="ex2" id="ex2" value="<?php echo $val->ex2; ?>"></td>
                                            <td class="p-0 text-center"> <input type="number" onblur="getTotal();" class="form-control rounded-0 text-center" name="att" id="att" value="<?php echo $val->att; ?>"></td>
                                            <td class="p-0 text-center border" style="font-size:20px;"> <input class="form-control rounded-0 p-0 text-center " id="totals" onblur="getTotal();maxTotal();" type="numbar" value="<?php echo $val->qu1 + $val->as1 + $val->ex1 + $val->qu2 + $val->as2 + $val->ex2 + $val->att; ?>" maxlength="3" require value="0" name="totals" disabled></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group pt-2">
                                    <button type="submit" name="btnUpdate" id="btnUpdate" class="danger-color-dark border-0 text-white p-1 btn z-depth-2  float-left  mt-3  "> <i class="fa fa-paper-plane" style="font-size:10px;"> </i> <?=$op->lang("update");?> </button>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </form>
    <?php endif; ?>

    <script>
        function getTotal() {
            var total = document.getElementById("totals");
            var qu1 = document.getElementById("qu1");
            var as1 = document.getElementById("as1");
            var ex1 = document.getElementById("ex1");
            var qu2 = document.getElementById("qu2");
            var as2 = document.getElementById("as2");
            var ex2 = document.getElementById("ex2");
            var att = document.getElementById("att");
            var addExamForStu = document.getElementById("btnUpdate");
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