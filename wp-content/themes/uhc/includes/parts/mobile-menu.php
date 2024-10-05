<?php
$social = get_field('social', 'option');
?>

<div class="mobile-menu-area">
    <div class="mobile-menu-area-head"></div>

    <div class="mobile-menu-area-body">
        <div class="container">
            <?php
            wp_nav_menu([
                'theme_location' => 'header_menu',
                'container' => false,
                'menu_class' => 'header-mobile-menu',
                'menu_id' => 'headerMobileMenu',
            ]);
            ?>

            <?php
            if(!empty($social)):
                echo '<ul class="mobile-menu-area-social">';

                foreach($social as $social_item):
                    $icon = wp_get_original_image_path($social_item['icon']);

                    if(file_exists($icon)){
                        $social_item['link']['title'] = '<span>' . file_get_contents($icon) . '</span>';
                    }

                    echo '<li>' . get_theme_link($social_item['link']) . '</li>';
                endforeach;

                echo '</ul>';
            endif;
            ?>

            <?php echo do_shortcode('[wpml_language_selector_widget]') ?>
        </div>
    </div>
</div>
