<?php

    namespace Simplon\MailChimp;

    class ChimpException extends \Exception
    {
        protected $_response;

        // ######################################

        public function __construct($message, $code, $response = NULL)
        {
            parent::__construct($message, $code);
            $this->_response = $response;
        }

        // ######################################

        public function getResponse()
        {
            return $this->_response;
        }
    } 