<?php
$title = get_sub_field('title');
$text = get_sub_field('text');
$slider = get_sub_field('slider');

if (empty($title) && empty($text) && empty($slider)) return;
?>

<section class="cards-slider-section">
    <div class="container">
        <div class="colored-wrapper">

            <?php if(!empty($title) || !empty($text)): ?>
                <div class="cards-slider-text-wrapper">

                    <?php if (!empty($title)) echo '<h2 class="title_alt-color">' . $title . '</h2>' ?>

                    <?php if (!empty($text)) echo '<div class="cards-slider-section-text">' . $text . '</div>' ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($slider)): ?>
                <div class="cards-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">

                            <?php foreach ($slider as $slider_item): ?>
                                <div class="swiper-slide">
                                    <div class="swiper-slide__inner">
                                        <?php
                                        if(!empty($slider_item['title'])) echo '<div><p>' . $slider_item['title'] . '</p></div>';

                                        if(!empty($slider_item['text'])) echo '<div><p>' . $slider_item['text'] . '</p></div>';
                                        ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
