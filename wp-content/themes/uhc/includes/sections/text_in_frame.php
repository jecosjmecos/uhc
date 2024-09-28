<?php
$text = get_sub_field('text');

if(empty($text)) return;
?>

<section class="text-in-frame">
    <div class="container">
        <div class="text-in-frame__inner">
            <?php echo $text ?>
        </div>
    </div>
</section>
