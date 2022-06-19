<?php

/**
 * fileName: <?=$op->lang("add");?> قريب طالب
 */
?>
<div class="container col-xs-12 col-sm-12 col-md-6 m-auto text-right ">
    <?php if ($_GET['id'] != "") : ?>
        <?php $ops = new Khas(); ?>
        <div class="card  ">
            <div class="card-header  text-dark font-weight-bold text-center p-1"> <?=$op->lang("Add a student's relative");?> </div>
            <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <table class="table  ">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label> اسم قريب للطالب</label>
                                    <input type="text" name="names" value="<?php echo $ops->setPosts("names"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا اسم قريب للطالب الجديد">
                                </div>
                            </td>
                            <td>

                                <div class="form-group">
                                    <label> هواتف قريب الطالب </label>
                                    <input type="text" name="rel_phones" class="form-control p-1  rounded-0" value="<?php echo $ops->setPosts("rel_phones"); ?>" placeholder="أدخل هنا هواتف قريب الطالب">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label> صلة القرابة</label>
                                    <select name="rel_type" id="" class="form-control p-1  rounded-0">
                                        <option value="أم">أم</option>
                                        <option value="أب">أب</option>
                                        <option value="أخ/ت">أخ/ت</option>
                                        <option value="عم/ة">عم/ة</option>
                                        <option value="خال/ة">خال/ة</option>
                                        <option value="جد/ة">جد/ة</option>
                                        <option value="غير ذلك">غير ذلك</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label> درجة القرابة</label>
                                    <select name="rel_lev" id="" class="form-control p-1  rounded-0">
                                        <option value="أولى" <?php echo $ops->setPosts("rel_lev"); ?>>أولى</option>
                                        <option value="ثانية" <?php echo $ops->setPosts("rel_lev"); ?>>ثانية</option>
                                        <option value="ثالثة" <?php echo $ops->setPosts("rel_lev"); ?>>ثالثة</option>
                                        <option value="غير ذلك" <?php echo $ops->setPosts("rel_lev"); ?>>غير ذلك</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label> عنوان قريب الطالب </label>
                                    <input type="text" name="Address" value="<?php echo $ops->setPosts("Address"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا عنوان قريب الطالب">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label> إيميل قريب الطالب </label>
                                    <input type="email" name="Email" value="<?php echo $ops->setPosts("Email"); ?>" class="form-control p-1  rounded-0" placeholder="أدخل هنا إيميل قريب الطالب">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="text-right">
                        <input type="submit" name="addStuRel" value="<?=$op->lang("add");?>" class="btn primary-color-dark text-white float-right">
                        <a href="?men=men&p=students&a=update&id=<?php echo $_GET['id']; ?>" class="btn danger-color-dark text-white float-left"><?=$op->lang("cancel");?></a>
                    </div>
                </form>
            </div>
        </div>
    <?php else : ?>

        <?php printf(SELECT_ID, "رقم الطالب"); ?>


    <?php endif; ?>

</div>