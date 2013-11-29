<?php

    namespace Simplon\MailChimp\Vo\Lists\Webhook;

    use Simplon\Helper\VoSetDataFactory;

    class WebhookCampaignEventVo
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
         * @return WebhookCampaignEventVo
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
         * @return WebhookCampaignEventVo
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
        public function getSubjectId()
        {
            return (string)$this->_getData()['subject'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getStatus()
        {
            return (string)$this->_getData()['status'];
        }

        // ######################################

        /**
         * @return string
         */
        public function getReason()
        {
            return (string)$this->_getData()['reason'];
        }
    }