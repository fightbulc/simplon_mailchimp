<?php

    namespace Simplon\MailChimp\Vo\Lists\Member;

    use Simplon\Helper\VoSetDataFactory;

    class MemberListVo
    {
        protected $_id;
        protected $_status;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('id', function ($val) { $this->setId($val); })
                ->setConditionByKey('status', function ($val) { $this->setStatus($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $id
         *
         * @return MemberListVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getId()
        {
            return (string)$this->_id;
        }

        // ######################################

        /**
         * @param mixed $status
         *
         * @return MemberListVo
         */
        public function setStatus($status)
        {
            $this->_status = $status;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getStatus()
        {
            return (string)$this->_status;
        }
    }