<?php
$faq = get_sub_field('faq');
$faq_icon = get_template_directory() . '/src/images/faq-arrow.svg';
$faq_icon = file_exists($faq_icon) ? '<span>' . file_get_contents($faq_icon) . '</span>' : '';

if(empty($faq)) return;
?>

<section class="faq-v2">
    <div class="container">
        <div class="faq">
            <?php
            $i = 1;
            foreach ($faq as $faq_item):
                $number = $i < 10 ? '0' . $i : $i;
                ?>
                <div class="faq-item">
                    <a class="faq-item__head" href="#">
                        <span class="number"><?php echo $number ?></span>
                        <span class="text"><?php echo $faq_item['question']  ?></span>
                        <span class="arrow"><?php echo $faq_icon ?></span>
                    </a>

                    <div class="faq-item__body">
                        <div class="faq-item__body-inner faq-item__body-inner_short">
                            <?php
                            switch ($faq_item['answer']['template'] ){
                                case 'Text':
                                    echo $faq_item['answer']['content'];
                                    break;
                                case 'Team':
                                    get_template_part(
                                        'includes/parts/content',
                                        'team',
                                        $faq_item['answer']['team']
                                    );
                                    break;
                                case 'Text (two column)':
                                    get_template_part(
                                        'includes/parts/content-two-column',
                                        null,
                                        $faq_item['answer']['text_two_column']
                                    );
                                    break;
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            $i++;
            endforeach; ?>
        </div>
    </div>
</section>
