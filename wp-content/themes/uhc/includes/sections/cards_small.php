<?php
$text = get_sub_field('text_before');
$cards = get_sub_field('cards');

if(empty($text) && empty($cards)) return;
?>

<section class="small-cards">
    <div class="container">
        <?php if(!empty($text)) echo '<div class="small-cards-text">' . $text . '</div>' ?>

        <?php
        if(!empty($cards)):
            echo '<div class="small-cards-items">';

            foreach($cards as $card):
                $background = !empty($card['image']) ? wp_get_attachment_image_url($card['image'], 'thumbnail') : '';
                if(!empty($background)) $background = 'style="background-image: url(' . $background . ');"';

                $text_color = !empty($card['text_color']) ? 'style="color: ' . $card['text_color'] . ';"' : '';

                printf(
                    '<div class="small-cards-item" %s><span %s>%s</span></div>',
                    $background,
                    $text_color,
                    $card['text']
                );
            endforeach;

            echo '</div>';
        endif;
        ?>
    </div>
</section>
