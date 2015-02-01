<?php
/*
 * Plugin Name: User Tag
 * Plugin URI:
 * Description: assign different avatars to user based on their information on blogs
 * Author: Riley Liu
 * Version: 0.1
 * Author URI:
 */

add_action( 'init', 'user_tag_init' );
function user_tag_init() {
    wp_enqueue_script("jquery");
    wp_enqueue_style( 'fishy', plugins_url( 'user_tag.css', __FILE__ ) );
    wp_enqueue_script( 'userTag', plugins_url( 'user_tag.js', __FILE__ ), array( 'jquery' ) );
}

