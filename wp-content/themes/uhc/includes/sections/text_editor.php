<?php
$text = get_sub_field('text');

if(empty($text)) return;
?>

<section class="text-editor-section">
    <div class="container">
        <?php echo $text ?>
    </div>
</section>
