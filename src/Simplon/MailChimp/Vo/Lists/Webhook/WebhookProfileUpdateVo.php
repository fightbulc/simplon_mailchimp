<?php

    namespace Simplon\MailChimp\Vo\Lists\Webhook;

    use Simplon\Helper\VoSetDataFactory;
    use Simplon\MailChimp\Constants\ChimpObjectConstants;

    class WebhookProfileUpdateVo
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
         * @return WebhookProfileUpdateVo
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
         * @return WebhookProfileUpdateVo
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
        public function getAction()
        {
            return (string)$this->_getData()['action'];
        }

        // ######################################

        /**
         * @return bool
         */
        public function isActionUnsubscribe()
        {
            return $this->getAction() === ChimpObjectConstants::WEBHOOK_UNSUBSCRIBE_ACTION_UNSUBSCRIBE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @return bool
         */
        public function isActionDelete()
        {
            return !$this->isActionUnsubscribe();
        }

        // ######################################

        /**
         * @return string
         */
        public function getReason()
        {
            return (string)$this->_getData()['reason'];
        }

        // ######################################

        /**
         * @return bool
         */
        public function isReasonManual()
        {
            return $this->getReason() === ChimpObjectConstants::WEBHOOK_UNSUBSCRIBE_REASON_MANUAL ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @return bool
         */
        public function isReasonAbuse()
        {
            return !$this->isReasonManual();
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
    }