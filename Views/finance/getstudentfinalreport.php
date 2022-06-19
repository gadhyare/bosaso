<table class="table">
<?php $op = new khas(); ?>
    <?php foreach ($viewmodel as $v) : ?>
        <tr>
            <td> <?php echo $op->getSelpaymentres($v['PaymentRes']);?> </td>
        </tr>
    <?php endforeach; ?>
</table>