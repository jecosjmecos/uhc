<?php
$text = get_sub_field('text');
$image = get_sub_field('image');
$cards = get_sub_field('cards');

if (empty($text) && empty($image) && empty($cards)) return;

?>

<section class="info-section">
    <div class="container">
        <div class="info-section-wrapper">

            <?php if (!empty($text) || !empty($image)): ?>
                <div class="info-section-top">
                    <?php if (!empty($text)) echo '<div class="info-section-top__text">' . $text . '</div>' ?>

                    <?php
                    if (!empty($image)) {
                        echo '<div class="info-section-top__image">';
                        echo wp_get_attachment_image($image, 'info-section');
                        echo '</div>';
                    } ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($cards)): ?>
                <div class="info-section-cards">

                    <?php foreach($cards as $card): ?>
                        <div class="info-section-card">

                            <?php
                            if(!empty($card['icon'])){
                                echo '<div class="info-section-card__icon">';
                                    echo wp_get_attachment_image($card['icon'], [24, 24]);
                                echo '</div>';
                            } ?>

                            <?php
                            if(!empty($card['title'])){
                                echo '<div class="info-section-card__title">' . $card['title'] . '</div>';
                            } ?>

                            <?php
                            if(!empty($card['text'])){
                                echo '<div class="info-section-card__text">' . $card['text'] . '</div>';
                            } ?>

                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
