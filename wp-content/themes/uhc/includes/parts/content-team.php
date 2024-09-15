<?php
if(empty($args)) return;
$team = $args;
?>

<div class="team-wrapper">

    <?php
    foreach ($team as $item):
        $item_id = $item->ID;
        $facebook = get_field('facebook', $item_id);
        $position = get_field('position', $item_id);
        $thumbnail = get_the_post_thumbnail($item_id, 'image-300-360'); ?>
        <div class="team-item">
            <div class="team-item__photo">
                <?php if (!empty($thumbnail)) echo $thumbnail; ?>

                <?php if (!empty($item->post_content) || !empty($facebook)): ?>
                    <div class="team-item__content">
                        <?php if(!empty($item->post_content)) echo '<div>' . $item->post_content . '</div>'; ?>

                        <?php
                        if(!empty($facebook)){

                            $icon_src = get_template_directory() . '/src/images/white-facebook.svg';
                            if(file_exists($icon_src)) $facebook['title'] = file_get_contents($icon_src);

                            echo '<div>' . get_theme_link($facebook) . '</div>';
                        }  ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($item->post_title)) echo '<div class="team-item__name">' . $item->post_title . '</div>' ?>

            <?php if (!empty($position)) echo '<div class="team-item__position">' . $position . '</div>' ?>
        </div>
    <?php
    endforeach; ?>

</div>
