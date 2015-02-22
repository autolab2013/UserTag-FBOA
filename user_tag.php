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
//add_action( 'init', 'analyze' );
add_action('comment_post',  'analyze');



function user_tag_init() {
    wp_enqueue_script("jquery");
    wp_enqueue_script("node");
    wp_enqueue_style( 'userTag', plugins_url( 'user_tag.css', __FILE__ ) );
    wp_enqueue_script( 'userTag', plugins_url( 'user_tag.js', __FILE__ ), array( 'jquery' ) );
    wp_localize_script('userTag', "userTagData", array(
        "pluginPath" => plugin_dir_url(__FILE__)
    ));

    $comment_list = get_comments();
//    $list = array();
//    $key_name = "Sentimental";
    $score = array();
    foreach ($comment_list as $comm) {
        $uid = $comm->user_id;
        if (count(get_user_meta($uid, 'score')) != 0) {//user_meta non-empty
            array_push($score, $user_score = get_metadata('user', $uid, 'score', false)[0]);
        }else
            array_push($score, 0);
    }
    echo "<meta id='user_comment_data' user_score= ".implode(';', $score).">";
//        if(!array_key_exists($uid, $list))
//            $user_list = array($uid => array());
//        else
//            $user_list = $list[$uid];
//        $user_info = get_comment_meta($comm->comment_ID);
//        if (array_key_exists($key_name, $user_info)) {
//            array_push($user_list, $user_info[$key_name][0]);
//        } else
//            array_push($user_list, 0);
//        array_push($list, $user_list);



//    exit();
}

function analyze($commentId) {
    $commentData = get_comment($commentId);
    /*echo $commentData->comment_content;
    //var_dump($commentData);
    exit();*/
    require_once 'alchemyapi.php';
    $key = file_get_contents(dirname(__FILE__) . '/api_key.txt');
    $alchemyapi = new AlchemyAPI( $key );
    //echo plugin_dir_url(__FILE__);
    //$myText = "I can't wait to integrate AlchemyAPI's awesome PHP SDK into my app!";
    $myText = $commentData->comment_content;
    $userId = $commentData->user_id;
    $response = $alchemyapi->sentiment("text", $myText, null);
    echo "Sentiment: ", $response["docSentiment"]["type"], PHP_EOL;
    if(!empty($response["docSentiment"]["score"])) {
        echo "Score: ", $response["docSentiment"]["score"], PHP_EOL;
        //echo $commentId;
        //add_user_meta( $userId, 'comment_score', $response["docSentiment"]["score"], true);
        //if ()
        $prevScore = 0;
        if (count(get_user_meta($userId, 'score')) != 0) {
            $prevScore = get_metadata('user', $userId,'score', false)[0];
        }

        update_metadata('user', $userId, 'score', $prevScore + $response["docSentiment"]["score"], '' );
        $user_score = get_metadata('user', $userId,'score', false)[0];
        echo $user_score;
    }
//    exit();
}



