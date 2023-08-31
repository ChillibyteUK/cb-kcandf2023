<?php
$theme = get_field('theme',get_the_ID()) == 'Dark' ? 'wo' : 'dark';
$background = get_field('background');
$orientation = get_field('orientation');
$fade = $orientation == 'left' ? 'fade-right' : 'fade-left';
$text = $orientation == 'left' ? 'text-end' : 'text-start';
$line = $orientation == 'left' ? 'right' : 'left';
$lineColour = $theme == 'Dark' ? '#de1b3c' : '#22806c';
?>
<section class="section_hero">
    <div class="container-xl">
        <div class="section_hero__images">
            <div class="section_hero__background <?=$orientation?>" data-aos="fade-<?=$orientation?>" style="background-image:url('<?=get_stylesheet_directory_uri()?>/img/bg-<?=$background?>--<?=$theme?>.svg')"></div>
            <img src="<?=wp_get_attachment_image_url(get_field('image'),'large')?>" class="section_hero__image <?=$orientation?>" data-aos="<?=$fade?>" data-aos-offset="300">
        </div>
        <div class="section_hero__content sticky-top <?=$orientation?>">
            <div class="line <?=$line?>" data-aos="fade"></div>
            <div class="section_hero__number <?=$text?>" data-aos="fade"><?=sprintf('%02d',get_field('section_number'))?></div>
            <h2 class="section_hero__title <?=$text?>" data-aos="fade"><?=get_field('title')?></h2>
        </div>
    </div>
</section>