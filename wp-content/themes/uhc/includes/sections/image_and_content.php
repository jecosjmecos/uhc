<?php
$logo = get_field('logo_alt', 'option');
if (!empty($logo)) {
    $logo = wp_get_original_image_path($logo);
    $logo = file_get_contents($logo);
}

$text = get_sub_field('text');
$thumbnail = get_sub_field('image');
$thumbnail = !empty($thumbnail) ? wp_get_attachment_image($thumbnail, 'image-400-400') : '';
$thumbnail_class = empty($thumbnail) ? 'single-post-head__thumbnail_empty' : '';

$image_position = get_sub_field('image_position');
$section_class = '';
if (!empty($image_position) && $image_position == 'left') $section_class = 'single-post-head_reverse';

$back_link = get_sub_field('back_link');
$icon = get_template_directory() . '/src/images/arrow.svg';
$icon = file_exists($icon) ? '<span>' . file_get_contents($icon) . '</span>' : '';
if (!empty($back_link['title'])) $back_link['title'] = $icon . $back_link['title'];
?>

<div class="single-post-head single-post-head_flexible-template <?php echo $section_class ?>">
    <div class="container">
        <div class="single-post-head__back">
            <?php echo get_theme_link($back_link) ?>
        </div>

        <div class="single-post-head__text">
            <div class="single-post-head__text-inner">
                <?php echo $text; ?>
            </div>
        </div>

        <div class="single-post-head__thumbnail <?php echo $thumbnail_class ?>">
            <?php echo (!empty($thumbnail) ? $thumbnail : $logo) ?>
        </div>
    </div>
</div>