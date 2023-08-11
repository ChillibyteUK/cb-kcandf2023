<?php
$link = get_field('button') ?? null;
$clr = get_field('button_colour') ?? null;
$dot = get_field('has_dot')[0] ?? null && get_field('has_dot')[0] == 'Yes' ? 'dot' : null;
?>
<section class="hero">
    <div class="container-xl mb-5">
        <div class="layer-1">
            <h1 data-aos="fade">
                <span
                    class="<?=$dot?>"><?=get_field('title')?></span>
            </h1>
        </div>
        <?php
if ($link) {
    ?>
        <div class="layer-2">
            <div class="text-center">
                <a class="btn btn-<?=$clr?>"
                    href="<?=$link['url']?>">
                    <span
                        class="btn-text"><?=$link['title']?></span>
                    <span class="btn-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16">
                            <defs></defs>
                            <defs>
                                <path id="gkmzs"
                                    d="M13 9V7h3v2h-3zM7.03233022 1l1.43859292 1.43076034-4.58011387 4.55637467H10v2.02471813H3.89080927l4.58011387 4.55637466L7.03233022 15 0 8l.71777145-.71538017.71878813-.71639202L7.03233022 1z">
                                </path>
                            </defs>
                            <use fill="currentColor" fill-rule="evenodd" transform="matrix(-1 0 0 1 16 0)"
                                xlink:href="#gkmzs"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
        <?php
}
?>
    </div>
    <div class="text-center mb-5">
        <div onclick="scrollSmoothTo('content')">
            <svg id="mouse-icon" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 220.84 451.35">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #fff;
                        }

                        .cls-1,
                        .cls-2 {
                            stroke-width: 0px;
                        }
                    </style>
                </defs>
                <g id="mouse">
                    <path class="cls-1"
                        d="m110.42,0C49.53,0,0,41.65,0,92.85v177.29c0,47.71,43.01,87.11,98.13,92.26v-8.26c-50.58-5.04-89.92-40.78-89.92-84V92.85C8.21,46.18,54.06,8.21,110.42,8.21s102.2,37.97,102.2,84.64v177.29c0,45.53-43.64,82.76-98.09,84.55v-180.57h-8.22v261.5l-23.04-23.04-5.81,5.81,32.96,32.96,32.96-32.96-5.81-5.81-23.04,23.04v-72.73c58.98-1.83,106.31-42.72,106.31-92.76V92.85C220.84,41.65,171.3,0,110.42,0Z" />
                    <path class="cls-1"
                        d="m143.72,89.91c0-18.37-14.94-33.3-33.3-33.3s-33.3,14.94-33.3,33.3,14.94,33.3,33.3,33.3,33.3-14.94,33.3-33.3Zm-58.39,0c0-13.84,11.26-25.09,25.09-25.09s25.09,11.26,25.09,25.09-11.25,25.09-25.09,25.09-25.09-11.25-25.09-25.09Z" />
                </g>
                <g id="dot">
                    <path id="marker" class="cls-2"
                        d="m145.42,89.91c0,19.31-15.7,35-35.01,35s-34.99-15.69-34.99-35,15.7-35,34.99-35,35.01,15.7,35.01,35Z" />
                </g>
            </svg>
        </div>
    </div>
</section>
<a id="content" class="anchor"></a>
<?php
add_action('wp_footer', function () {
    ?>
<script>
    function scrollSmoothTo(elementId) {
        var element = document.getElementById(elementId);
        element.scrollIntoView({
            block: 'start',
            behavior: 'smooth'
        });
    }
</script>
<?php
});
?>