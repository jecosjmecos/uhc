<?php

$slider = get_sub_field('slider');

if(empty($slider)) return;

?>

<section class="image-content-slider-section">
    <div class="container">
        <div class="image-content-slider swiper">
            <div class="swiper-wrapper">

                <?php
                foreach ($slider as $slider_item): ?>
                    <div class="swiper-slide">
                        <div class="swiper-slide__inner">
                            <?php
                            if(!empty($slider_item['image'])){
                                echo '<div class="image-content-slider__image">';
                                    echo wp_get_attachment_image($slider_item['image'], 'image-450-350');
                                echo '</div>';
                            } ?>

                            <?php
                            if(!empty($slider_item['title']) || !empty($slider_item['text'])){
                                echo '<div class="image-content-slider__text">';

                                    if(!empty($slider_item['title'])) echo '<h2>' . $slider_item['title'] . '</h2>';

                                    if(!empty($slider_item['text'])) echo '<div>' . $slider_item['text'] . '</div>';

                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>

            <div class="swiper-pagination swiper-pagination_alt"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
