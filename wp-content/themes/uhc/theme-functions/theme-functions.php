<?php

function get_theme_link($btnArr = false, $class = '')
{
    $title = !empty($btnArr['title']) ? $btnArr['title'] : '';
    $href = 'href="' . $btnArr['url'] . '"';
    $target = !empty($btnArr['target']) ? 'target="' . $btnArr['target'] . '"' : '';
    $class = !empty($class) ? 'class="' . $class . '"' : '';

    return sprintf('<a %s %s %s>%s</a>', $class, $href, $target, $title);
}

