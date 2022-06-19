  <?php
    /**
     * fileName: رئيسية الموظفين
     */
    ?>
  <div class="container mt-5 p-3">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
              <a href="<?php echo ROOT_URL; ?>/employees/emsections">
                  <div class="card p-0 bg-dark text-white rounded-0 p-2 tail"> <?=$op->lang("career section");?></div>
              </a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
              <a href="<?php echo ROOT_URL; ?>/employees/emlev">
                  <div class="card p-0 bg-dark text-white rounded-0 p-2 tail">     <?=$op->lang("career grades");?></div>
              </a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
              <a href="<?php echo ROOT_URL; ?>/employees/empinfo">
                  <div class="card p-0 bg-dark text-white rounded-0 p-2 tail">     <?=$op->lang("employee Information");?></div>
              </a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-2 a-tail ">
              <a href="<?php echo ROOT_URL; ?>/employees/empdistribution">
                  <div class="card p-0 bg-dark text-white rounded-0 p-2 tail">     <?=$op->lang("career distribution");?></div>
              </a>
          </div>
      </div>
  </div>