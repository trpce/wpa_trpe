<?php
/**
 * Blogger: Customizer
 *
 * @package blogger
 */


 
function blogger_customizer_settings($wp_customize){
    $wp_customize ->add_section('blogger_section', array(
        'title' => 'Edit Footer Title'
    ));
    $wp_customize->add_setting('blogger_setting',array(
        'default' => 'Copyright 2020 Xtra Blog Company Co. Ltd.'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'blogger_control',array(
        'label'=> 'Title Text',
        'section' => 'blogger_section',
        'settings'=> 'blogger_setting'
    )));




    $wp_customize->add_setting('color_setting', array(
        'default' => '#999'
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'color_setting',
            array(
                'label' => 'Footer color',
                'section' => 'blogger_section',
                'settings' => 'color_setting'
            )
        ));


}
add_action('customize_register','blogger_customizer_settings');
?>