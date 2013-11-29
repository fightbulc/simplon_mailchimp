<?php

    namespace Simplon\MailChimp\Vo\Lists\Webhook;

    use Simplon\Helper\VoSetDataFactory;
    use Simplon\MailChimp\Constants\ChimpObjectConstants;

    class WebhookSubscribeVo
    {
        protected $_firedAt;
        protected $_data;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('fired_at', function ($val) { $this->_setFiredAt($val); })
                ->setConditionByKey('data', function ($val) { $this->_setData($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $data
         *
         * @return WebhookSubscribeVo
         */
        protected function _setData($data)
        {
            $this->_data = $data;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        protected function _getData()
        {
            return (array)$this->_data;
        }

        // ######################################

        /**
         * @param mixed $firedAt
         *
         * @return WebhookSubscribeVo
         */
        protected function _setFiredAt($firedAt)
        {
            $this->_firedAt = $firedAt;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getFiredAt()
        {
            return (string)$this->_firedAt;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_getData()['id'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getListId()
        {
            return (string)$this->_getData()['list_id'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getEmail()
        {
            return (string)$this->_getData()['email'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getEmailType()
        {
            return (string)$this->_getData()['email_type'];
        }

        // ######################################

        /**
         * @return bool
         */
        public function isEmailTypeHtml()
        {
            return $this->getEmailType() === ChimpObjectConstants::EMAIL_TYPE_HTML ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @return bool
         */
        public function isEmailTypeText()
        {
            return !$this->isEmailTypeHtml();
        }

        // ######################################

        /**
         * @return array
         */
        public function getMerges()
        {
            return (array)$this->_getData()['merges'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getIpOpt()
        {
            return (string)$this->_getData()['ip_opt'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getIpSignup()
        {
            return (string)$this->_getData()['ip_signup'];
        }
    }