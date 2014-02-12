# Gradwell SMS API

Unofficial library to send SMS messages using the Gradwell API.

## Installation

### Composer

    {
        "require": {
            "punkstar/gradwell_smsapi": "dev-master"
        }
    }


## Usage

    require_once "vendor/autoload.php";

    $sms = new \Gradwell\SMSAPI\Service($auth_token);
    $message = new \Gradwell\SMSAPI\Message($your_mobile, $your_mobile, 'Hello World');

    $sms->send($message);
