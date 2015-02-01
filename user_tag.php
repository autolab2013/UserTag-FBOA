<?php
/*
 * Plugin Name: User Tag
 * Plugin URI: https://github.com/autolab2013/UserTag-FBOA
 * Description: assign different avatars to user based on their information on blogs
 * Author: Riley Liu
 * Version: 0.1
 * Author URI: http://autolab2013.github.io/
 */


add_action( 'init', 'user_tag_init' );

function user_tag_init() {
    wp_enqueue_script("jquery");
    wp_enqueue_style( 'userTag', plugins_url( 'user_tag.css', __FILE__ ) );
    wp_enqueue_script( 'userTag', plugins_url( 'user_tag.js', __FILE__ ), array( 'jquery' ) );
    wp_localize_script('userTag', "userTagData", array(
        "pluginPath" => plugin_dir_url(__FILE__)
    ));
    require_once 'alchemyapi.php';
    $alchemyapi = new AlchemyAPI();
    $myText = "I can't wait to integrate AlchemyAPI's awesome PHP SDK into my app!";
    $response = $alchemyapi->sentiment("text", $myText, null);
    echo "Sentiment: ", $response["docSentiment"]["type"], PHP_EOL;
}

