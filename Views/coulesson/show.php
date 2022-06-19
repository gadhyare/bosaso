<div class="container bg-dark p-5">
    <?php $op = new Khas(); ?>
    <?php if ($viewmodel) : ?>
        <?php foreach ($viewmodel as $item) : ?>
            <div class="card p-0 border-0">
                <div class="card-header text-center rounded-0 py-4 bg-dark text-white border-0"> [<?php echo $op->get_courses_info_txt($item['cou_id'], 'cou_title'); ?>] </div>
            </div>
            <div class="card-body p-0">
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo $item['les_link']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <br>
           
            <span class="float-right"><?php echo $op->get_next_coulesson($item['les_id'],$item['cou_id']); ?> </span>
            <span class="float-left"><?php echo $op->get_previous_coulesson($item['les_id'],$item['cou_id']); ?> </span>
        <?php endforeach; ?>
    <?php else : ?>
        <?php echo Data_Not_Founded; ?>
    <?php endif; ?>
</div>