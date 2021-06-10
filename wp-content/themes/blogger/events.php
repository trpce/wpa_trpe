<?php
/**
 * Template Name: Events Template
 * 
 */
?>
<?php get_header(); ?>
<div class="row tm-row">
    <div class="col-12">
        <?php get_search_form() ?>
    </div>
</div>
<br>
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
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper"> Types <?php echo $type->name ?> </h1>
<?php
    $args = array(
        'post_type' => 'new_awesome_events', 
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
        <?php   while(  $posts -> have_posts() ) : $posts->the_post();  ?>
            <?php get_template_part('/template-parts/post'); ?>
        <?php endwhile; ?>
</div>
<?php } ?>


<?php
    $moods_args = array(
        'taxonomy' => 'mood',
        'orderby' => 'name',
        'order'   => 'ASC'
        );
    $moods = get_categories($moods_args);
    foreach($moods as $mood) {
    
?>

<div class="row tm-row">
<h1 class="tm-pt-30 tm-color-primary tm-header-wrapper"> Types <?php echo $mood->name ?> </h1>
<?php
    $args = array(
        'post_type' => 'new_awesome_events', 
        'tax_query' => array(
            array(
                'taxonomy' => 'mood', 
                'field'    => 'term_id',          
                'terms'    => $mood->term_id,      
            ),
        ),
    );

    $posts = new WP_Query( $args );
?>
        <?php   while(  $posts -> have_posts() ) : $posts->the_post();  ?>
            <?php get_template_part('/template-parts/post'); ?>
        <?php endwhile; ?>
</div>
<?php } ?>
<?php get_footer(); ?>