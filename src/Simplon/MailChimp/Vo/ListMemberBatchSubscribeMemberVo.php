<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\ChimpObjectConstants;

    class ListMemberBatchSubscribeMemberVo
    {
        protected $_email;
        protected $_euid;
        protected $_leid;
        protected $_fname;
        protected $_lname;
        protected $_emailType;

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