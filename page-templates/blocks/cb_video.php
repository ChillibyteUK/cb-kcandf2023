<?php
$background = wp_get_attachment_image_url(get_field('alt_preview'), 'full');
?>
<section class="video_block mb-4">
    <div class="container-xl">
        <div class="youtube-player"
            data-id="<?=get_field('video_id')?>"
            data-thumb="<?=$background?>">
        </div>
    </div>
</section>