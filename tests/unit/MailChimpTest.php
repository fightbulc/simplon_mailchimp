<?php

    namespace Test;

    use Codeception\TestCase\Test;
    use Simplon\Config\Config;
    use Simplon\MailChimp\ChimpException;
    use Simplon\MailChimp\ChimpExceptionConstants;
    use Simplon\MailChimp\MailChimpLists;

    class MailChimpTest extends Test
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

        public function testConstructor()
        {
            $mailchimp = new MailChimpLists($this->getApiKey());
        }

        // ######################################

        public function testThatConstructorThrowsException()
        {
            try
            {
                $mailchimp = new MailChimpLists('');
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
    }