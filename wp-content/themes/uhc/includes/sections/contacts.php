<?php
$text = get_sub_field('text');
$social_links_label = get_sub_field('social_links_label');
$address_map = get_field('address_map', 'option');
$address_text = get_field('address_text', 'option');
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
    </div>
</section>
