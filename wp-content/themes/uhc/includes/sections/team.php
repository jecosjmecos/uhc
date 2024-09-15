<?php
$title = get_sub_field('title');
$team = get_sub_field('team');
$button = get_sub_field('button');

if (empty($title) && empty($team) && empty($button)) return;
?>

<section class="team">
    <div class="container">
        <?php if (!empty($title)) echo '<h2>' . $title . '</h2>' ?>

        <?php if (!empty($team)) get_template_part('includes/parts/content','team', $team);?>

        <?php
        if (!empty($button)) {
            echo '<div class="team-button">' . get_theme_link($button, 'button') . '</div>';
        } ?>
    </div>
</section>
