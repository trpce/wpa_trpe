<?php

    if (!defined('WP_UNINSTALL_PLUGIN')){
        die();
    }
    $username = 'pero_user';
    $user = get_user_by('login', $username);
    
    wp_delete_user($user->ID);
?>