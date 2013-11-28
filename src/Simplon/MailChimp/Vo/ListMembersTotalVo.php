<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoManyFactory;
    use Simplon\Helper\VoSetDataFactory;

    class ListMembersTotalVo
    {
        protected $_total;
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
                ->setConditionByKey('total', function ($val) { $this->setTotal($val); })
                ->setConditionByKey('data', function ($val) { $this->setData($val); })
                ->run();
        }

        // ######################################

        /**
         * @param array $data
         *
         * @return ListMembersTotalVo
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
         * @return ListMembersTotalVo
         */
        public function setTotal($total)
        {
            $this->_total = $total;

            return $this;
        }

        // ######################################

        /**
         * @return int
         */
        public function getTotal()
        {
            return (int)$this->_total;
        }
    }