<?php
$title = get_sub_field('title');
$ticker = get_sub_field('ticker');
?>

<section class="logos-ticker-section">

    <?php if (!empty($title)) echo '<div class="container"><h2>' . $title . '</h2></div>' ?>

    <?php if (!empty($ticker)): ?>
        <div class="swiper-container logos-ticker">
            <div class="swiper-wrapper logos-ticker__inner">
                <?php get_template_part('includes/parts/content', 'ticker', $ticker); ?>
            </div>
        </div>
    <?php endif; ?>

</section>
