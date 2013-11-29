<?php

    namespace Simplon\MailChimp\Vo\Lists\Webhook;

    use Simplon\Helper\VoSetDataFactory;
    use Simplon\MailChimp\Constants\ChimpObjectConstants;

    class WebhookCleanedFromListVo
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
         * @return WebhookCleanedFromListVo
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
         * @return WebhookCleanedFromListVo
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
        public function getCampaignId()
        {
            return (string)$this->_getData()['campaign_id'];
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
        public function isReasonHardBounce()
        {
            return $this->getReason() === ChimpObjectConstants::WEBHOOK_CLEANED_REASON_HARD_BOUNCE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @return bool
         */
        public function isReasonAbuse()
        {
            return !$this->isReasonHardBounce();
        }

        // ######################################

        /**
         * @return string
         */
        public function getEmail()
        {
            return (string)$this->_getData()['email'];
        }
    }