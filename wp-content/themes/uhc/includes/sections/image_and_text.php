<?php
$image = get_sub_field('image');
$text = get_sub_field('text');

if(empty($image) && empty($text)) return;
?>

<section class="image-and-text">
    <div class="container">
        <?php
        if(!empty($image)){
            echo '<div class="image-and-text__image">' . wp_get_attachment_image($image, 'image-500-500') . '</div>';
        }  ?>

        <?php if(!empty($text)) echo '<div class="image-and-text__text">' . $text . '</div>' ?>
    </div>
</section>