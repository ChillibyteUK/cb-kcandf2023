<?php
$id = get_field('vimeo_id');
?>
<section class="video_block mb-4">
    <div class="container-xl">
        <div class="ratio ratio-16x9">
            <iframe src="https://player.vimeo.com/video/<?=$id?>"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>