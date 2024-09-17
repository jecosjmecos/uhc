<?php
$title = get_sub_field('title');
$undertitle = get_sub_field('undertitle');
?>

<section class="page-head">
    <div class="container">
        <?php echo '<h1>' . (!empty($title) ? $title : get_the_title()) . '</h1>' ?>

        <?php if(!empty($undertitle)) echo '<div class="page-head__excerpt">' . $undertitle . '</div>'  ?>
    </div>
</section>