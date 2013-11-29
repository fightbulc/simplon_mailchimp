<?php

    namespace Simplon\MailChimp\Constants;

    class ChimpExceptionConstants
    {
        CONST MISSING_MISSING_OR_INVALID_APIKEY_MESSAGE = 'Missing api key or invalid key syntax.';
        CONST MISSING_OR_INVALID_APIKEY_CODE = 1;

        CONST MALFORMED_RESPONSE_MESSAGE = 'Received a malformed response.';
        CONST MALFORMED_RESPONSE_CODE = 2;

        CONST ERROR_RESPONSE_MESSAGE = 'Upps! Something went wrong.';
        CONST ERROR_RESPONSE_CODE = 3;

        CONST ERROR_WEBHOOK_UNKNOWN_MESSAGE = 'Upps! No idea about this webhook *derp';
        CONST ERROR_WEBHOOK_UNKNOWN_CODE = 4;
    }