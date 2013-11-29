<?php

    namespace Simplon\MailChimp\Vo\Lists;

    use Simplon\Helper\VoSetDataFactory;

    class ListMemberSubscribeUpdateResponseVo
    {
        protected $_email;
        protected $_euid;
        protected $_leid;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('email', function ($val) { $this->setEmail($val); })
                ->setConditionByKey('euid', function ($val) { $this->setEuid($val); })
                ->setConditionByKey('leid', function ($val) { $this->setLeid($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $email
         *
         * @return ListMemberSubscribeUpdateResponseVo
         */
        public function setEmail($email)
        {
            $this->_email = $email;

            return $this;
        }

        // ######################################

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->_email;
        }

        // ######################################

        /**
         * @param mixed $euid
         *
         * @return ListMemberSubscribeUpdateResponseVo
         */
        public function setEuid($euid)
        {
            $this->_euid = $euid;

            return $this;
        }

        // ######################################

        /**
         * @return mixed
         */
        public function getEuid()
        {
            return $this->_euid;
        }

        // ######################################

        /**
         * @param mixed $leid
         *
         * @return ListMemberSubscribeUpdateResponseVo
         */
        public function setLeid($leid)
        {
            $this->_leid = $leid;

            return $this;
        }

        // ######################################

        /**
         * @return mixed
         */
        public function getLeid()
        {
            return $this->_leid;
        }
    }