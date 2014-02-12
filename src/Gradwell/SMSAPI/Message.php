<?php

namespace Gradwell\SMSAPI;

/**
 * Class Message
 *
 * Represents a text message to be sent.
 *
 * @package Gradwell\SMSAPI
 */
class Message
{
    /**
     * @var string
     */
    protected $number_to;

    /**
     * @var string
     */
    protected $number_from;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $number_to
     * @param string $number_from
     * @param string $message
     */
    public function __construct($number_to, $number_from, $message)
    {
        $this->number_to = $number_to;
        $this->number_from = $number_from;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->number_to;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->number_from;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
