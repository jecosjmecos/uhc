<?php
$ticker = $args;

if(empty($ticker)) return;

$ticker_count = count($ticker);

$i = 1;
$n = 0;
foreach ($ticker as $ticker_item):
    if ($i === 1){
        echo '<div class="logos-ticker__block swiper-slide">';
    }

    echo '<div class="logos-ticker__item">';
        echo '<span>' . wp_get_attachment_image($ticker_item['logo'], 'full') . '</span>';
    echo '</div>';

    if ($i === 2 || $n === $ticker_count) {
        echo '</div>';
        $i = 0;
    }

    $i++;
    $n++;
endforeach; ?>