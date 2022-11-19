<?php

function action_api_contact_form(){
    $fields_validate = ['name', 'company_name', 'email', 'phone', 'message'];
    $return = [
        'success' => true,
        'errors' => [],
        'lang' => pll_current_language(),
        'data' => '',
    ];
    $fields = [];
    if(isset($_POST['fields'])){
        $fields = $_POST['fields'];
        foreach ($fields_validate as $field_name){
            if(!isset($fields[$field_name]) || $fields[$field_name] == '') {
                $return['success'] = false;
                array_push($return['errors'], [
                    'name_field' => $field_name,
                    'error' => get_error_lang('contact_empty_'.$field_name.'_lang')
                ]);
            }
        }
    } else{
        $return['success'] = false;
        $return['errors'] = 'fields empty!';
    }
    if($return['success']){
        if(!is_email($fields['email'])){
            $return['success'] = false;
            array_push($return['errors'], [
                'name_field' => 'email',
                'error' => get_error_lang('contact_error_email_lang')
            ]);
        }
        if(!is_numeric($fields['phone']) || iconv_strlen($fields['phone']) < 9 || iconv_strlen($fields['phone']) > 13){
            $return['success'] = false;
            array_push($return['errors'], [
                'name_field' => 'phone',
                'error' => get_error_lang('contact_error_phone_lang')
            ]);
        }
    }

    if($return['success']){
        $telegram_data = [
            'chat_id' => SPACE_IT_TELEGRAM_CHAT_ID,
            'text' => "Contact form: \n"
        ];
        foreach ($fields as $field => $field_value){
            $field_name = str_replace("_", " ", $field);
            $telegram_data['text'] .= "\n" . $field_name . ": " . $field_value;
        }
        $return['data'] = sendApiRequest('sendMessage', $telegram_data);
    }


    echo json_encode($return);
    die();
}
add_action( 'wp_ajax_action_api_contact_form', 'action_api_contact_form' );
add_action( 'wp_ajax_nopriv_action_api_contact_form', 'action_api_contact_form' );






