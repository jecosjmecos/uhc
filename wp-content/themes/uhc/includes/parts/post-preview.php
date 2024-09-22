<?php
$posts_template = !empty($args['posts_template']) ? $args['posts_template'] : '4 columns';
$post_image_size = !empty($args['post_image_size']) ? $args['post_image_size'] : 'image-240-240';
$logo = get_field('logo_alt', 'option');
if(!empty($logo)){
    $logo = wp_get_original_image_path($logo);
    $logo = file_get_contents($logo);
}
$thumbnail = get_the_post_thumbnail(null,$post_image_size);
$thumbnail_class = empty($thumbnail) ? 'post-preview__thumbnail_empty' : '';
$text_width_dot = get_field('text_width_dot');

$read_more_text = __('Читати більше', 'uhc');
$read_more_icon = get_template_directory() . '/src/images/btn-arrow.svg';
if(file_exists($read_more_icon)) $read_more_text .=  '<span class="icon">' . file_get_contents($read_more_icon) . '</span>';
?>
<article class="post-preview">
    <?php if(!empty($text_width_dot) && $posts_template == '3 columns'): ?>

        <div class="post-preview__original post-preview__original_top">
            <?php echo $text_width_dot ?>
        </div>

    <?php endif; ?>

    <a class="post-preview__thumbnail" href="<?php the_permalink(); ?>">
        <?php echo '<span>' . (!empty($thumbnail) ? $thumbnail : $logo) . '</span>' ?>
    </a>

    <a class="post-preview__title" href="<?php the_permalink(); ?>">
        <?php the_title() ?>
    </a>

    <?php if(get_the_excerpt() && $posts_template == '3 columns'): ?>

        <div class="post-preview__excerpt">
            <?php the_excerpt(); ?>
        </div>

    <?php endif; ?>

    <?php if(!empty($text_width_dot) && $posts_template != '3 columns'): ?>

        <div class="post-preview__original">
            <?php echo $text_width_dot ?>
        </div>

    <?php endif; ?>

    <a class="post-preview__read-more" href="<?php the_permalink(); ?>" >
        <span><?php echo $read_more_text ?></span>
    </a>
</article>