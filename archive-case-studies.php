<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$img = wp_get_attachment_image_url(get_field('case_studies_archive_hero', 'options'), 'full');
?>
<!-- hero -->
<main id="main" class="caseStudies">
    <div class="container-xl">
        <div class="case_study__hero">
            <h1 data-aos="fade" class="text-center dot">Our Case Studies</h1>
        </div>
        <div class="filters my-4">
            <a data-filter="*" class="pointer btn btn-red active mb-2">Show All</a>
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'process',
                'hide_empty' => true,
            ));
foreach ($terms as $t) {
    echo '<a data-filter=".' . $t->slug . '" class="btn btn-red mb-2">' . $t->name . ' <small>(' . $t->count . ')</small></a> ';
}
?>
        </div>
        <div id="csgrid" class="row mx-0">
            <?php
        $d = 0;
while (have_posts()) {
    the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if (!$img) {
        $img = get_stylesheet_directory_uri() . '/img/default.png';
    }

    $cats = get_the_terms(get_the_ID(), 'process');
    $category = wp_list_pluck($cats, 'name');
    $catclass = implode(' ', array_map('cbslugify', $category));

    ?>
            <div class="<?=$catclass?> caseStudy col-md-6 col-lg-4">
                <a class="caseStudy_card"
                    href="<?=get_the_permalink()?>">
                    <img class="caseStudy_card__image" src="<?=$img?>" alt="">
                    <div class="caseStudy_card__content">
                        <div class="article-title">
                            <?=get_the_title()?>
                        </div>
                        <div class="article-category">
                            <?=$cats[0]->name?>
                        </div>
                    </div>
                </a>
            </div>
            <?php
    $d += 50;
}
?>
        </div>
    </div>
</main>
<?php
add_action('wp_footer', function () {
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    (function($) {

        var $grid = $('#csgrid').isotope({
            itemSelector: '.caseStudy',
            percentPosition: true,
            layoutMode: 'fitRows',
        });

        $('.filters').on('click', 'a', function() {
            var filterValue = $(this).attr('data-filter');
            $('.filters').find('.active').removeClass('active');
            $(this).addClass('active');
            $grid.isotope({
                filter: filterValue
            });
            console.log(filterValue);
            if (filterValue != '*') {
                toggleCategory('off');
            }
            else {
                toggleCategory('on');
            }
        });

        function toggleCategory(state) {
            const elem = document.querySelectorAll(".article-category");
            elem.forEach((thing) => {
                if (state === 'off') {
                    console.log('x');
                    thing.classList.add('d-none');
                }
                else {
                    thing.classList.remove('d-none');
                }
            })
        }


    })(jQuery);
</script>
<?php
}, 9999);

get_footer();
?>