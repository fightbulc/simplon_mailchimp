<?php

    namespace Simplon\MailChimp\Vo\Lists;

    class ListMemberUnsubscribeVo
    {
        protected $_email;
        protected $_euid;
        protected $_leid;
        protected $_deleteMember;
        protected $_sendGoodBye;
        protected $_sendNotify;

        // ######################################

        /**
         * @param mixed $deleteMember
         *
         * @return ListMemberUnsubscribeVo
         */
        public function setDeleteMember($deleteMember)
        {
            $this->_deleteMember = $deleteMember;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldDeleteMember()
        {
            return (bool)$this->_deleteMember !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $email
         *
         * @return ListMemberUnsubscribeVo
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
         * @param mixed $euid
         *
         * @return ListMemberUnsubscribeVo
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
         * @param mixed $leid
         *
         * @return ListMemberUnsubscribeVo
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
         * @param mixed $sendNotify
         *
         * @return ListMemberUnsubscribeVo
         */
        public function setSendNotify($sendNotify)
        {
            $this->_sendNotify = $sendNotify;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldSendNotify()
        {
            return (bool)$this->_sendNotify !== FALSE ? TRUE : FALSE;
        }

        // ######################################

        /**
         * @param mixed $sendGoodBye
         *
         * @return ListMemberUnsubscribeVo
         */
        public function setSendGoodBye($sendGoodBye)
        {
            $this->_sendGoodBye = $sendGoodBye;

            return $this;
        }

        // ######################################

        /**
         * @return bool
         */
        public function shouldSendGoodBye()
        {
            return (bool)$this->_sendGoodBye !== FALSE ? TRUE : FALSE;
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
    }