    <?php
    /**
     * fileName: طالب   GPA  طباعة
     */
    ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" role="form3" class="m-auto border ">
        <div class="card p-2">
            <div class="form-group text-dark">
                <label for="action_name"> <?=$op->lang("update type");?> </label>
                <br>
                <select name="action_name" id="action_name" class="form-control p-0 rounded-0 col-xs-12 col-md-8 float-right ml-1">
                    <option value="1"><?=$op->lang("plus");?></option>
                    <option value="2"><?=$op->lang("shortage");?></option>
                </select>

                <button type="submit" name="do_action" id="do_action" class="btn danger-color-dark text-white  py-2 px-3 m-auto col-xs-12 col-md-3"> <i class="fa fa-check"></i> </button>
            </div>
            <table class="table  text-center   mdb-color darken-3  ">
                <tr>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white" colspan="3">
                    <?=$op->lang("first tearm");?>
                    </td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white" colspan="3">
                    <?=$op->lang("second tearm");?>
                    </td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white" rowspan="2"> <?=$op->lang("attendance");?> </td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white" rowspan="2"> <?=$op->lang("total");?></td>
                </tr>
                <tr>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("assignment");?></td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("search");?></td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("test");?></td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("assignment");?></td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("search");?></td>
                    <td class="p-1 border-0  text-center mdb-color darken-3 text-white"> <?=$op->lang("test");?> </td>
                </tr>
                <tbody class="mdb-color darken-3">
                    <tr>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="qu1" onblur="getTotal();" maxlength="3" require value="0" name="qu1" value="<?php echo $op->setPosts('qu1'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="as1" onblur="getTotal();" maxlength="3" require value="0" name="as1" value="<?php echo $op->setPosts('as1'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="ex1" onblur="getTotal();" maxlength="3" require value="0" name="ex1" value="<?php echo $op->setPosts('ex1'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="qu2" onblur="getTotal();" maxlength="3" require value="0" name="qu2" value="<?php echo $op->setPosts('qu2'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="as2" onblur="getTotal();" maxlength="3" require value="0" name="as2" value="<?php echo $op->setPosts('as2'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="ex2" onblur="getTotal();" maxlength="3" require value="0" name="ex2" value="<?php echo $op->setPosts('ex2'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="att" onblur="getTotal();" maxlength="3" require value="0" name="att" value="<?php echo $op->setPosts('att'); ?>"></td>
                        <td class=" p-1  text-center mdb-color darken-3 text-white"> <input type="number" min="0" class="form-control rounded-0 p-0 text-center " id="totals" onblur="getTotal();maxTotal();" maxlength="3" require value="0" name="totals" disabled></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>



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