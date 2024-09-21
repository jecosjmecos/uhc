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
$title = get_field('title', $taxonomy_obj->taxonomy . '_' . $taxonomy_obj->term_id);
$links = get_field('links', $taxonomy_obj->taxonomy . '_' . $taxonomy_obj->term_id);

if(empty($title)) $title = $taxonomy_obj->name;

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

            <div class="archive-body">
                <div class="container">
                    <?php
                    if (have_posts()):
                        while(have_posts()):
                            the_post();
                            get_template_part('includes/parts/post', 'preview');
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

