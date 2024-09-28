<?php
$title = get_sub_field('title');
$columns = get_sub_field('columns');
$text = get_sub_field('text');
$section_class = '';

if($columns === '3') $section_class = 'text-columns_3';

if(empty($title) && empty($text)) return;
?>

<section class="text-columns <?php echo $section_class ?>">
    <div class="container">

        <?php if(!empty($title)) echo '<h2>' . $title . '</h2>'; ?>

        <?php
        if(!empty($text)):
            echo '<div class="text-columns-items">';

            foreach($text as $item){
                if(!empty($item['text_item'])) echo '<div class="text-columns-item">' . $item['text_item'] . '</div>';
            }

            echo '</div>';
        endif;
        ?>
    </div>
</section>
