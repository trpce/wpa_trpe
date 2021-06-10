<?php
/**
 * Default Home Template
 *
 *
 * @package blogger
 */
?>

<?php get_header(); ?>



                <!-- Search form -->
                <div class="row tm-row">
                    <div class="col-12">
                        
                        <?php get_search_form() ?>
                    </div>
                </div>
                <div class="row tm-row">
                    <?php while( have_posts() ) : the_post(); ?>
                        <?php get_template_part('/template-parts/post'); ?>
                    <?php endwhile; ?>
                </div>
                <div class="row tm-row tm-mt-100 tm-mb-75">
                    <div class="tm-prev-next-wrapper">
                        <!-- <div class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20">Next / Prev</div>  -->
                        <div class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20"><?php next_posts_link( "Следна" ); ?> / <?php previous_posts_link( "Назад" ); ?></div>
                    </div>
                    <div class="tm-paging-wrapper">
                        <span class="d-inline-block mr-3">Page</span>
                        <!-- <nav class="tm-paging-nav d-inline-block">
                            <ul>
                                <li class="tm-paging-item active">
                                    <a href="#" class="mb-2 tm-btn tm-paging-link">1</a>
                                </li>
                                <li class="tm-paging-item">
                                    <a href="#" class="mb-2 tm-btn tm-paging-link">2</a>
                                </li>
                                <li class="tm-paging-item">
                                    <a href="#" class="mb-2 tm-btn tm-paging-link">3</a>
                                </li>
                                <li class="tm-paging-item">
                                    <a href="#" class="mb-2 tm-btn tm-paging-link">4</a>
                                </li>
                            </ul>
                        </nav> -->
                        <br>    
                        <?php echo paginate_links(array (
                            'prev_text' =>  ( 'Назад' ),
                            'next_text' =>  ( 'Следно' )
                        )); ?>
                    </div>               
                </div> 
                <div class="row tm-row">

                </div>
<?php get_footer(); ?>