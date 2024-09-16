<?php

/**
 * Page default template.
 *
 * @package WordPress
 * @subpackage UHC
 */
global $wp_query;
$description = get_the_archive_description();

get_header();
?>

    <main class="main">
        <div class="archive-wrapper">
            <div class="archive-head">
                <div class="container">
                    <h1><?php echo get_the_archive_title() ?></h1>

                    <?php if (!empty($description)) echo '<div class="archive-head__descr">' . $description . '</div>' ?>
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

