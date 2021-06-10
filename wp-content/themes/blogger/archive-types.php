<?php
/**
 * Custom Types Template
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
        <?php   while(  have_posts() ) : the_post();  ?>
            <?php get_template_part('/template-parts/post'); ?>
        <?php endwhile; ?>
</div>
<?php get_footer(); ?>