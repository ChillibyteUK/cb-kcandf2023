<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$theme = get_field('theme');
?>
<main id="main" class="<?=$theme?>">
    <?php
    the_post();    
    the_content(); 
    ?>
</main>
<?php
get_footer();