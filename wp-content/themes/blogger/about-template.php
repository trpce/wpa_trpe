<?php
/**
 * Template Name: About Template
 * 
 * 
 * @package blogger
 */
?>

<?php
    
    $current = wp_get_current_user();

    $posts = new WP_Query(array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'author' => $current->ID
    ));
  // print_r($current);
   while( $posts->have_posts() ){
       $posts -> the_post();

      echo '<p>'. the_title().'</p>';
       
   }
   wp_reset_postdata();

   echo '<br>';
   $new_posts = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'tag'=> 'novo',
        'tax_query' => array(
            array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' =>  'turbofolk',
            'operator' => 'NOT IN'
            )
            ),
        'date_query' => array(
            array(
                'year' => 2021, 
                'month' => 4,
                'day' => 9
        ))
   ));

   while( $new_posts->have_posts() ){
    $new_posts -> the_post();
  
    echo '<br>';
    echo the_title();
    echo '<br>';
    echo the_excerpt();
    echo '<br>';
    echo the_author(); 
    echo '<br>';
    echo the_category(', ');
    echo '<br>';
    echo '<hr>';
    echo '<br>';

}

?> 