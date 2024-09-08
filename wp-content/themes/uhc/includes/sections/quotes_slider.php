<?php
$title = get_sub_field('title');
$title_type = get_sub_field('title_type');
$image = get_sub_field('image');
$slider = get_sub_field('slider');
$button_text = get_sub_field('button_text');

if (empty($title) && empty($slider) && empty($image)) return;

if (empty($title_type)) $title_type = 'h2';
?>

<section class="quotes-slider-section">
    <div class="container">

        <?php if (!empty($title) || !empty($slider)): ?>

            <div class="quotes-slider-content">
                <?php if (!empty($title)) echo "<$title_type>$title</$title_type>"; ?>

                <?php if (!empty($slider)): ?>
                    <div class="quotes-slider swiper">
                        <div class="swiper-pagination swiper-pagination_alt"></div>

                        <div class="swiper-wrapper">
                            <?php foreach ($slider as $item): ?>
                                <div class="quotes-slider-item swiper-slide">
                                    <div class="quotes-slider-item__inner">
                                        <?php
                                        if ($item['quote']) {
                                            echo '<div class="quotes-slider-item__quote">' . $item['quote'] . '</div>';
                                        } ?>

                                        <?php
                                        if ($item['author']) {
                                            echo '<div class="quotes-slider-item__author">' . $item['author'] . '</div>';
                                        } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            if(!empty($image)):
                echo '<div class="quotes-slider-image">';
                    echo wp_get_attachment_image($image, 'image-358-471');
                echo '</div>';
            endif; ?>

        <?php endif; ?>

        <?php
        if (!empty($button_text)):
            $icon = get_template_directory() . '/src/images/arrow-bottom-green.svg';
            $icon = file_exists($icon) ? file_get_contents($icon) : '';

            echo '<div class="quotes-button">';
                echo '<a href="#">' . $button_text . '<span>' . $icon . '</span></a>';
            echo '</div>';
        endif;
        ?>
    </div>
</section>
