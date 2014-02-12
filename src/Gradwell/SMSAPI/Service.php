<?php

namespace Gradwell\SMSAPI;

/**
 * Class Service
 *
 * Interface for communicating with the Gradwell API.
 *
 * @package Gradwell\SMSAPI
 */
class Service
{
    const API_ENDPOINT = 'https://call-api.gradwell.com/0.9.3/sms';

    /**
     * @var string
     */
    protected $auth_token;

    /**
     * @param string $auth_token
     */
    public function __construct($auth_token)
    {
        $this->auth_token = $auth_token;
    }

    /**
     * @param Message $message
     *
     * @return bool
     */
    public function send(Message $message)
    {
        $headers = array();
        $post_data = array(
            'auth'        => $this->auth_token,
            'originator'  => $message->getFrom(),
            'destination' => $message->getTo(),
            'message'     => $message->getMessage()
        );

        $http_response = \Requests::post(self::API_ENDPOINT, $headers, $post_data);
        $gradwell_response = new Response($http_response->body);

        return $http_response->success && $gradwell_response->isSuccessful();
    }

    /**
     * @param $messages
     *
     * @throws \Exception
     */
    public function sendBulk($messages)
    {
        if (!is_array($messages)) {
            throw new \Exception("Expected an array of Message objects");
        }

        foreach ($messages as $message) {
            if ($message instanceof Message) {
                $this->send($message);
            } else {
                throw new \Exception("Expected a Message object");
            }
        }
    }
}
