<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoSetDataFactory;

    class ListVo
    {
        protected $_modules;
        protected $_defaultFromEmail;
        protected $_defaultFromName;
        protected $_useAwesomeBar;
        protected $_emaiTypeOption;
        protected $_dateCreated;
        protected $_name;
        protected $_webId;
        protected $_id;
        protected $_defaultSubject;
        protected $_defaultLanguage;
        protected $_listRating;
        protected $_subscribeUrlShort;
        protected $_subscribeUrlLong;
        protected $_beamerAddress;
        protected $_visibility;
        protected $_stats;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('modules', function ($val) { $this->setModules($val); })
                ->setConditionByKey('default_from_email', function ($val) { $this->setDefaultFromEmail($val); })
                ->setConditionByKey('default_from_name', function ($val) { $this->setDefaultFromName($val); })
                ->setConditionByKey('use_awesomebar', function ($val) { $this->setUseAwesomeBar($val); })
                ->setConditionByKey('email_type_option', function ($val) { $this->setEmaiTypeOption($val); })
                ->setConditionByKey('date_created', function ($val) { $this->setDateCreated($val); })
                ->setConditionByKey('name', function ($val) { $this->setName($val); })
                ->setConditionByKey('web_id', function ($val) { $this->setWebId($val); })
                ->setConditionByKey('id', function ($val) { $this->setId($val); })
                ->setConditionByKey('default_subject', function ($val) { $this->setDefaultSubject($val); })
                ->setConditionByKey('default_language', function ($val) { $this->setDefaultLanguage($val); })
                ->setConditionByKey('list_rating', function ($val) { $this->setListRating($val); })
                ->setConditionByKey('subscribe_url_short', function ($val) { $this->setSubscribeUrlShort($val); })
                ->setConditionByKey('subscribe_url_long', function ($val) { $this->setSubscribeUrlLong($val); })
                ->setConditionByKey('beamer_address', function ($val) { $this->setBeamerAddress($val); })
                ->setConditionByKey('visibility', function ($val) { $this->setVisibility($val); })
                ->setConditionByKey('stats', function ($val) { $this->setStats($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $beamerAddress
         *
         * @return ListVo
         */
        public function setBeamerAddress($beamerAddress)
        {
            $this->_beamerAddress = $beamerAddress;

            return $this;
        }

        /**
         * @return string
         */
        public function getBeamerAddress()
        {
            return (string)$this->_beamerAddress;
        }

        /**
         * @param mixed $dataCreated
         *
         * @return ListVo
         */
        public function setDateCreated($dataCreated)
        {
            $this->_dateCreated = $dataCreated;

            return $this;
        }

        /**
         * @return string
         */
        public function getDateCreated()
        {
            return (string)$this->_dateCreated;
        }

        /**
         * @param mixed $defaultFromEmail
         *
         * @return ListVo
         */
        public function setDefaultFromEmail($defaultFromEmail)
        {
            $this->_defaultFromEmail = $defaultFromEmail;

            return $this;
        }

        /**
         * @return string
         */
        public function getDefaultFromEmail()
        {
            return (string)$this->_defaultFromEmail;
        }

        /**
         * @param mixed $defaultFromName
         *
         * @return ListVo
         */
        public function setDefaultFromName($defaultFromName)
        {
            $this->_defaultFromName = $defaultFromName;

            return $this;
        }

        /**
         * @return string
         */
        public function getDefaultFromName()
        {
            return (string)$this->_defaultFromName;
        }

        /**
         * @param mixed $defaultLanguage
         *
         * @return ListVo
         */
        public function setDefaultLanguage($defaultLanguage)
        {
            $this->_defaultLanguage = $defaultLanguage;

            return $this;
        }

        /**
         * @return string
         */
        public function getDefaultLanguage()
        {
            return (string)$this->_defaultLanguage;
        }

        /**
         * @param mixed $defaultSubject
         *
         * @return ListVo
         */
        public function setDefaultSubject($defaultSubject)
        {
            $this->_defaultSubject = $defaultSubject;

            return $this;
        }

        /**
         * @return string
         */
        public function getDefaultSubject()
        {
            return (string)$this->_defaultSubject;
        }

        /**
         * @param mixed $emaiTypeOption
         *
         * @return ListVo
         */
        public function setEmaiTypeOption($emaiTypeOption)
        {
            $this->_emaiTypeOption = $emaiTypeOption;

            return $this;
        }

        /**
         * @return bool
         */
        public function getEmaiTypeOption()
        {
            return (bool)$this->_emaiTypeOption !== FALSE ? TRUE : FALSE;
        }

        /**
         * @param mixed $id
         *
         * @return ListVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        /**
         * @param mixed $listRating
         *
         * @return ListVo
         */
        public function setListRating($listRating)
        {
            $this->_listRating = $listRating;

            return $this;
        }

        /**
         * @return int
         */
        public function getListRating()
        {
            return (int)$this->_listRating;
        }

        /**
         * @param mixed $modules
         *
         * @return ListVo
         */
        public function setModules($modules)
        {
            $this->_modules = $modules;

            return $this;
        }

        /**
         * @return array
         */
        public function getModules()
        {
            return (array)$this->_modules;
        }

        /**
         * @param mixed $name
         *
         * @return ListVo
         */
        public function setName($name)
        {
            $this->_name = $name;

            return $this;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return (string)$this->_name;
        }

        /**
         * @param mixed $stats
         *
         * @return ListVo
         */
        public function setStats($stats)
        {
            $this->_stats = $stats;

            return $this;
        }

        /**
         * @return array
         */
        public function getStats()
        {
            return (array)$this->_stats;
        }

        /**
         * @param mixed $subscribeUrlLong
         *
         * @return ListVo
         */
        public function setSubscribeUrlLong($subscribeUrlLong)
        {
            $this->_subscribeUrlLong = $subscribeUrlLong;

            return $this;
        }

        /**
         * @return string
         */
        public function getSubscribeUrlLong()
        {
            return (string)$this->_subscribeUrlLong;
        }

        /**
         * @param mixed $subscribeUrlShort
         *
         * @return ListVo
         */
        public function setSubscribeUrlShort($subscribeUrlShort)
        {
            $this->_subscribeUrlShort = $subscribeUrlShort;

            return $this;
        }

        /**
         * @return string
         */
        public function getSubscribeUrlShort()
        {
            return (string)$this->_subscribeUrlShort;
        }

        /**
         * @param mixed $useAwesomeBar
         *
         * @return ListVo
         */
        public function setUseAwesomeBar($useAwesomeBar)
        {
            $this->_useAwesomeBar = $useAwesomeBar;

            return $this;
        }

        /**
         * @return bool
         */
        public function getUseAwesomeBar()
        {
            return (bool)$this->_useAwesomeBar !== FALSE ? TRUE : FALSE;
        }

        /**
         * @param mixed $visibility
         *
         * @return ListVo
         */
        public function setVisibility($visibility)
        {
            $this->_visibility = $visibility;

            return $this;
        }

        /**
         * @return string
         */
        public function getVisibility()
        {
            return (string)$this->_visibility;
        }

        /**
         * @param mixed $webId
         *
         * @return ListVo
         */
        public function setWebId($webId)
        {
            $this->_webId = $webId;

            return $this;
        }

        /**
         * @return int
         */
        public function getWebId()
        {
            return (int)$this->_webId;
        }
    } 