<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoSetDataFactory;

    class ListMemberBatchUnsubscribeResponseVo
    {
        protected $_successCount;
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
                ->setConditionByKey('success_count', function ($val) { $this->setSuccessCount($val); })
                ->setConditionByKey('error_count', function ($val) { $this->setErrorCount($val); })
                ->setConditionByKey('errors', function ($val) { $this->setErrors($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $count
         *
         * @return ListMemberBatchUnsubscribeResponseVo
         */
        public function setSuccessCount($count)
        {
            $this->_successCount = $count;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getSuccessCount()
        {
            return (int)$this->_successCount;
        }

        // ######################################

        /**
         * @param mixed $count
         *
         * @return ListMemberBatchUnsubscribeResponseVo
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
         * @return ListMemberBatchUnsubscribeResponseVo
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