<?php

function get_theme_link($btnArr = false, $class = '')
{
    $title = !empty($btnArr['title']) ? $btnArr['title'] : '';
    $href = 'href="' . (!empty($btnArr['url']) ? $btnArr['url'] : '#') . '"';
    $target = !empty($btnArr['target']) ? 'target="' . $btnArr['target'] . '"' : '';
    $class = !empty($class) ? 'class="' . $class . '"' : '';

    if(str_contains($class, 'button') || str_contains($class, 'btn')){
        $icon = get_template_directory() . '/src/images/btn-arrow.svg';
        $title = '<span>' . $title . '</span>';
        $title .= file_exists($icon) ? '<span>' . file_get_contents($icon) . '</span>' : '';
    }

    return sprintf('<a %s %s %s>%s</a>', $class, $href, $target, $title);
}

function get_post_back_link($post_id)
{
    $link = get_post_type_archive_link('post');
    $icon = get_template_directory() . '/src/images/arrow.svg';
    $icon = file_exists($icon) ? '<span>' . file_get_contents($icon) . '</span>' : '';

    $categories = wp_get_post_categories($post_id);

    foreach ($categories as $cat_id) {
        $category = get_category($cat_id);

        if($category->slug == 'bez-kategoriyi') continue;
        if($category->category_parent !== 0) continue;

        $link = get_category_link($category->term_id);
    }

    echo '<a href="' . $link . '">' . $icon . __('Back', 'uhc') . '</a>';
}

function remove_archive_title_prefix($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
}

add_filter('get_the_archive_title', 'remove_archive_title_prefix');

function show_acf_google_map() {
    get_template_part('includes/parts/acf-google-map-header');
}

add_action('get_header', 'show_acf_google_map');

