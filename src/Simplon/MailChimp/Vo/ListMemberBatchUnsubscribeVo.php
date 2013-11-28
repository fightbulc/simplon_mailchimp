<?php

    namespace Simplon\MailChimp\Vo;

    class ListMemberBatchUnsubscribeVo
    {
        protected $_deleteMember;
        protected $_sendGoodBye;
        protected $_sendNotify;

        /** @var  ListMemberBatchUnsubscribeMemberVo[] */
        protected $_listMemberBatchUnsubscribeMemberVoMany;

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
         * @param \Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeMemberVo[] $listMemberBatchUnsubscribeMemberVoMany
         *
         * @return ListMemberBatchUnsubscribeVo
         */
        public function setListMemberBatchUnsubscribeMemberVoMany(array $listMemberBatchUnsubscribeMemberVoMany)
        {
            $this->_listMemberBatchUnsubscribeMemberVoMany = $listMemberBatchUnsubscribeMemberVoMany;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getBatch()
        {
            $batch = [];

            foreach ($this->_listMemberBatchUnsubscribeMemberVoMany as $batchVo)
            {
                $batch[] = $batchVo->getEmailStruct();
            }

            return $batch;
        }
    }