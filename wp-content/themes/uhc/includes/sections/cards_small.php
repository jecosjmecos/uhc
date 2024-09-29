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

                printf(
                    '<div class="small-cards-item"><span>%s</span><span class="text-hover">%s</span></div>',
                    $card['text'],
                    $card['text_hover']
                );
            endforeach;

            echo '</div>';
        endif;
        ?>
    </div>
</section>
