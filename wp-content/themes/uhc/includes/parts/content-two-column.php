<?php

if(empty($args)) return;
?>

<div class="two-columns">
    <?php if(!empty($args['text_one'])) echo '<div>' . $args['text_one'] . '</div>'; ?>

    <?php if(!empty($args['text_two'])) echo '<div>' . $args['text_two'] . '</div>'; ?>
</div>
