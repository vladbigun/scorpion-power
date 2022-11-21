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

function acf_tf_get_block_field($name_field, $post_id, $block_id){
    $block_content = parse_blocks( get_post($post_id)->post_content );
    foreach ($block_content as $block){
        if($block['attrs']['id'] == $block_id){
            acf_setup_meta($block['attrs']['data'], $block['attrs']['id'], true);
            $field = get_field($name_field);
            acf_reset_meta($block['attrs']['id']);
            return $field;
        }
    }
}
function action_api_contact_form()
{
    // $fields_validate = ['name', 'surname', 'email'];

    $fields_validate = acf_tf_get_block_field('items', $_POST['post_id'], $_POST['block_id']);

    $return = [
        'errors' => [],
        'success' => true
    ];


    if(!isset($_POST['fields']) && !isset($_POST['block_id']) ) {
        $return['success'] = false;
        echo json_encode($return);
        die();
    }

    foreach ($fields_validate as $field_validate){
        foreach ($_POST['fields'] as $field){
            if($field['name'] == $field_validate['name']){
                if($field_validate['required']){
                    if($field['value'] == ''){
                        $return['errors'][] = [
                            'field' => $field_validate['name'],
                            'error' => $field_validate['text_group']['error_empty'],
                        ];
                        $return['success'] = false;
                    }
                }
                if($field_validate['type_group']['type'] == 'email'){
                    if(!is_email($field['value'])){
                        $return['errors'][] = [
                            'field' => $field_validate['name'],
                            'error' => $field_validate['type_group']['type_error'],
                        ];
                        $return['success'] = false;
                    }
                }
                if($field_validate['type_group']['type'] == 'phone' && $field['value'] != '') {
                    if(iconv_strlen($field['value']) < 7 || iconv_strlen($field['value']) > 14){
                        $return['errors'][] = [
                            'field' => $field_validate['name'],
                            'error' => $field_validate['type_group']['type_error'],
                        ];
                        $return['success'] = false;
                    }
                }
            }
        }
    }

    if($return['success']){
        $text = "Contact us:\n\n";

        foreach ($_POST['fields'] as $field){
            if(isset($field['value']) && $field['value'] != '' && isset($field['placeholder'])){
                $name_tg = $field['placeholder'] ?? $field['name'];
                $text .= $name_tg . ": " . $field['value'] . "\n";
            }
        }

        $data = [
            'text' => $text,
            'chat_id' => SCORPION_TELEGRAM_CHAT_ID
        ];
        $return['telegram'] = json_decode(sendApiRequestTG('sendMessage', $data));
    }

    echo json_encode($return);
    die();
}

add_action('wp_ajax_action_api_contact_form', 'action_api_contact_form');
add_action('wp_ajax_nopriv_action_api_contact_form', 'action_api_contact_form');