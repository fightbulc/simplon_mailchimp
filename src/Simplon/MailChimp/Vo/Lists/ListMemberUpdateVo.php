<?php

    namespace Simplon\MailChimp\Vo\Lists;

    use Simplon\MailChimp\Constants\ChimpObjectConstants;

    class ListMemberUpdateVo
    {
        protected $_leid;
        protected $_emailType;
        protected $_replaceInterests;
        protected $_mergeVars;

        // ######################################

        /**
         * @param mixed $email
         *
         * @return ListMemberUpdateVo
         */
        public function setLeid($email)
        {
            $this->_leid = $email;

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
         * @return ListMemberUpdateVo
         */
        public function setEmailTypeHtml()
        {
            return $this->_setEmailType(ChimpObjectConstants::EMAIL_TYPE_HTML);
        }

        // ######################################

        /**
         * @return ListMemberUpdateVo
         */
        public function setEmailTypeText()
        {
            return $this->_setEmailType(ChimpObjectConstants::EMAIL_TYPE_TEXT);
        }

        // ######################################

        /**
         * @param mixed $emailType
         *
         * @return ListMemberUpdateVo
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
         * @return ListMemberUpdateVo
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
         * @return array
         */
        public function getEmailStruct()
        {
            return [
                'leid' => $this->getLeid(),
            ];
        }

        // ######################################

        /**
         * @param $key
         * @param $value
         *
         * @return ListMemberUpdateVo
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
         * @return ListMemberUpdateVo
         */
        public function setMergeEmail($fname)
        {
            return $this->addMergeVar('EMAIL', $fname);
        }

        // ######################################

        /**
         * @param mixed $fname
         *
         * @return ListMemberUpdateVo
         */
        public function setMergeFirstName($fname)
        {
            return $this->addMergeVar('FNAME', $fname);
        }

        // ######################################

        /**
         * @param mixed $lname
         *
         * @return ListMemberUpdateVo
         */
        public function setMergeLastName($lname)
        {
            return $this->addMergeVar('LNAME', $lname);
        }

        // ######################################

        /**
         * @return ListMemberUpdateVo
         */
        public function setMergeStatusEnabled()
        {
            return $this->addMergeVar('STATUS', 'enabled');
        }

        // ######################################

        /**
         * @return ListMemberUpdateVo
         */
        public function setMergeStatusDisabled()
        {
            return $this->addMergeVar('STATUS', 'disabled');
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