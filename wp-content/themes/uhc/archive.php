<?php

/**
 * Page default template.
 *
 * @package WordPress
 * @subpackage UHC
 */
global $wp_query, $wp;
$current_link = home_url( $wp->request );
$taxonomy_obj = get_queried_object();
$description = get_the_archive_description();
$taxonomy_id = $taxonomy_obj->taxonomy . '_' . $taxonomy_obj->term_id;
$title = get_field('title', $taxonomy_id) ? get_field('title', $taxonomy_id) : get_the_archive_title();
$links = get_field('links', $taxonomy_id);
$first_post_full_width = get_field('first_post_full_width', $taxonomy_id);

$posts_template = get_field('posts_template', $taxonomy_id);
if(empty($posts_template)) $posts_template = '4 columns';

$archive_body_class = !empty($posts_template) && $posts_template == '3 columns' ? 'archive-body_3-columns' : '';
$post_image_size = !empty($posts_template) && $posts_template == '3 columns' ? 'image-400-400' : false;

get_header();
?>

    <main class="main">
        <div class="archive-wrapper">
            <div class="archive-head">
                <div class="container">
                    <h1><?php echo $title ?></h1>

                    <?php if (!empty($description)) echo '<div class="archive-head-descr">' . $description . '</div>' ?>

                    <?php
                    if(!empty($links)):
                        echo '<div class="archive-head-links">';

                        foreach ($links as $link) {
                            $link_class = str_contains($current_link, $link['link']['url']) ? 'current' : '';

                            echo get_theme_link($link['link'], $link_class);
                        }

                        echo '</div>';
                    endif; ?>
                </div>
            </div>

            <div class="archive-body <?php echo $archive_body_class ?>">
                <div class="container">
                    <?php
                    if (have_posts()):
                        $i = 0;
                        while(have_posts()):
                            the_post();

                            if(!empty($first_post_full_width) && $i === 0){
                                get_template_part('includes/parts/post', 'preview_full');
                            }else{
                                get_template_part('includes/parts/post', 'preview', [
                                    'image_size' => 'full',
                                    'posts_template' => get_field('posts_template', $taxonomy_id),
                                ]);
                            }

                            $i++;
                        endwhile;
                    endif;

                    $big = 999999999;

                    $pagination = paginate_links(array(
                        'base'      => str_replace($big , '%#%', esc_url(get_pagenum_link($big ))),
                        'format'    => '?paged=%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $wp_query->max_num_pages,
                        'prev_text' => __('<'),
                        'next_text' => __('>'),
                    ));

                    if(!empty($pagination)) echo '<div class="pagination">' . $pagination . '</div>';
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();

