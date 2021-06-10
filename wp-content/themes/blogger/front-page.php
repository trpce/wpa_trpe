<?php
/**
 * Default Front-Page Template
 *
 *
 * @package blogger
 */
?>

<?php get_header(); ?>

<?php 
        $categories =  get_terms(array('taxonomy' => 'category'));
      

        //  foreach ($categories as $cat)
        //  {
        //     echo '<pre>';
        //     print_r($cat);
        //     echo '</pre>';
        // }
        // $funk_category_args = array(
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => '-1',
        //     'cat' => 8
        // ); 

        // $hiphop_category_args = array(
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => '-1',
        //     'tax_query' => array(
        //         array(
        //         'taxonomy' => 'category',
        //         'field' => 'slug',
        //         'terms' =>  'hiphop' 
        //         )
        //     )
        // ); 

        // $jazz_category_args = array(
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => '-1',
        //     'tax_query' => array(
        //         array(
        //         'taxonomy' => 'category',
        //         'field' => 'slug',
        //         'terms' =>  'jazz' 
        //         )
        //     )
        // );

        // $metal_category_args = array(
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => '-1',
        //     'tax_query' => array(
        //         array(
        //         'taxonomy' => 'category',
        //         'field' => 'slug',
        //         'terms' =>  'metal' 
        //         )
        //     )
        // ); 

        // $turbofolk_category_args = array(
        //     'post_type' => 'post',
        //     'post_status' => 'publish',
        //     'posts_per_page' => '-1',
        //     'tax_query' => array(
        //         array(
        //         'taxonomy' => 'category',
        //         'field' => 'slug',
        //         'terms' =>  'turbofolk' 
        //         )
        //     )
        // ); 
        
?>

<div class="row tm-row">
                    <div class="col-12">
                        <?php get_search_form() ?>
                    </div>
</div>


<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">New Posts:</h1>

<?php

        $category_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page'=>5,
            'order'=>'DESC'
        ); 
        $head = true;
        $posts = new WP_Query($category_args);
        if ( $posts ->have_posts() )
            while($posts ->have_posts()){
                $posts->the_post();
                if($head){
                    $head=false;
                    get_template_part('/template-parts/head-post'); 
                }
                else
                    get_template_part('/template-parts/post'); 
            }
?>

</div>

<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Popular :</h1>
<?php

        $category_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page'=>4,
            'order'=>'DESC',
            'tag'=> 'popular',
        ); 
        $posts = new WP_Query($category_args);
        if ( $posts ->have_posts() )
            while($posts ->have_posts()){
                $posts->the_post();
                get_template_part('/template-parts/post'); 
            }
?>

</div>

<?php foreach ($categories as $cat) {?>
<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Category <?php echo $cat->name ?> : </h1>
    <?php

        $category_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => '-1',
            'cat' => $cat->term_id
        ); 

       $posts = new WP_Query($category_args);
        if ( $posts ->have_posts() )
            while($posts ->have_posts()){
                $posts->the_post();
                get_template_part('/template-parts/post'); 
            }
    ?>
</div>
<?php }?>
<!-- 
<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Category Hip Hop : </h1>
    <?php 
    //     $posts = new WP_Query($hiphop_category_args);
    //    // var_dump($post);
    //     if ( $posts ->have_posts() )
    //         while($posts ->have_posts()){
    //             $posts->the_post();
    //             get_template_part('/template-parts/post'); 
    //         }
    ?>
</div>

<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Category Jazz : </h1>
    <?php  
    //     $posts = new WP_Query($jazz_category_args);
    //    // var_dump($post);
    //     if ( $posts ->have_posts() )
    //         while($posts ->have_posts()){
    //             $posts->the_post();
                
    //             get_template_part('/template-parts/post'); 
    //         }
    ?>
</div>

<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Category Metal : </h1>
    <?php 
        
    //     $posts = new WP_Query($metal_category_args);
    //    // var_dump($post);
    //     if ( $posts ->have_posts() )
    //         while($posts ->have_posts()){
    //             $posts->the_post();
    //             get_template_part('/template-parts/post'); 
    //         }
    ?>
</div>

<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper">Category Turbo Folk : </h1>
    <?php 
    //     $posts = new WP_Query($turbofolk_category_args);
    //    // var_dump($post);
    //     if ( $posts ->have_posts() )
    //         while($posts ->have_posts()){
    //             $posts->the_post();
    //             get_template_part('/template-parts/post'); 
    //         }
    ?>
</div> -->

<?php get_footer(); ?>