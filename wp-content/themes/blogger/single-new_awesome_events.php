<?php
/**
 * Default Single Party Template
 * 
 *
 * @package blogger
 */
?>
<?php get_header(); ?>
<div class="row tm-row">
    <div class="col-12">
        <?php get_search_form() ?>
    </div>
</div>
<div class="row tm-row">
<hr class="tm-hr-primary">
    <h1 class="tm-pt-30 tm-color-primary tm-header-wrapper"><?php the_title(); ?></h1>
   <div class="row tm-row">
        <?php the_post_thumbnail(); ?>

        <div class="tm-pt-30 tm-mr-20 ">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>