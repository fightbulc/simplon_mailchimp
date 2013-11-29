<?php

    namespace Simplon\MailChimp\Vo\Lists\Webhook;

    use Simplon\Helper\VoSetDataFactory;

    class WebhookEmailUpdateVo
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
         * @return WebhookEmailUpdateVo
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
         * @return WebhookEmailUpdateVo
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
        public function getListId()
        {
            return (string)$this->_getData()['list_id'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getNewId()
        {
            return (string)$this->_getData()['new_id'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getNewEmail()
        {
            return (string)$this->_getData()['new_email'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getOldEmail()
        {
            return (string)$this->_getData()['old_email'];
        }
    }