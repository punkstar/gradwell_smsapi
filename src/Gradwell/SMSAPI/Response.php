<?php

namespace Gradwell\SMSAPI;

class Response
{
    const STATUS_OK = 'OK';
    const STATUS_ERROR = 'ERR';
    const STATUS_UNKNOWN = 'UNKNOWN';

    protected $status_code;
    protected $status_message;

    protected $valid_statuses = array(
        self::STATUS_OK,
        self::STATUS_ERROR
    );

    public function __construct($response_string)
    {
        $delimiter_pos = strpos($response_string, ':');

        $status_code = substr($response_string, 0, $delimiter_pos);
        $status_message = substr($response_string, $delimiter_pos + 1);

        if (in_array($status_code, $this->valid_statuses)) {
            $this->status_code = $status_code;
            $this->status_message = $status_message;
        } else {
            $this->status_code = self::STATUS_UNKNOWN;
            $this->status_message = $response_string;
        }
    }

    public function isSuccessful()
    {
        return $this->status_code == self::STATUS_OK;
    }

    public function getStatusMessage()
    {
        return $this->status_message;
    }
}
