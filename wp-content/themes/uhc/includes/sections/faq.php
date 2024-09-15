<?php
$text = get_sub_field('text');
$faq = get_sub_field('faq');
$faq_icon = get_template_directory() . '/src/images/faq-arrow.svg';
$faq_icon = file_exists($faq_icon) ? '<span>' . file_get_contents($faq_icon) . '</span>' : '';

if (empty($text) && empty($faq)) return;
?>

<section class="faq-section">
    <div class="container">

        <?php if (!empty($text)) echo '<div class="faq-text">' . $text . '</div>'; ?>

        <?php if (!empty($faq)): ?>
            <div class="faq">
                <?php foreach ($faq as $faq_item): ?>
                    <div class="faq-item">
                        <a class="faq-item__head" href="#">
                            <span><?php echo $faq_item['question']  ?></span>
                            <span><?php echo $faq_icon ?></span>
                        </a>

                        <div class="faq-item__body">
                            <div class="faq-item__body-inner">
                                <?php echo $faq_item['answer']  ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </div>
</section>
