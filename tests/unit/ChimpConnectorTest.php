<?php

    namespace Test;

    use Codeception\TestCase\Test;
    use Simplon\Config\Config;
    use Simplon\MailChimp\ChimpApiConstants;
    use Simplon\MailChimp\ChimpConnector;
    use Simplon\MailChimp\ChimpException;
    use Simplon\MailChimp\ChimpExceptionConstants;

    class ChimpConnectorTest extends Test
    {
        /**
         * @var \Test\CodeGuy
         */
        protected $codeGuy;

        // ######################################

        protected function _before()
        {
        }

        // ######################################

        protected function _after()
        {
        }

        // ######################################

        /**
         * @return Config
         */
        protected function _getConfig()
        {
            return Config::getInstance()
                ->setConfigPath(__DIR__ . '/../_data/config.php');
        }

        // ######################################

        /**
         * @return \Test\CodeGuy
         */
        public function getCodeGuy()
        {
            return $this->codeGuy;
        }

        // ######################################

        /**
         * @return string
         */
        public function getApiKey()
        {
            return $this->_getConfig()
                ->getConfigByKeys(['apiKey']);
        }

        // ######################################

        /**
         * @return string
         */
        public function getApiAreaCode()
        {
            return (string)array_pop(explode('-', $this->getApiKey()));
        }

        // ######################################

        public function testGetApiKey()
        {
            ChimpConnector::setApiKey($this->getApiKey());
            $response = ChimpConnector::getApiKey();

            $this->assertInternalType('string', $response);
            $this->assertEquals($this->getApiKey(), $response);
        }

        // ######################################

        public function testThatGetApiKeyWithMissingKeyThrowsException()
        {
            try
            {
                ChimpConnector::reset();
                ChimpConnector::getApiKey();
            }
            catch (ChimpException $e)
            {
                if ($e->getCode() === ChimpExceptionConstants::MISSING_OR_INVALID_APIKEY_CODE)
                {
                    return;
                }
            }

            $this->fail("Didn't receive exception for missing api key.");
        }

        // ######################################

        public function testThatGetApiKeyWithInvalidKeyThrowsException()
        {
            try
            {
                ChimpConnector::setApiKey('123_us4');
                ChimpConnector::getApiKey();
            }
            catch (ChimpException $e)
            {
                if ($e->getCode() === ChimpExceptionConstants::MISSING_OR_INVALID_APIKEY_CODE)
                {
                    return;
                }
            }

            $this->fail("Didn't receive exception for invalid api key.");
        }

        // ######################################

        public function testGetApiAreaCode()
        {
            ChimpConnector::setApiKey($this->getApiKey());
            $response = ChimpConnector::getApiAreaCode();

            $this->assertInternalType('string', $response);
            $this->assertEquals($this->getApiAreaCode(), $response);
        }

        // ######################################

        public function testThatGetApiAreaCodeWithInvalidKeyThrowsException()
        {
            try
            {
                ChimpConnector::setApiKey('12345');
                $response = ChimpConnector::getApiAreaCode();
            }
            catch (ChimpException $e)
            {
                if ($e->getCode() === ChimpExceptionConstants::MISSING_OR_INVALID_APIKEY_CODE)
                {
                    return;
                }
            }

            $this->fail("Didn't receive exception for invalid api key.");
        }

        // ######################################

        public function testRequestResource()
        {
            ChimpConnector::setApiKey($this->getApiKey());

            $data = [];
            $response = ChimpConnector::request(ChimpApiConstants::RESOURCE_LISTS_LIST, $data);

            $this->assertInternalType('array', $response);
        }

        // ######################################

        public function testThatRequestingResourceWithInvalidResourceMethod()
        {
            ChimpConnector::setApiKey($this->getApiKey());

            try
            {
                $data = [];
                $response = ChimpConnector::request('lists/listaaa', $data);
            }
            catch (ChimpException $e)
            {
                if ($e->getCode() === ChimpExceptionConstants::ERROR_RESPONSE_CODE)
                {
                    return;
                }
            }

            $this->fail("Missing exception for requesting a resource with an invalid method.");
        }
    }