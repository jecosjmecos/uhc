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

