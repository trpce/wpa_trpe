<?php
/**
 * Default Search Form Template
 * 
 * 
 * @package blogger
 */
?>

<form method="GET" action="<?php echo esc_url(home_url('/')); ?>" class="form-inline tm-mb-80 tm-search-form">
    <input class="form-control tm-search-input" name="s" value="<?php echo get_search_query();?>" type="text" placeholder="Search..." aria-label="Search">
    <button class="tm-search-button" type="submit">
        <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
    </button>
</form>