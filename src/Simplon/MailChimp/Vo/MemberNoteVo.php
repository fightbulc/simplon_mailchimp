<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoSetDataFactory;

    class MemberNoteVo
    {
        protected $_id;
        protected $_note;
        protected $_created;
        protected $_updated;
        protected $_createdByName;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('id', function ($val) { $this->setId($val); })
                ->setConditionByKey('note', function ($val) { $this->setNote($val); })
                ->setConditionByKey('created', function ($val) { $this->setCreated($val); })
                ->setConditionByKey('updated', function ($val) { $this->setUpdated($val); })
                ->setConditionByKey('created_by_name', function ($val) { $this->setCreatedByName($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $updated
         *
         * @return MemberNoteVo
         */
        public function setUpdated($updated)
        {
            $this->_updated = $updated;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getUpdated()
        {
            return (string)$this->_updated;
        }

        // ######################################

        /**
         * @param mixed $created
         *
         * @return MemberNoteVo
         */
        public function setCreated($created)
        {
            $this->_created = $created;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getCreated()
        {
            return (string)$this->_created;
        }

        // ######################################

        /**
         * @param mixed $id
         *
         * @return MemberNoteVo
         */
        public function setId($id)
        {
            $this->_id = $id;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getId()
        {
            return (int)$this->_id;
        }

        // ######################################

        /**
         * @param mixed $note
         *
         * @return MemberNoteVo
         */
        public function setNote($note)
        {
            $this->_note = $note;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getNote()
        {
            return (string)$this->_note;
        }

        // ######################################

        /**
         * @param mixed $createdByName
         *
         * @return MemberNoteVo
         */
        public function setCreatedByName($createdByName)
        {
            $this->_createdByName = $createdByName;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getCreatedByName()
        {
            return (string)$this->_createdByName;
        }
    } 