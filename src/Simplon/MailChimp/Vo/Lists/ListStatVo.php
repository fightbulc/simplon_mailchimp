<?php

    namespace Simplon\MailChimp\Vo\Lists;

    use Simplon\Helper\VoSetDataFactory;

    class ListStatVo
    {
        protected $_memberCount;
        protected $_unsubscribeCount;
        protected $_cleanedCount;
        protected $_memberCountSinceSend;
        protected $_unsubscribeCountSinceSend;
        protected $_cleanedCountSinceSend;
        protected $_campaignCount;
        protected $_groupingCount;
        protected $_groupCount;
        protected $_mergeVarCount;
        protected $_avgSubRate;
        protected $_targetSubRate;
        protected $_openRate;
        protected $_clickRate;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('member_count', function ($val) { $this->setMemberCount($val); })
                ->setConditionByKey('unsubscribe_count', function ($val) { $this->setUnsubscribeCount($val); })
                ->setConditionByKey('cleaned_count', function ($val) { $this->setCleanedCount($val); })
                ->setConditionByKey('member_count_since_send', function ($val) { $this->setMemberCountSinceSend($val); })
                ->setConditionByKey('unsubscribe_count_since_send', function ($val) { $this->setUnsubscribeCountSinceSend($val); })
                ->setConditionByKey('cleaned_count_since_send', function ($val) { $this->setCleanedCountSinceSend($val); })
                ->setConditionByKey('campaign_count', function ($val) { $this->setCampaignCount($val); })
                ->setConditionByKey('grouping_count', function ($val) { $this->setGroupingCount($val); })
                ->setConditionByKey('group_count', function ($val) { $this->setGroupCount($val); })
                ->setConditionByKey('merge_var_count', function ($val) { $this->setMergeVarCount($val); })
                ->setConditionByKey('avg_sub_rate', function ($val) { $this->setAvgSubRate($val); })
                ->setConditionByKey('target_sub_rate', function ($val) { $this->setTargetSubRate($val); })
                ->setConditionByKey('open_rate', function ($val) { $this->setOpenRate($val); })
                ->setConditionByKey('click_rate', function ($val) { $this->setClickRate($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $avgSubRate
         *
         * @return ListStatVo
         */
        public function setAvgSubRate($avgSubRate)
        {
            $this->_avgSubRate = $avgSubRate;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getAvgSubRate()
        {
            return (float)$this->_avgSubRate;
        }

        // ######################################

        /**
         * @param mixed $campaignCount
         *
         * @return ListStatVo
         */
        public function setCampaignCount($campaignCount)
        {
            $this->_campaignCount = $campaignCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getCampaignCount()
        {
            return (float)$this->_campaignCount;
        }

        // ######################################

        /**
         * @param mixed $cleanedCount
         *
         * @return ListStatVo
         */
        public function setCleanedCount($cleanedCount)
        {
            $this->_cleanedCount = $cleanedCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getCleanedCount()
        {
            return (float)$this->_cleanedCount;
        }

        // ######################################

        /**
         * @param mixed $cleanedCountSinceSend
         *
         * @return ListStatVo
         */
        public function setCleanedCountSinceSend($cleanedCountSinceSend)
        {
            $this->_cleanedCountSinceSend = $cleanedCountSinceSend;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getCleanedCountSinceSend()
        {
            return (float)$this->_cleanedCountSinceSend;
        }

        // ######################################

        /**
         * @param mixed $clickRate
         *
         * @return ListStatVo
         */
        public function setClickRate($clickRate)
        {
            $this->_clickRate = $clickRate;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getClickRate()
        {
            return (float)$this->_clickRate;
        }

        // ######################################

        /**
         * @param mixed $groupCount
         *
         * @return ListStatVo
         */
        public function setGroupCount($groupCount)
        {
            $this->_groupCount = $groupCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getGroupCount()
        {
            return (float)$this->_groupCount;
        }

        // ######################################

        /**
         * @param mixed $groupingCount
         *
         * @return ListStatVo
         */
        public function setGroupingCount($groupingCount)
        {
            $this->_groupingCount = $groupingCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getGroupingCount()
        {
            return (float)$this->_groupingCount;
        }

        // ######################################

        /**
         * @param mixed $memberCount
         *
         * @return ListStatVo
         */
        public function setMemberCount($memberCount)
        {
            $this->_memberCount = $memberCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getMemberCount()
        {
            return (float)$this->_memberCount;
        }

        // ######################################

        /**
         * @param mixed $memberCountSinceSend
         *
         * @return ListStatVo
         */
        public function setMemberCountSinceSend($memberCountSinceSend)
        {
            $this->_memberCountSinceSend = $memberCountSinceSend;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getMemberCountSinceSend()
        {
            return (float)$this->_memberCountSinceSend;
        }

        // ######################################

        /**
         * @param mixed $mergeVarCount
         *
         * @return ListStatVo
         */
        public function setMergeVarCount($mergeVarCount)
        {
            $this->_mergeVarCount = $mergeVarCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getMergeVarCount()
        {
            return (float)$this->_mergeVarCount;
        }

        // ######################################

        /**
         * @param mixed $openRate
         *
         * @return ListStatVo
         */
        public function setOpenRate($openRate)
        {
            $this->_openRate = $openRate;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getOpenRate()
        {
            return (float)$this->_openRate;
        }

        // ######################################

        /**
         * @param mixed $targetSubRate
         *
         * @return ListStatVo
         */
        public function setTargetSubRate($targetSubRate)
        {
            $this->_targetSubRate = $targetSubRate;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getTargetSubRate()
        {
            return (float)$this->_targetSubRate;
        }

        // ######################################

        /**
         * @param mixed $unsubscribeCount
         *
         * @return ListStatVo
         */
        public function setUnsubscribeCount($unsubscribeCount)
        {
            $this->_unsubscribeCount = $unsubscribeCount;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getUnsubscribeCount()
        {
            return (float)$this->_unsubscribeCount;
        }

        // ######################################

        /**
         * @param mixed $unsubscribeCountSinceSend
         *
         * @return ListStatVo
         */
        public function setUnsubscribeCountSinceSend($unsubscribeCountSinceSend)
        {
            $this->_unsubscribeCountSinceSend = $unsubscribeCountSinceSend;

            return $this;
        }

        // ######################################

        /**
         * @return float
         */
        public function getUnsubscribeCountSinceSend()
        {
            return (float)$this->_unsubscribeCountSinceSend;
        }
    }