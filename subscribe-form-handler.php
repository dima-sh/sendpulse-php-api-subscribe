<?php
require_once(__DIR__.'/vendor/sendpulse-rest-api-php/api/sendpulseInterface.php');
require_once(__DIR__.'/vendor/sendpulse-rest-api-php/api/sendpulse.php');

// https://login.sendpulse.com/settings/#api
define('API_USER_ID', '');
define('API_SECRET', '');

define('ADDRESSBOOK_ID', '');
define('TOKEN_STORAGE', 'file');

if (isset($_POST['email']))  {

    $variables = array();
    if (isset($_POST['name'])) {
        $variables['Name'] = $_POST['name'];
    }

    $emails = array(
        array(
            'email' => $_POST['email'],
            'variables' => $variables
        )
    );

    $SPApiProxy = new SendpulseApi(API_USER_ID, API_SECRET, TOKEN_STORAGE);
    $res = $SPApiProxy->addEmails(ADDRESSBOOK_ID, $emails);

    header('Content-Type: application/json');
    echo json_encode($res);
}