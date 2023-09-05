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
            <!-- div class="case_study__nav">
                <?php
$prev_post = get_previous_post();
if($prev_post) {
    $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
    echo '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">previous</a>';
}

$next_post = get_next_post();

if ($prev_post && $next_post) {
    echo '<span>|</span>';
}

if($next_post) {
    $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
    echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">next</a>';
}
?>
            </div -->
        </div>

        <?=apply_filters('the_content', get_the_content())?>

    </div>
    <section class="line_block">
        <div class="line_block__line" data-aos="fade"></div>
        <div class="container-xl">
        <div class="case_study__footer-nav">
                <?php
if (get_field('theme',get_the_ID()) == 'Light') {
    echo '<a href="/health/case-studies/" class="text-red">back</a>';
}
else {
    echo '<a href="/case-studies/" class="text-red">back</a>';
}
$next_post = get_next_post();

if($next_post) {
    $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
    echo '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="text-white">next</a>';
}
?>
            </div>
        </div>
    </section>
</main>
<?php

get_footer();
?>