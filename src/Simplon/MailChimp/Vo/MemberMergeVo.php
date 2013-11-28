<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoSetDataFactory;

    class MemberMergeVo
    {
        protected $_email;
        protected $_fname;
        protected $_lname;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('EMAIL', function ($val) { $this->setEmail($val); })
                ->setConditionByKey('FNAME', function ($val) { $this->setFname($val); })
                ->setConditionByKey('LNAME', function ($val) { $this->setLname($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $email
         *
         * @return MemberMergeVo
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
         * @param mixed $fname
         *
         * @return MemberMergeVo
         */
        public function setFname($fname)
        {
            $this->_fname = $fname;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getFname()
        {
            return (string)$this->_fname;
        }

        // ######################################

        /**
         * @param mixed $lname
         *
         * @return MemberMergeVo
         */
        public function setLname($lname)
        {
            $this->_lname = $lname;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLname()
        {
            return (string)$this->_lname;
        }
    }