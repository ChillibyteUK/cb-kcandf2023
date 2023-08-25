<?php
/**
 * The template for displaying all single case studies
 *
 * @package cb-kcandf2023
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
the_post();

$terms = wp_get_post_terms(get_the_ID(), 'process');
$term = $terms[0]->name;
$style = $terms[0]->slug;

?>
<main class="case_study case_study--<?=$style?>">
    <div class="container-xl">
        <div class="case_study__hero">
            <h1 data-aos="fade">
                <span class="dot"><?=get_the_title()?></span>
            </h1>
            <div class="case_study__process" data-aos="fade">
                <?=$term?>
            </div>
        </div>

        <?=apply_filters('the_content', get_the_content())?>

    </div>
    <section class="line_block">
        <div class="line_block__line" data-aos="fade"></div>
        <div class="container-xl">
            <div class="h2 text-center dot" data-aos="fade">Our friends won't let you down</div>
        </div>
    </section>
</main>
<?php

get_footer();
?>