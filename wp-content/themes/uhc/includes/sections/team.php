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

                <?php foreach ($team as $item): ?>
                    <div class="team-item">
                        <div class="team-item__photo">
                            <?php
                            if (!empty($item['photo'])) {
                                echo wp_get_attachment_image($item['photo'], 'image-300-360');
                            } ?>

                            <?php if (!empty($item['description']) || !empty($item['facebook'])): ?>
                                <div class="team-item__content">
                                    <?php if(!empty($item['description'])) echo '<div>' . $item['description'] . '</div>'; ?>

                                    <?php
                                    if(!empty($item['facebook'])){

                                        $icon_src = get_template_directory() . '/src/images/white-facebook.svg';
                                        if(file_exists($icon_src)) $item['facebook']['title'] = file_get_contents($icon_src);

                                        echo '<div>' . get_theme_link($item['facebook']) . '</div>';
                                    }  ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($item['name'])) echo '<div class="team-item__name">' . $item['name'] . '</div>' ?>
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
