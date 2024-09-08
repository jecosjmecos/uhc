<?php
$title = get_sub_field('title');
$team = get_sub_field('team');
$button = get_sub_field('button');

if (empty($title) && empty($team) && empty($button)) return;
?>

<section class="team">
    <div class="container">
        <?php if (!empty($title)) echo '<h2>' . $title . '</h2>' ?>

        <?php if (!empty($team)): ?>
            <div class="team-wrapper">

                <?php foreach ($team as $item):
                    $item_id = $item->ID;
                    $facebook = get_field('facebook', $item_id);
                    $thumbnail = get_the_post_thumbnail($item_id, 'image-300-360');
                    ?>
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
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif ?>

        <?php
        if (!empty($button)) {
            echo '<div class="team-button">' . get_theme_link($button, 'button') . '</div>';
        } ?>
    </div>
</section>
