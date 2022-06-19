            <?php foreach ($viewmodel as $item) : ?>
                <div class="card">
                    <div class="card-header pink darken-3 text-white text-center p-1 rounded-0 border-0"> <?= $op->lang("add"); ?> حساب بنكي جديد </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label><?= $op->lang("account Name"); ?></label>
                                <input type="text" name="Ban_name" id="Ban_name" class="form-control p-1  rounded-0" value="<?php echo $op->pro_field($item['Ban_name']); ?>">
                                <input type="hidden" name="token" value="<?php echo $op->csrf(); ?>" class="form-control p-1  rounded-0">
                            </div>
                            <div class="form-group">
                                <label><?= $op->lang("account No"); ?></label>
                                <input type="text" name="Ban_num" id="Ban_num" class="form-control p-1  rounded-0" value="<?php echo $op->pro_field($item['Ban_num']); ?>">
                            </div>
                            <div class="form-group">
                                <label><?= $op->lang("date added"); ?></label>
                                <input type="date" name="Ban_date" id="Ban_date" class="form-control p-1  rounded-0" value="<?php echo $op->pro_field($item['Ban_date']); ?>">
                            </div>
                            <div class="form-group">
                                <label><?= $op->lang("opening Account"); ?></label>
                                <input type="number" name="Ban_op_acc" id="Ban_op_acc" class="form-control p-1  rounded-0" value="<?php echo $op->pro_field($item['Ban_op_acc']); ?>">
                            </div>
                            <div class="form-group">
                                <label><?= $op->lang("status"); ?></label>
                                <select name="Ban_active" id="Ban_active" class="form-control p-1  rounded-0">
                                    <?php $op->is_active($op->pro_field($item['Ban_active'])); ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>