<?php

/**
 * Single post content.
 *
 * @package WordPress
 * @subpackage UHC
 */

if( ! is_singular( 'post' ) ) return;

$post_id = get_the_ID();
$logo = get_field('logo_alt', 'option');
if(!empty($logo)){
    $logo = wp_get_original_image_path($logo);
    $logo = file_get_contents($logo);
}
$thumbnail = wp_get_attachment_image( get_post_thumbnail_id($post_id), 'image-400-400' );
$thumbnail_class = empty($thumbnail) ? 'single-post-head__thumbnail_empty' : '';
?>

<div class="single-post post-<?php echo esc_attr( $post_id ) ?>">

    <div class="single-post-head">
        <div class="container">
            <div class="single-post-head__back">
                <?php echo get_post_back_link($post_id) ?>
            </div>

            <div class="single-post-head__title">
                <h1>
                    <?php the_title() ?>
                </h1>
            </div>

            <div class="single-post-head__thumbnail <?php echo $thumbnail_class ?>">
                <?php echo '<span>' . (!empty($thumbnail) ? $thumbnail : $logo) . '</span>' ?>
            </div>
        </div>
    </div>

    <div class="single-post-body">
        <div class="container container_short">
            <?php if(get_the_content()) echo '<div class="single-post-body__inner">' . get_the_content() . '</div>'; ?>
        </div>
    </div>
</div><!-- .single-post -->

