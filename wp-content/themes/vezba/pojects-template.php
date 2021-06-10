<?php
/**
 * Template Name: Pojects Template
 * 
 * 
 * @package blogger
 */
?>

<?php
    $types_args = array(
        'taxonomy' => 'types',
        'orderby' => 'name',
        'order'   => 'ASC'
        );
    $types = get_categories($types_args);
    foreach($types as $type) {
    
?>

<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper"> Types of Project: <?php echo $type->name ?> </h1>
<?php
    $args = array(
        'post_type' => 'projects', 
        'tax_query' => array(
            array(
                'taxonomy' => 'types', 
                'field'    => 'term_id',          
                'terms'    => $type->term_id,      
            ),
        ),
    );

    $posts = new WP_Query( $args );
?>
<?php while($posts->have_posts() ) : $posts->the_post(); ?>
    <br>
    <a href="<?php the_permalink();?>"><?php the_title();?></a>
    <p><?php the_excerpt();?></p>
    <br>
<?php endwhile ?>
<?php } ?>