<?php

    namespace Simplon\MailChimp\Vo\Lists;

    class ListMemberBatchSubscribeVo
    {
        protected $_doubleOptin;
        protected $_updateExisting;
        protected $_replaceInterests;

        /** @var  ListMemberBatchSubscribeMemberVo[] */
        protected $_listMemberBatchSubscribeMemberVoMany;

        // ######################################

        /**
         * @param mixed $doubleOptin
         *
         * @return ListMemberBatchSubscribeVo
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
         * @param mixed $replaceInterest
         *
         * @return ListMemberBatchSubscribeVo
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
         * @param mixed $updateExisting
         *
         * @return ListMemberBatchSubscribeVo
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
         * @param \Simplon\MailChimp\Vo\Lists\ListMemberBatchSubscribeMemberVo[] $listMemberBatchSubscribeMemberVoMany
         *
         * @return ListMemberBatchSubscribeVo
         */
        public function setListMemberBatchSubscribeMemberVoMany(array $listMemberBatchSubscribeMemberVoMany)
        {
            $this->_listMemberBatchSubscribeMemberVoMany = $listMemberBatchSubscribeMemberVoMany;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getBatch()
        {
            $batch = [];

            foreach ($this->_listMemberBatchSubscribeMemberVoMany as $batchVo)
            {
                $batch[] = [
                    'email'      => $batchVo->getEmailStruct(),
                    'email_type' => $batchVo->getEmailType(),
                    'merge_vars' => $batchVo->getMergeVars(),
                ];
            }

            return $batch;
        }
    }