<?php
$slider = get_sub_field('slider');

if (empty($slider)) return;
?>

<section class="banner-slider-section">
    <div class="container">
        <div class="banner-slider swiper">
            <div class="swiper-wrapper">

                <?php
                foreach ($slider as $slider_item):
                    if(empty($slider_item['image'])) continue; ?>

                    <div class="swiper-slide">
                        <div class="swiper-slide__inner">
                            <?php echo wp_get_attachment_image($slider_item['image'], 'banner-slider'); ?>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
