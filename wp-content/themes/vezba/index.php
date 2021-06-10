<?php
/**
 * Default Index Template
 *
 *
 * @package vezba
 *  */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vezba</title>
</head>
<body>
<h1>Projects :</h1>
<?php 
$posts = new WP_Query(array(
    'post_type' => 'projects',
    'post_status' => 'publish'
));
?>
<?php while($posts->have_posts() ) : $posts->the_post(); ?>
<br>
<a href="<?php the_permalink();?>"><?php the_title();?></a>
<p><?php the_excerpt();?></p>
<br>
<?php endwhile ?>
</body>
</html>