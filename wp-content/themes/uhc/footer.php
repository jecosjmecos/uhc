<?php
$email = get_field('e-mail', 'option');
$address = get_field('address', 'option');
$social = get_field('social', 'option');
$subscribe = get_field('subscribe', 'option');

$logo = get_field('logo_alt', 'option');
if(!empty($logo)) $logo = wp_get_original_image_path($logo);

$footer_info_template = '<span><img src="' . get_template_directory_uri() . '/src/images/%s.svg" alt="%s"></span><span>%s</span>';
?>

<footer class="footer">
    <div class="container">
        <div class="col">
            <?php
            if (file_exists($logo)):
                $logo_link_arg = [
                    'title' => file_get_contents($logo),
                    'url' => get_home_url(),
                ];

                echo get_theme_link($logo_link_arg, 'footer-logo');
            endif;
            ?>

            <div class="footer-info-wrapper">

                <?php
                if (!empty($address)):
                    echo '<div class="footer-info">';
                        echo sprintf($footer_info_template, 'marker', 'marker', $address);
                    echo '</div>';
                endif;

                if (!empty($email)):
                    $email = '<a href="mailto:' . $email . '">' . $email . '</a>';

                    echo '<div class="footer-info">';
                        echo sprintf($footer_info_template, 'email', 'email', $email );
                    echo '</div>';
                endif;

                if(!empty($social)):
                    echo '<ul class="footer-social">';

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

            </div>
        </div>

        <div class="col">
            <?php
            wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'menu_class' => 'footer-menu',
                    'container' => false,
            ]);

            if(!empty($subscribe['text']) || !empty($subscribe['button'])):
                $icon_src = get_template_directory_uri() . '/src/images/arrow.svg';
                $subscribe['button']['title'] = '<span>' . $subscribe['button']['title'] . '</span>';
                $subscribe['button']['title'] .= '<span><img src="' . $icon_src . '" alt="' . $subscribe['button']['title'] . '</span>" />';

                echo '<div class="footer-subscribe">';
                    echo '<div class="footer-subscribe__text">' . $subscribe['text'] . '</div>';
                    echo '<div class="footer-subscribe__link">' . get_theme_link($subscribe['button']) . '</div>';
                echo '</div>';
            endif;
            ?>
        </div>
    </div>
</footer>

<?php wp_footer() ?>
</div><!-- .wrapper -->
</body>
</html>

