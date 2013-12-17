<?php

    namespace Simplon\MailChimp\Vo\Lists;

    use Simplon\MailChimp\Constants\ChimpObjectConstants;

    class ListMemberSubscribeVo
    {
        protected $_email;
        protected $_emailType;
        protected $_doubleOptin;
        protected $_updateExisting;
        protected $_replaceInterests;
        protected $_sendWelcome;
        protected $_mergeVars;

        // ######################################

        /**
         * @param mixed $doubleOptin
         *
         * @return ListMemberSubscribeVo
         */
        public function setDoubleOptin($doubleOptin)
        {
            $this->_doubleOptin = $doubleOptin;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldDoubleOptin()
        {
            return (bool)$this->_doubleOptin !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $email
         *
         * @return ListMemberSubscribeVo
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
         * @return ListMemberSubscribeVo
         */
        public function setEmailTypeHtml()
        {
            return $this->_setEmailType(ChimpObjectConstants::EMAIL_TYPE_HTML);
        }

        // ######################################

        /**
         * @return ListMemberSubscribeVo
         */
        public function setEmailTypeText()
        {
            return $this->_setEmailType(ChimpObjectConstants::EMAIL_TYPE_TEXT);
        }

        // ######################################

        /**
         * @param mixed $emailType
         *
         * @return ListMemberSubscribeVo
         */
        protected function _setEmailType($emailType)
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
         * @param mixed $replaceInterest
         *
         * @return ListMemberSubscribeVo
         */
        public function setReplaceInterests($replaceInterest)
        {
            $this->_replaceInterests = $replaceInterest;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldReplaceInterest()
        {
            return (bool)$this->_replaceInterests !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $sendWelcome
         *
         * @return ListMemberSubscribeVo
         */
        public function setSendWelcome($sendWelcome)
        {
            $this->_sendWelcome = $sendWelcome;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldSendWelcome()
        {
            return (bool)$this->_sendWelcome !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $updateExisting
         *
         * @return ListMemberSubscribeVo
         */
        public function setUpdateExisting($updateExisting)
        {
            $this->_updateExisting = $updateExisting;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldUpdateExisting()
        {
            return (bool)$this->_updateExisting !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @return array
         */
        public function getEmailStruct()
        {
            return [
                'email' => $this->getEmail(),
            ];
        }

        // ######################################

        /**
         * @param $key
         * @param $value
         *
         * @return ListMemberSubscribeVo
         */
        public function addMergeVar($key, $value)
        {
            $this->_mergeVars[$key] = $value;

            return $this;
        }

        // ######################################

        /**
         * @param mixed $fname
         *
         * @return ListMemberSubscribeVo
         */
        public function setFname($fname)
        {
            return $this->addMergeVar('FNAME', $fname);
        }

        // ######################################

        /**
         * @param mixed $lname
         *
         * @return ListMemberSubscribeVo
         */
        public function setLname($lname)
        {
            return $this->addMergeVar('LNAME', $lname);
        }

        // ######################################

        /**
         * @return array
         */
        public function getMergeVars()
        {
            return (array)$this->_mergeVars;
        }
    }