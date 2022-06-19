      <table class="table     border   table-bordered   z-depth-0" cellspacing="0">
        <thead>
          <tr>
            <td scope="col" class="p-1 danger-color-dark text-white" style="font-size:70%;"> #</td>
            <td scope="col" class="p-1 danger-color-dark text-white" style="font-size:70%;"> العملة </td>
            <td scope="col" class="p-1 danger-color-dark text-white" style="font-size:70%;"> البيع </td>
            <td scope="col" class="p-1 danger-color-dark text-white" style="font-size:70%;"> الشراء </td>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("US Dollar"); ?></td>
            <td class="p-1 " style="font-size:70%;"> <span id="usdsell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="usdbuy"> </span> </td>
          </tr>
          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("euro"); ?> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="Eurosell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="Eurobuy"> </span> </td>
          </tr>


          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("pound"); ?> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="GBPsell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="GBPbuy"> </span> </td>
          </tr>



          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("dirham"); ?> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="AEDsell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="AEDbuy"> </span> </td>
          </tr>


          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("rial"); ?> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="SARsell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="SARbuy"> </span> </td>
          </tr>


          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("ethiopian rial"); ?> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="ETBsell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="ETBbuy"> </span> </td>
          </tr>


          <tr>
            <td class="p-1 " style="font-size:70%;"> <?php echo $StNo++; ?> </td>
            <td class="p-1 " style="font-size:70%;"> <?= $op->lang("kenyan shilling"); ?> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="KESsell"> </span> </td>
            <td class="p-1 " style="font-size:70%;"> <span id="KESbuy"> </span> </td>
          </tr>
          <tr>
            <td colspan="4" class="border-0 border-top py-1 text-center danger-color-dark text-white" style="font-size:70%;">
              <?= $op->lang("Currency exchange rate on"); ?> : <span style="direction: ltr;" id="rateDate"> </span>
              <div id="siteNmae" class="text-center"> </div>
            </td>
          </tr>
        </tbody>
      </table>