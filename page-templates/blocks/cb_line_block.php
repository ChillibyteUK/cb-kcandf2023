<?php
$theme = get_field('theme', get_the_ID()) == 'Dark' ? 'Agency' : 'Pharma';
$class = $block['className'] ?? null;
$class .= get_field('padding') ? 'line_block--padding' : '';
?>
<section class="line_block <?=$class?>">
    <div class="line_block__line" data-aos="fade"></div>
    <a id="form" class="anchor"></a>
    <div class="container-xl">
        <div class="h2 text-center dot mb-4" data-aos="fade">
            <?=get_field('content')?></div>
        <div class="form_block">
            <?=get_field('pre_form')?>
            <?php
            if (get_field('form_id')) {
                ?>
                <div class="my-4"><?=do_shortcode('[gravityform id="' . get_field('form_id') . '" title="false"]')?></div>
                <?php
            }
            ?>
            <?=get_field('post_form')?>
        </div>
    </div>
</section>