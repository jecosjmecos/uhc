<?php
$logo = get_field('logo_alt', 'option');
if(!empty($logo)){
    $logo = wp_get_original_image_path($logo);
    $logo = file_get_contents($logo);
}
$thumbnail = get_the_post_thumbnail(null,'image-240-240');
$thumbnail_class = empty($thumbnail) ? 'post-preview__thumbnail_empty' : '';
$original_language = get_field('original_language') ? get_field('original_language') : __('in ukrainian', 'uhc');
?>
<article class="post-preview">
    <a class="post-preview__thumbnail" href="<?php the_permalink(); ?>">
        <?php echo '<span>' . (!empty($thumbnail) ? $thumbnail : $logo) . '</span>' ?>
    </a>

    <a class="post-preview__title" href="<?php the_permalink(); ?>">
        <?php the_title() ?>
    </a>

    <div class="post-preview__original">
        <?php echo $original_language ?>
    </div>
</article>