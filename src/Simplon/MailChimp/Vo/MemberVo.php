<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoManyFactory;
    use Simplon\Helper\VoSetDataFactory;

    class MemberVo
    {
        protected $_email;
        protected $_id;
        protected $_euid;
        protected $_emailType;
        protected $_ipSignup;
        protected $_timestampSignup;
        protected $_ipOpt;
        protected $_timestampOpt;
        protected $_memberRating;
        protected $_infoChanged;
        protected $_webId;
        protected $_leid;
        protected $_language;
        protected $_listId;
        protected $_listName;
        protected $_merges;
        protected $_status;
        protected $_timestamp;
        protected $_isGmonkey;
        protected $_lists;
        protected $_geo;
        protected $_clients;
        protected $_staticSegments;
        protected $_notes;

        /** @var  MemberMergeVo */
        protected $_memberMergeVo;

        /** @var  MemberGeoVo */
        protected $_memberGeoVo;

        /** @var  MemberNoteVo */
        protected $_memberNoteVo;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('email', function ($val) { $this->setEmail($val); })
                ->setConditionByKey('id', function ($val) { $this->setId($val); })
                ->setConditionByKey('euid', function ($val) { $this->setEuid($val); })
                ->setConditionByKey('email_type', function ($val) { $this->setEmailType($val); })
                ->setConditionByKey('ip_signup', function ($val) { $this->setIpSignup($val); })
                ->setConditionByKey('timestamp_signup', function ($val) { $this->setTimestampSignup($val); })
                ->setConditionByKey('ip_opt', function ($val) { $this->setIpOpt($val); })
                ->setConditionByKey('timestamp_opt', function ($val) { $this->setTimestampOpt($val); })
                ->setConditionByKey('member_rating', function ($val) { $this->setMemberRating($val); })
                ->setConditionByKey('info_changed', function ($val) { $this->setInfoChanged($val); })
                ->setConditionByKey('web_id', function ($val) { $this->setWebId($val); })
                ->setConditionByKey('leid', function ($val) { $this->setLeid($val); })
                ->setConditionByKey('language', function ($val) { $this->setLanguage($val); })
                ->setConditionByKey('list_id', function ($val) { $this->setListId($val); })
                ->setConditionByKey('list_name', function ($val) { $this->setListName($val); })
                ->setConditionByKey('merges', function ($val) { $this->setMerges($val); })
                ->setConditionByKey('status', function ($val) { $this->setStatus($val); })
                ->setConditionByKey('timestamp', function ($val) { $this->setTimestamp($val); })
                ->setConditionByKey('is_gmonkey', function ($val) { $this->setTimestamp($val); })
                ->setConditionByKey('lists', function ($val) { $this->setLists($val); })
                ->setConditionByKey('geo', function ($val) { $this->setGeo($val); })
                ->setConditionByKey('clients', function ($val) { $this->setClients($val); })
                ->setConditionByKey('static_segments', function ($val) { $this->setStaticSegments($val); })
                ->setConditionByKey('notes', function ($val) { $this->setNotes($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $lists
         *
         * @return MemberVo
         */
        public function setLists($lists)
        {
            $this->_lists = $lists;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getLists()
        {
            return (array)$this->_lists;
        }

        // ######################################

        /**
         * @param mixed $memberRating
         *
         * @return MemberVo
         */
        public function setMemberRating($memberRating)
        {
            $this->_memberRating = $memberRating;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getMemberRating()
        {
            return (int)$this->_memberRating;
        }

        // ######################################

        /**
         * @param mixed $clients
         *
         * @return MemberVo
         */
        public function setClients($clients)
        {
            $this->_clients = $clients;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getClients()
        {
            return (array)$this->_clients;
        }

        // ######################################

        /**
         * @param mixed $email
         *
         * @return MemberVo
         */
        public function setEmail($email)
        {
            $this->_email = $email;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getEmail()
        {
            return (string)$this->_email;
        }

        // ######################################

        /**
         * @param mixed $emailType
         *
         * @return MemberVo
         */
        public function setEmailType($emailType)
        {
            $this->_emailType = $emailType;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getEmailType()
        {
            return (string)$this->_emailType;
        }

        // ######################################

        /**
         * @param mixed $euid
         *
         * @return MemberVo
         */
        public function setEuid($euid)
        {
            $this->_euid = $euid;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getEuid()
        {
            return (string)$this->_euid;
        }

        // ######################################

        /**
         * @param mixed $geo
         *
         * @return MemberVo
         */
        public function setGeo($geo)
        {
            $this->_geo = $geo;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getGeo()
        {
            return (array)$this->_geo;
        }

        // ######################################

        /**
         * @param mixed $id
         *
         * @return MemberVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        // ######################################

        /**
         * @param mixed $infoChanged
         *
         * @return MemberVo
         */
        public function setInfoChanged($infoChanged)
        {
            $this->_infoChanged = $infoChanged;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getInfoChanged()
        {
            return (string)$this->_infoChanged;
        }

        // ######################################

        /**
         * @param mixed $ipOpt
         *
         * @return MemberVo
         */
        public function setIpOpt($ipOpt)
        {
            $this->_ipOpt = $ipOpt;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getIpOpt()
        {
            return (string)$this->_ipOpt;
        }

        // ######################################

        /**
         * @param mixed $ipSignup
         *
         * @return MemberVo
         */
        public function setIpSignup($ipSignup)
        {
            $this->_ipSignup = $ipSignup;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getIpSignup()
        {
            return (string)$this->_ipSignup;
        }

        // ######################################

        /**
         * @param mixed $isGmonkey
         *
         * @return MemberVo
         */
        public function setIsGmonkey($isGmonkey)
        {
            $this->_isGmonkey = $isGmonkey;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function getIsGmonkey()
        {
            return (bool)$this->_isGmonkey !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $language
         *
         * @return MemberVo
         */
        public function setLanguage($language)
        {
            $this->_language = $language;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLanguage()
        {
            return (string)$this->_language;
        }

        // ######################################

        /**
         * @param mixed $leid
         *
         * @return MemberVo
         */
        public function setLeid($leid)
        {
            $this->_leid = $leid;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getLeid()
        {
            return (int)$this->_leid;
        }

        // ######################################

        /**
         * @param mixed $listId
         *
         * @return MemberVo
         */
        public function setListId($listId)
        {
            $this->_listId = $listId;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getListId()
        {
            return (string)$this->_listId;
        }

        // ######################################

        /**
         * @param mixed $listName
         *
         * @return MemberVo
         */
        public function setListName($listName)
        {
            $this->_listName = $listName;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getListName()
        {
            return (string)$this->_listName;
        }

        // ######################################

        /**
         * @param mixed $merges
         *
         * @return MemberVo
         */
        public function setMerges($merges)
        {
            $this->_merges = $merges;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getMerges()
        {
            return (array)$this->_merges;
        }

        // ######################################

        /**
         * @param mixed $notes
         *
         * @return MemberVo
         */
        public function setNotes($notes)
        {
            $this->_notes = $notes;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getNotes()
        {
            return (array)$this->_notes;
        }

        // ######################################

        /**
         * @param mixed $staticSegments
         *
         * @return MemberVo
         */
        public function setStaticSegments($staticSegments)
        {
            $this->_staticSegments = $staticSegments;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getStaticSegments()
        {
            return (array)$this->_staticSegments;
        }

        // ######################################

        /**
         * @param mixed $status
         *
         * @return MemberVo
         */
        public function setStatus($status)
        {
            $this->_status = $status;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getStatus()
        {
            return (string)$this->_status;
        }

        // ######################################

        /**
         * @param mixed $timestamp
         *
         * @return MemberVo
         */
        public function setTimestamp($timestamp)
        {
            $this->_timestamp = $timestamp;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getTimestamp()
        {
            return (string)$this->_timestamp;
        }

        // ######################################

        /**
         * @param mixed $timestampOpt
         *
         * @return MemberVo
         */
        public function setTimestampOpt($timestampOpt)
        {
            $this->_timestampOpt = $timestampOpt;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getTimestampOpt()
        {
            return (string)$this->_timestampOpt;
        }

        // ######################################

        /**
         * @param mixed $timestampSignup
         *
         * @return MemberVo
         */
        public function setTimestampSignup($timestampSignup)
        {
            $this->_timestampSignup = $timestampSignup;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getTimestampSignup()
        {
            return (string)$this->_timestampSignup;
        }

        // ######################################

        /**
         * @param mixed $webId
         *
         * @return MemberVo
         */
        public function setWebId($webId)
        {
            $this->_webId = $webId;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getWebId()
        {
            return (int)$this->_webId;
        }

        // ######################################

        /**
         * @return bool|MemberMergeVo
         */
        public function getMemberMergeVo()
        {
            $merges = $this->getMerges();

            if (!empty($merges))
            {
                return new MemberMergeVo($merges);
            }

            return FALSE;
        }

        // ######################################

        /**
         * @return bool|MemberGeoVo
         */
        public function getMemberGeoVo()
        {
            $geo = $this->getGeo();

            if (!empty($geo))
            {
                return new MemberGeoVo($geo);
            }

            return FALSE;
        }

        // ######################################

        /**
         * @return bool|MemberNoteVo[]
         */
        public function getMemberNoteVoMany()
        {
            $notes = $this->getNotes();

            if (!empty($notes))
            {
                /** @var MemberNoteVo[] $memberNoteVoMany */
                $memberNoteVoMany = VoManyFactory::factory($notes, function ($key, $val)
                {
                    return new MemberGeoVo($val);
                });

                return $memberNoteVoMany;
            }

            return FALSE;
        }
    }