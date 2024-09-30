<?php
$text = get_sub_field('text');
$social_links_label = get_sub_field('social_links_label');
$address_map = get_field('address_map', 'option');
$address_text = get_field('address_text', 'option');
$email = get_field('e-mail', 'option');
$social = get_field('social', 'option');
?>

<section class="contacts">
    <div class="container">
        <div class="contacts-address">
            <?php
            if(!empty($address_map)): ?>
                <div class="acf-map" data-zoom="16">
                    <div class="marker"
                         data-lat="<?php echo esc_attr($address_map['lat']); ?>"
                         data-lng="<?php echo esc_attr($address_map['lng']); ?>">
                    </div>
                </div>
            <?php endif; ?>

            <?php if($address_text['label']) echo '<div class="contacts-address__label">' . $address_text['label'] . '</div>'; ?>

            <?php if($address_text['text']) echo '<div class="contacts-address__text">' . $address_text['text'] . '</div>'; ?>
        </div>

        <div class="contacts-content">
            <?php echo $text ?>
        </div>
        
        <div class="contacts-social">
            <?php
            if(!empty($social_links_label)){
                echo '<div class="contacts-social__title"><span>' . $social_links_label . '</span></div>';
            }
            ?>

            <?php
            if(!empty($email)):
                $icon = get_template_directory() . '/src/images/email2.svg';
                $icon = file_exists($icon) ? '<span>' . file_get_contents($icon) . '</span>' : '';

                echo get_theme_link(
                        [
                            'url' => 'mailto:' . $email,
                            'title' => $icon . '<span>' . $email . '</span>',
                            'target' => '_blank',
                        ],
                        'contacts-social__link',
                );
            endif;
            ?>

            <?php
            if(!empty($social)):
                foreach($social as $item):
                    $icon = !empty($item['icon']) ? wp_get_original_image_path($item['icon']) : '';
                    $icon = file_exists($icon) ? '<span>' . file_get_contents($icon) . '</span>' : '';
                    $text = !empty($item['link']['title']) ? $item['link']['title'] : '';
                    $item['link']['title'] = $icon . '<span>' . $text . '</span>';

                    echo get_theme_link(
                        $item['link'],
                        'contacts-social__link',
                    );
                endforeach;
            endif; ?>
        </div>
    </div>
</section>
