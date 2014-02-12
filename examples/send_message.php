<?php
require_once "../vendor/autoload.php";

$auth_token = 'yourauthtoken';
$your_mobile = '4419208310928312';

$sms = new \Gradwell\SMSAPI\Service($auth_token);
$message = new \Gradwell\SMSAPI\Message($your_mobile, $your_mobile, 'Hello World');

$sms->send($message);
