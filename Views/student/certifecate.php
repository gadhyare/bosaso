<?php

/**
 * fileName: مؤهلات الطالب
 */
?>
<div id="sertifaite" class="container tab-pane fade"><br>
  <h3> المؤهلات للعلمية </h3>
  <table class="table table-bordered">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <tr>

        <td>
          <div class="form-group">
            <label> درجة الشهادة </label>
            <select name="cer_name" class="form-control p-1  rounded-0">
              <option value="1"> ثانوية علمية </option>
              <option value="1"> ثانوية أدبية </option>
              <option value="1"> ثانوية شرعية </option>
              <option value="1"> شهادة جامعية </option>
              <option value="1"> أخرى </option>
            </select>
          </div>
          <div class="form-group">
            <label> سنة التخرج </label>
            <input type="text" name="user_name" class="form-control p-1  rounded-0" placeholder="سنة التخرج">
          </div>


        </td>
        <td>
          <div class="form-group">
            <label> الجهة التي تخرج منها </label>
            <input type="text" name="user_name" class="form-control p-1  rounded-0" placeholder=" الجهة التي تخرج منها    ">
          </div>
          <div class="form-group">
            <label> لغة الشهادة </label>
            <input type="text" name="email" class="form-control p-1  rounded-0" placeholder=" لغة الشهادة   ">
          </div>


        </td>
      </tr>
    </form>
  </table>
</div>