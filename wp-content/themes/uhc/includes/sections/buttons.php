<?php
$buttons = get_sub_field('buttons');

if(empty($buttons)) return;
?>

<section class="buttons-section">
    <div class="container">
        <?php
        foreach($buttons as $button):
            echo '<div class="buttons-item">' . get_theme_link($button['button'], 'button') . '</div>' ;
        endforeach;
        ?>
    </div>
</section>
