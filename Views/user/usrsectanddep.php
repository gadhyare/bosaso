  <?php
    /**
     * fileName: تحديد الكليات والأقسام الممنوعة من الأعضاء
     */
    ?>
  <?php $op = new Khas(); ?>

  <div class="container">

      <br>
      <hr>
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-md-4 ">
                  <div class="card rounded-0 p-1 border z-depth-0">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="selecteduLev"> <?= $op->lang("select level"); ?> </label>
                                  <select name="edulev_id" id="edulev_id" class="form-control rounded-0">
                                      <?php $op->Getedulevel(); ?>
                                  </select>
                                  <br>
                                  <button type="submit" name="seledulev_id" class="btn danger-color-dark text-white rounded-0 col-12 m-auto py-2"> <?= $op->lang("select"); ?> </button>
                              </div>
                          </div>
                      </form>
                  </div>


              </div>
              <?php if (isset($_GET['edulev_id'])) : ?>

                  <div class="col-xs-12 col-md-8 ">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form-1">
                          <button type="submit" name="add_roles" class="btn success-color-dark text-white rounded-0  m-auto py-2"> <?= $op->lang("select"); ?> </button>
                          <input type="hidden" name="services" id="services" class="b form-contolr">
                          <table class="table  table-striped table-bordered  " id="myTable">
                              <thead>
                                  <th class="p-1 text-center   bg-dark" style="font-size:75% !important "> <?= $op->lang("Serial"); ?></th>
                                  <th class="py-2 px-4 bg-dark text-center">
                                      <input type="checkbox" name="chkGrp" id="chkGrp" onclick="selectall(this);">
                                  </th>
                                  <th class="p-1 text-center   bg-dark" style="font-size:75% !important "> <?= $op->lang("faculty"); ?> </th>
                                  <th class="p-1 text-center   bg-dark" style="font-size:75% !important "> <?= $op->lang("academic"); ?> </th>
                              </thead>
                              <tbody>
                                  <?php $i = 1; ?>
                                  <?php if ($op->FullSelProgInfobyEdulevidList($_GET['edulev_id'])) : ?>

                                      <?php foreach ($op->FullSelProgInfobyEdulevidList($_GET['edulev_id']) as $itemss) : ?>
                                          <tr>
                                              <td class="p-1 " style="font-size:75% !important "><?php echo $i++; ?></td>
                                              <td class="p-1"> <input type="checkbox" name="selectServices" id="chk" value="<?php echo $itemss['prog_id']; ?>" <?php echo $op->chk_rols_for_current_user($_GET['userid'], $itemss['prog_id'] ?? ""); ?>>
                                              </td>
                                              <td class="p-1 " style="font-size:75% !important ">
                                                  <?php echo  $op->GetSelfacultytxt($itemss['fac_id']); ?>
                                              </td>
                                              <td class="p-1 " style="font-size:75% !important ">
                                                  <?php echo $op->GetSelacademicstxt($itemss['academics_id']); ?>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  <?php endif; ?>

                              </tbody>
                          </table>
                      <?php endif; ?>
                      </form>
                  </div>
          </div>
      </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>
      function getinfo() {
          let y = document.querySelector("b");
          if (y.value !== '') {
              alert('on');
          }
      }

      function selectall(source) {
          let checkboxes = document.getElementsByName('selectServices'),
              services = document.getElementById('services'),
              count = 0;
          for (var i = 0, n = checkboxes.length; i < n; i++) {
              checkboxes[i].checked = source.checked;

          }

      }

      $(function() {
          $('input[name=chkGrp],input[name=selectServices]').on('change', function() {
              $('#services').val($('input[name=selectServices]:checked').map(function() {
                  return this.value;
              }).get());
          });

      });
  </script>