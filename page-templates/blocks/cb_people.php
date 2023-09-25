<?php
$theme = get_field('theme', get_the_ID()) == 'Dark' ? 'Agency' : 'Pharma';
$class = $block['className'] ?? null;
?>
<section class="people <?=$class?>">
    <div class="container-xl">
        <div class="people__grid">
            <?php
            foreach (get_field('team') as $t) {
                ?>
            <div class="people__card" data-aos="fade">
                <img class="people__image"
                    src="<?=wp_get_attachment_image_url(get_field('headshot', $t), 'large')?>">
                <div class="people__name"><?=get_the_title($t)?>
                </div>
                <div class="people__role">
                    <?php
                    $role = get_field('role', $t);

                if ($theme == 'Pharma') {
                    if (get_field('pharma_role', $t) != '') {
                        $role = get_field('pharma_role', $t);
                    }
                }
                echo $role;
                ?>
                </div>
                <div class="people__bio">
                    <?=get_field('bio', $t)?>
                </div>
                <?php
                if (get_field('linkedin_url', $t)) {
                    ?>
                <div class="people__linkedin">
                    <a href="<?=get_field('linkedin_url')?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                    <?php
                }
                ?>
            </div>
            <?php
            }
?>
        </div>
</section>