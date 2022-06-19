<div class="card col-xs-12 col-md-4 m-auto p-3 rounded-0 ">
    <?php $op = new Khas(); ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="py-3">
        <div class="card-header bg-white text-center mb-3">

            <img src="<?php echo ROOT_URL; ?>/assets/img/GollisGatelogo.png" style="height:70px; top:0 !important" class="p-0 m-auto w-100" alt="">
        </div>
        <h3 class="y-2 text-center "> <?= $op->lang("resrt password"); ?> </h3>
        <div class="form-group">
            <input type="email" name="user_email" id="user_email" value="<?php echo $op->setPosts('user_email'); ?>" placeholder="exmple@someone.com" class="form-control rounded-0  ">
        </div>

        <a href="<?php echo ROOT_URL; ?>/user/resetpass" class="btn m-auto col-12 py-2 unique-color-dark text-white"> <i class="fa fa-reset"></i> <?= $op->lang("reset password"); ?> <i class="fa fa-reset"></i> </a>

        <br>
        <br>
        <a href="<?php echo ROOT_URL; ?>/user/login" class="btn m-auto col-12 py-2 danger-color-dark text-white"> <i class="fa fa-back"></i> <?= $op->lang("go back"); ?> <i class="fa fa-reset"></i> </a>
    </form>
</div>