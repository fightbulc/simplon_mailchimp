<?php

    namespace Simplon\MailChimp\Vo\Lists;

    use Simplon\MailChimp\Constants\ChimpObjectConstants;

    class ListMemberBatchSubscribeMemberVo
    {
        protected $_email;
        protected $_mergeVars;
        protected $_emailType;

        // ######################################

        /**
         * @param mixed $email
         *
         * @return ListMemberBatchSubscribeMemberVo
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
         * @return ListMemberBatchSubscribeMemberVo
         */
        public function setEmailTypeHtml()
        {
            return $this->_setEmailType(ChimpObjectConstants::EMAIL_TYPE_HTML);
        }

        // ######################################

        /**
         * @return ListMemberBatchSubscribeMemberVo
         */
        public function setEmailTypeText()
        {
            return $this->_setEmailType(ChimpObjectConstants::EMAIL_TYPE_TEXT);
        }

        // ######################################

        /**
         * @param mixed $emailType
         *
         * @return ListMemberBatchSubscribeMemberVo
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
         * @return ListMemberBatchSubscribeMemberVo
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
         * @return ListMemberBatchSubscribeMemberVo
         */
        public function setFname($fname)
        {
            return $this->addMergeVar('FNAME', $fname);
        }

        // ######################################

        /**
         * @param mixed $lname
         *
         * @return ListMemberBatchSubscribeMemberVo
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