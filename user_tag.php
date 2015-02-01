<?php
/*
 * Plugin Name: User Tag
 * Plugin URI: https://github.com/autolab2013/UserTag-FBOA
 * Description: assign different avatars to user based on their information on blogs
 * Author: Riley Liu
 * Version: 0.1
 * Author URI: http://autolab2013.github.io/
 */

add_action('admin_init', 'classification_init');

function classification_init(){
    wp_enqueue_style( 'user_tag', plugins_url( 'user_tag.css', __FILE__ ) );
    wp_enqueue_script( 'user_tag', plugins_url( 'user_tag.js', __FILE__ ), array( 'jquery' ) );
}

