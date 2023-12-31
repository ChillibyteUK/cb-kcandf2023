<?php
$theme = get_field('site');
?>
<div class="container-xl">
<div class="filters d-flex justify-content-evenly my-4" id="filters">
    <a id="filter-button-all" data-filter="*" class="pointer btn-filter active mb-2">All</a>
    <?php
    /*
    $terms = get_terms(array(
        'taxonomy' => 'process',
        'hide_empty' => true,
    ));
foreach ($terms as $t) {
    echo '<a data-filter=".' . $t->slug . '" class="btn btn-red mb-2">' . $t->name . '</a> ';
}
    */
?>
</div>
<div id="csgrid" class="row mx-0 mb-5">
    <?php
    $d = 0;
$q = new WP_Query(array(
    'post_type' => 'case-studies',
    'posts_per_page' => -1,
    'meta_key' => 'theme',
    'meta_value' => $theme
));
$allTerms = array();

while ($q->have_posts()) {
    $q->the_post();
    echo get_field('theme');
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if (!$img) {
        $img = get_stylesheet_directory_uri() . '/img/default.png';
    }

    $cats = get_the_terms(get_the_ID(), 'process');
    $category = wp_list_pluck($cats, 'name');
    $catclass = implode(' ', array_map('cbslugify', $category));
    $allTerms = array_merge($allTerms,$category);
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
<?php
$uTerms = json_encode(array_values(array_unique($allTerms)));

add_action('wp_footer', function () use ($uTerms) {
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    (function($) {

        function slugify(str) {
           return str.toLowerCase().replace(/\s+/g, '-');
        }

        /* Filter Buttons */
        const jsonArray = <?=$uTerms?>;

        var container = document.getElementById('filters');

        for (var i = 0; i < jsonArray.length; i++) {
            var name = jsonArray[i];
            var slug = slugify(name);

            // Create <a> element
            var aElement = document.createElement('a');
            aElement.setAttribute('data-filter', '.'+slug);
            aElement.setAttribute('id', 'filter-button-'+slug);
            aElement.className = 'pointer btn-filter mb-2';
            aElement.textContent = name;

            // Append the <a> element to the container
            container.appendChild(aElement);

            // Add a space for separation
            if (i < jsonArray.length - 1) {
                var space = document.createTextNode(' ');
                container.appendChild(space);
            }
        }

        /* The Grid */
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

        /* filter on load */
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Get the filter value from the URL parameter, e.g., ?filter=category1
        var filterValue = getUrlParameter('filter');

        // Apply the filter if filterValue is not empty
        if (filterValue !== '') {
            toggleCategory('off');
            $grid.isotope({ filter: '.' + filterValue });
            // Add 'active' class to the corresponding filter button
            $('.btn-filter').removeClass('active'); // Remove 'active' class from all buttons
            $('#filter-button-' + filterValue).addClass('active'); // Add 'active' class to the specific button
        }

    })(jQuery);
</script>
<?php
}, 9999);
