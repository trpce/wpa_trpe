<?php get_header(); ?>
        <!-- Search form -->

        <div class="row tm-row">
                    <div class="col-12">
                        <?php get_search_form() ?>
                    </div>

    </div>

    <?php echo date("d/m/Y") ?>
    <hr class="tm-hr-primary">
    <h1 class="tm-pt-30 tm-color-primary tm-header-wrapper"><?php the_title(); ?></h1>
   
    <div class="row tm-row">
    
    <?php the_post_thumbnail(); ?>
        
            
            <div class="tm-pt-30 tm-mr-20 "> <?php the_content(); ?></div>
        
            <div class="d-flex justify-content-between tm-pt-45">
                <span class="tm-color-primary"><?php the_category(', '); ?></span>
                <span class="tm-color-primary"><?php the_time('F jS, y'); ?></span>
            </div>
       
    </div>
<?php get_footer(); ?>