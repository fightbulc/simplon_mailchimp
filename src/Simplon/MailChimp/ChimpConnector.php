<?php

    namespace Simplon\MailChimp;

    use Simplon\MailChimp\Constants\ChimpApiConstants;
    use Simplon\MailChimp\Constants\ChimpExceptionConstants;

    class ChimpConnector
    {
        protected static $_apiKey;

        // ######################################

        public static function reset()
        {
            self::$_apiKey = NULL;
        }

        // ######################################

        /**
         * @param $apiKey
         *
         * @return bool
         * @throws ChimpException
         */
        public static function apiKeyHasValidSyntax($apiKey)
        {
            if (!empty($apiKey) && strpos($apiKey, '-'))
            {
                return TRUE;
            }

            throw new ChimpException(
                ChimpExceptionConstants::MISSING_MISSING_OR_INVALID_APIKEY_MESSAGE,
                ChimpExceptionConstants::MISSING_OR_INVALID_APIKEY_CODE
            );
        }

        // ######################################

        /**
         * @param $apiKey
         *
         * @throws ChimpException
         */
        public static function setApiKey($apiKey)
        {
            if (self::apiKeyHasValidSyntax($apiKey))
            {
                self::$_apiKey = $apiKey;
            }
        }

        // ######################################

        /**
         * @return string
         * @throws ChimpException
         */
        public static function getApiKey()
        {
            if (self::apiKeyHasValidSyntax(self::$_apiKey))
            {
                return (string)self::$_apiKey;
            }
        }

        // ######################################

        /**
         * @return string
         * @throws ChimpException
         */
        public static function getApiAreaCode()
        {
            $apiKey = self::getApiKey();

            if (strpos($apiKey, '-') !== FALSE)
            {
                $keyParts = explode('-', $apiKey);

                return (string)array_pop($keyParts);
            }
        }

        // ######################################

        /**
         * @return string
         * @throws ChimpException
         */
        public static function getApiEndpoint()
        {
            $areaCode = self::getApiAreaCode();

            return trim(str_replace('{{areaCode}}', $areaCode, ChimpApiConstants::ENDPOINT), '/');
        }

        // ######################################

        /**
         * @param $resource
         *
         * @return string
         * @throws ChimpException
         */
        public static function getApiEndpointWithResource($resource)
        {
            $endpoint = self::getApiEndpoint();
            $url = trim($endpoint . '/' . $resource, '/');

            return $url . '.' . ChimpApiConstants::FORMAT_OUTPUT;

        }

        // ######################################

        /**
         * @param $resource
         * @param array $data
         *
         * @return array
         * @throws ChimpException
         */
        public static function request($resource, $data = [])
        {
            // get complete resource url
            $url = self::getApiEndpointWithResource($resource);

            // set api key
            $data['apikey'] = self::getApiKey();

            // request api
            $response = \CURL::init($url)
                ->setPost(TRUE)
                ->setPostFields(json_encode($data))
                ->setReturnTransfer(TRUE)
                ->execute();

            return self::validateResponse($response);
        }

        // ######################################

        /**
         * @param $jsonResponse
         *
         * @return array
         * @throws ChimpException
         */
        public static function validateResponse($jsonResponse)
        {
            $response = json_decode($jsonResponse, TRUE);

            if ($response)
            {
                if (isset($response['status']) && (string)$response['status'] === 'error')
                {
                    unset($response['status']);

                    throw new ChimpException(
                        ChimpExceptionConstants::ERROR_RESPONSE_MESSAGE,
                        ChimpExceptionConstants::ERROR_RESPONSE_CODE,
                        $response
                    );
                }

                return (array)$response;
            }

            throw new ChimpException(
                ChimpExceptionConstants::MALFORMED_RESPONSE_MESSAGE,
                ChimpExceptionConstants::MALFORMED_RESPONSE_CODE,
                [
                    'message' => $jsonResponse
                ]
            );
        }
    }