<?php

    namespace Simplon\MailChimp\Vo\Lists\Webhook;

    use Simplon\Helper\VoSetDataFactory;

    class WebhookVo
    {
        protected $_url;
        protected $_actions;
        protected $_onSubscribe = TRUE;
        protected $_onUnsubscribe = TRUE;
        protected $_onProfileUpdate = TRUE;
        protected $_onCleanedFromList = TRUE;
        protected $_onEmailUpdated = TRUE;
        protected $_onCampaignEvent = TRUE;
        protected $_sources;
        protected $_sourceUser = TRUE;
        protected $_sourceAdmin = TRUE;
        protected $_sourceApi = FALSE;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('url', function ($val) { $this->_setUrl($val); })
                ->setConditionByKey('actions', function ($val) { $this->_setActions($val); })
                ->setConditionByKey('sources', function ($val) { $this->_setSources($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $campaign
         *
         * @return WebhookVo
         */
        public function hookOnCampaignEvent($campaign)
        {
            $this->_onCampaignEvent = $campaign;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getHookCampaignEvent()
        {
            return (bool)$this->_onCampaignEvent !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $cleaned
         *
         * @return WebhookVo
         */
        public function hookOnCleanedFromList($cleaned)
        {
            $this->_onCleanedFromList = $cleaned;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getHookCleanedFromList()
        {
            return (bool)$this->_onCleanedFromList !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $profile
         *
         * @return WebhookVo
         */
        public function hookOnProfileUpdate($profile)
        {
            $this->_onProfileUpdate = $profile;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getHookProfileUpdate()
        {
            return (bool)$this->_onProfileUpdate !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $subscribe
         *
         * @return WebhookVo
         */
        public function hookOnSubscribe($subscribe)
        {
            $this->_onSubscribe = $subscribe;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getHookSubscribe()
        {
            return (bool)$this->_onSubscribe !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $unsubscribe
         *
         * @return WebhookVo
         */
        public function hookOnUnsubscribe($unsubscribe)
        {
            $this->_onUnsubscribe = $unsubscribe;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getHookUnsubscribe()
        {
            return (bool)$this->_onUnsubscribe !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $upEmail
         *
         * @return WebhookVo
         */
        public function hookOnEmailUpdated($upEmail)
        {
            $this->_onEmailUpdated = $upEmail;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getHookEmailUpdated()
        {
            return (bool)$this->_onEmailUpdated !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $url
         *
         * @return WebhookVo
         */
        protected function _setUrl($url)
        {
            $this->_url = $url;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getUrl()
        {
            return (string)$this->_url;
        }

        // ######################################

        /**
         * @param mixed $sourceAdmin
         *
         * @return WebhookVo
         */
        protected function _setSourceAdmin($sourceAdmin)
        {
            $this->_sourceAdmin = $sourceAdmin;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getSourceAdmin()
        {
            return (bool)$this->_sourceAdmin !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $sourceApi
         *
         * @return WebhookVo
         */
        protected function _setSourceApi($sourceApi)
        {
            $this->_sourceApi = $sourceApi;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getSourceApi()
        {
            return (bool)$this->_sourceApi !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $sourceUser
         *
         * @return WebhookVo
         */
        protected function _setSourceUser($sourceUser)
        {
            $this->_sourceUser = $sourceUser;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getSourceUser()
        {
            return (bool)$this->_sourceUser !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param array $actions
         *
         * @return WebhookVo
         */
        protected function _setActions(array $actions)
        {
            $this
                ->hookOnSubscribe($actions['subscribe'])
                ->hookOnUnsubscribe($actions['unsubscribe'])
                ->hookOnProfileUpdate($actions['profile'])
                ->hookOnCleanedFromList($actions['cleaned'])
                ->hookOnEmailUpdated($actions['upemail'])
                ->hookOnCampaignEvent($actions['campaign']);

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getActions()
        {
            return [
                'subscribe'   => $this->getHookSubscribe(),
                'unsubscribe' => $this->getHookUnsubscribe(),
                'profile'     => $this->getHookProfileUpdate(),
                'cleaned'     => $this->getHookCleanedFromList(),
                'upemail'     => $this->getHookEmailUpdated(),
                'campaign'    => $this->getHookCampaignEvent(),
            ];
        }

        // ######################################

        /**
         * @param array $sources
         *
         * @return WebhookVo
         */
        protected function _setSources(array $sources)
        {
            $this
                ->setSourceUser($sources['user'])
                ->setSourceAdmin($sources['admin'])
                ->setSourceApi($sources['api']);

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getSources()
        {
            return [
                'user'  => $this->getSourceUser(),
                'admin' => $this->getSourceAdmin(),
                'api'   => $this->getSourceApi(),
            ];
        }
    }