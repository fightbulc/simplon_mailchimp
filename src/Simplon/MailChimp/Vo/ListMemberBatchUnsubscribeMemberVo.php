<?php

    namespace Simplon\MailChimp\Vo;

    class ListMemberBatchUnsubscribeMemberVo
    {
        protected $_email;
        protected $_euid;
        protected $_leid;

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