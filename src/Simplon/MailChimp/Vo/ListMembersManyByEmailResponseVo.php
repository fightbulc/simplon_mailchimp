<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoManyFactory;
    use Simplon\Helper\VoSetDataFactory;

    class ListMembersManyByEmailResponseVo
    {
        protected $_successCount;
        protected $_errorCount;
        protected $_errors;
        protected $_data;
        protected $_memberVoMany;

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
                ->setConditionByKey('data', function ($val) { $this->setData($val); })
                ->run();
        }

        // ######################################

        /**
         * @param array $data
         *
         * @return ListMembersManyByEmailResponseVo
         */
        public function setData(array $data)
        {
            $this->_data = $data;

            return $this;
        }

        // ######################################

        /**
         * @return array
         */
        public function getData()
        {
            return (array)$this->_data;
        }

        // ######################################

        /**
         * @return bool|MemberVo[]
         */
        public function getMemberVoMany()
        {
            $data = $this->getData();

            if (!empty($data))
            {
                /** @var MemberVo[] $memberVoMany */
                $memberVoMany = VoManyFactory::factory($data, function ($key, $val)
                {
                    return new MemberVo($val);
                });

                return $memberVoMany;
            }

            return FALSE;
        }

        // ######################################

        /**
         * @param mixed $total
         *
         * @return ListMembersManyByEmailResponseVo
         */
        public function setSuccessCount($total)
        {
            $this->_successCount = $total;

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
         * @param mixed $errorCount
         *
         * @return ListMembersManyByEmailResponseVo
         */
        public function setErrorCount($errorCount)
        {
            $this->_errorCount = $errorCount;

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
         * @return ListMembersManyByEmailResponseVo
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