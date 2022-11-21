<?php
/**
 * Plugin Name: Scorpion Power Plugin
 * Description: This form submits through an ajax call
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define('SPACE_IT_TEMPLATE_URL', plugin_dir_url( __FILE__ ));
define('SPACE_IT_TEMPLATE_PATH', plugin_dir_path( __FILE__ ));

//define('SPACE_IT_TELEGRAM_TOKEN', '5555627950:AAE0w2mEp2YKxMzhCHTFbqIKXcog51BlHG0'); //test
//define('SPACE_IT_TELEGRAM_CHAT_ID', '-894504516'); //test

define('SPACE_IT_TELEGRAM_TOKEN', '5786107234:AAGFrRn_5nIyB-fGDOUAQTHDx15X6hXpX-U'); //prod
define('SPACE_IT_TELEGRAM_CHAT_ID', '-848817864'); //prod

define("SPACE_IT_TELEGRAM_URL", "https://api.telegram.org/bot");

function sendApiRequest($method, $data){
    $url = SPACE_IT_TELEGRAM_URL . SPACE_IT_TELEGRAM_TOKEN . '/' . $method;
    $type = 'GET';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, $type);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    return curl_exec($ch);
}

function get_error_lang($lang_teg){
    return get_field($lang_teg, 'options-' . pll_current_language()) ?? $lang_teg;
}

include_once SPACE_IT_TEMPLATE_PATH . 'widgets/DefaultScorpionWidget.php';
include_once SPACE_IT_TEMPLATE_PATH . 'includes/acf-lang-text/init.php';

if(!function_exists('tf_acf_lang_get_field')){
    function tf_acf_lang_get_field($selector, $post_id = false, $format_value = true){
        $lang_text_array = get_field($selector, $post_id, $format_value);
        return $lang_text_array[pll_current_language()] ?? $lang_text_array;
    }
}
?>