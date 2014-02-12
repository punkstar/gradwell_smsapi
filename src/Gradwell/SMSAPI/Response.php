<?php

namespace Gradwell\SMSAPI;

/**
 * Class Response
 *
 * Represents a response from the Gradwell API.
 *
 * @package Gradwell\SMSAPI
 */
class Response
{
    const STATUS_OK = 'OK';
    const STATUS_ERROR = 'ERR';
    const STATUS_UNKNOWN = 'UNKNOWN';

    /**
     * @var string
     */
    protected $status_code;

    /**
     * @var string
     */
    protected $status_message;

    /**
     * @var array
     */
    protected $valid_statuses = array(
        self::STATUS_OK,
        self::STATUS_ERROR
    );

    /**
     * @param string $response_string
     */
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

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->status_code == self::STATUS_OK;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->status_message;
    }
}
