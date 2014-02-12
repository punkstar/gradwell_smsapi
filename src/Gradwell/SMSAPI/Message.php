<?php

namespace Gradwell\SMSAPI;

class Message
{
    protected $number_to;
    protected $number_from;
    protected $message;

    public function __construct($number_to, $number_from, $message)
    {
        $this->number_to = $number_to;
        $this->number_from = $number_from;
        $this->message = $message;
    }

    public function getTo()
    {
        return $this->number_to;
    }

    public function getFrom()
    {
        return $this->number_from;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
