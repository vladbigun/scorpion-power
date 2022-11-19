<?php


define("SCORPION_TELEGRAM_URL", "https://api.telegram.org/bot");
define('SCORPION_TELEGRAM_TOKEN', '5555627950:AAE0w2mEp2YKxMzhCHTFbqIKXcog51BlHG0');
define('SCORPION_TELEGRAM_CHAT_ID', '-894504516');

function sendApiRequestTG($method, $data){
    $url = SCORPION_TELEGRAM_URL . SCORPION_TELEGRAM_TOKEN . '/' . $method;
    $type = 'GET';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, $type);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    return curl_exec($ch);
}


function action_api_contact_form()
{
   // $fields_validate = ['name', 'company_name', 'email', 'phone', 'message'];
    $text = "Contact us:\n";

    if(isset($_POST['fields'])) {
        foreach ($_POST['fields'] as $field){
            $text .= $field['name'] . ": " . $field['value'] . "\n";
        }
    }

    $data = [
        'text' => $text,
        'chat_id' => SCORPION_TELEGRAM_CHAT_ID
    ];
    $return = sendApiRequestTG('sendMessage', $data);

    echo json_encode($return);
    die();
}

add_action('wp_ajax_action_api_contact_form', 'action_api_contact_form');
add_action('wp_ajax_nopriv_action_api_contact_form', 'action_api_contact_form');