<?php
/**
 * Default Category Template
 * 
 * 
 * @package blogger
 */
?>
<?php get_header(); ?>
<?php  
    $category = get_category( get_query_var( 'cat' ) ); 
    $cat_name = get_cat_name( $category->cat_ID ); 
?>
                <div class="row tm-row">
                    <div class="col-12">
                        
                        <?php get_search_form() ?>
                    </div>
                </div>
                
            <div class="row tm-row">
            <h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Category <?php echo $cat_name; ?> :</h1>
                <?php if(have_posts()) : while( have_posts()) : the_post();  ?>
                <?php get_template_part('/template-parts/post');?>
                <?php endwhile; else : ?>
                <p>Nothing to display</p>
                <?php endif; ?>
            </div>
            <div class="row tm-row tm-mt-100 tm-mb-75">
                    <div class="tm-prev-next-wrapper">
                        <div class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20"><?php next_posts_link( "Следна" ); ?><?php previous_posts_link( "Назад" ); ?></div>
                    </div>
                    <div class="tm-paging-wrapper">
                        <span class="d-inline-block mr-3">Page</span>
                        <br>    
                        <?php echo paginate_links(array (
                            'prev_text' =>  ( 'Назад' ),
                            'next_text' =>  ( 'Следно' )
                        )); ?>
                    </div>               
                </div> 

<?php get_footer(); ?>