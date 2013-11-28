<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\ChimpObjectConstants;

    class ListMemberSubscribeVo
    {
        protected $_email;
        protected $_euid;
        protected $_leid;
        protected $_fname;
        protected $_lname;
        protected $_emailType;
        protected $_doubleOptin;
        protected $_updateExisting;
        protected $_replaceInterests;
        protected $_sendWelcome;

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
         * @param mixed $euid
         *
         * @return ListMemberSubscribeVo
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
         * @param mixed $fname
         *
         * @return ListMemberSubscribeVo
         */
        public function setFname($fname)
        {
            $this->_fname = $fname;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getFname()
        {
            return (string)$this->_fname;
        }

        // ######################################

        /**
         * @param mixed $leid
         *
         * @return ListMemberSubscribeVo
         */
        public function setLeid($leid)
        {
            $this->_leid = $leid;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLeid()
        {
            return (string)$this->_leid;
        }

        // ######################################

        /**
         * @param mixed $lname
         *
         * @return ListMemberSubscribeVo
         */
        public function setLname($lname)
        {
            $this->_lname = $lname;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLname()
        {
            return (string)$this->_lname;
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
                'euid'  => $this->getEuid(),
                'leid'  => $this->getLeid(),
            ];
        }

        // ######################################

        /**
         * @return array
         */
        public function getMergeVars()
        {
            return [
                'FNAME' => $this->getFname(),
                'LNAME' => $this->getLname(),
            ];
        }
    }