<?php

    namespace Simplon\MailChimp\Vo\Lists;

    use Simplon\Helper\VoSetDataFactory;

    class ListMemberBatchSubscribeResponseVo
    {
        protected $_addCount;
        protected $_adds;
        protected $_updateCount;
        protected $_updates;
        protected $_errorCount;
        protected $_errors;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('add_count', function ($val) { $this->setAddCount($val); })
                ->setConditionByKey('adds', function ($val) { $this->setAdds($val); })
                ->setConditionByKey('update_count', function ($val) { $this->setUpdateCount($val); })
                ->setConditionByKey('updates', function ($val) { $this->setUpdates($val); })
                ->setConditionByKey('error_count', function ($val) { $this->setErrorCount($val); })
                ->setConditionByKey('errors', function ($val) { $this->setErrors($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $count
         *
         * @return ListMemberBatchSubscribeResponseVo
         */
        public function setAddCount($count)
        {
            $this->_addCount = $count;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getAddCount()
        {
            return (int)$this->_addCount;
        }

        // ######################################

        /**
         * @param mixed $adds
         *
         * @return ListMemberBatchSubscribeResponseVo
         */
        public function setAdds($adds)
        {
            $this->_adds = $adds;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getAdds()
        {
            return (array)$this->_adds;
        }

        // ######################################

        /**
         * @param mixed $count
         *
         * @return ListMemberBatchSubscribeResponseVo
         */
        public function setUpdateCount($count)
        {
            $this->_updateCount = $count;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getUpdateCount()
        {
            return (int)$this->_updateCount;
        }

        // ######################################

        /**
         * @param mixed $updates
         *
         * @return ListMemberBatchSubscribeResponseVo
         */
        public function setUpdates($updates)
        {
            $this->_updates = $updates;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getUpdates()
        {
            return (array)$this->_updates;
        }

        // ######################################

        /**
         * @param mixed $count
         *
         * @return ListMemberBatchSubscribeResponseVo
         */
        public function setErrorCount($count)
        {
            $this->_errorCount = $count;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getErrorCount()
        {
            return (int)$this->_errorCount;
        }

        // ######################################

        /**
         * @param mixed $errors
         *
         * @return ListMemberBatchSubscribeResponseVo
         */
        public function setErrors($errors)
        {
            $this->_errors = $errors;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getErrors()
        {
            return (array)$this->_errors;
        }
    }