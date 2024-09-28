<?php
$text = get_sub_field('text');
$logos = get_sub_field('logos');

if(empty($text) && empty($logos)) return;
?>

<section class="logos">
    <div class="container">
        <?php if(!empty($text)) echo '<div class="logos-text">' . $text . '</div>' ?>

        <?php
        if(!empty($logos)):
            echo '<div class="logos-items">';

            foreach($logos as $logo){
                if(!empty($logo['image'])){
                    echo '<span class="logos-item">' . wp_get_attachment_image($logo['image'], [250, 80]) . '</span>';
                }
            }

            echo '</div>';
        endif;
        ?>
    </div>
</section>
