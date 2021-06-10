<?php
/**
 * Default Search Template
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
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Search results for "<?php echo get_search_query(); ?>" :</h1>
    <br>

    <div class="row tm-row">
        <?php while( have_posts() ) : the_post(); ?>
            <?php get_template_part('/template-parts/post'); ?>
        <?php endwhile; ?>
    </div>
    <div class="row tm-row tm-mt-100 tm-mb-75">
                  
                    <div class="tm-paging-wrapper">
                        <span class="d-inline-block mr-3">Page</span>
                        <br>    
                        <?php echo paginate_links(array (
                            'prev_text' =>  ( 'Prev' ),
                            'next_text' =>  ( 'Next' )
                        )); ?>
                    </div>               
                </div> 
<?php get_footer(); ?>