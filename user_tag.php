<?php
/*
 * Plugin Name: User Tag
 * Plugin URI:
 * Description: assign different avatars to user based on their information on blogs
 * Author: Riley Liu
 * Version: 0.1
 * Author URI:
 */

add_action('admin_init', 'classification_init');

function classification_init(){
    wp_enqueue_style( 'user_tag', plugins_url( 'fishy.css', __FILE__ ) );
    wp_enqueue_script( 'user_tag', plugins_url( 'fishy.js', __FILE__ ), array( 'jquery' ) );
}

