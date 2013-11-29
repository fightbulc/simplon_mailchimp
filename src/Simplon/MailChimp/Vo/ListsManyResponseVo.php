<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoManyFactory;
    use Simplon\Helper\VoSetDataFactory;

    class ListsManyResponseVo
    {
        protected $_total;
        protected $_data;
        protected $_listVoMany;

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
         * @return ListsManyResponseVo
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
         * @return bool|ListVo[]
         */
        public function getListVoMany()
        {
            $data = $this->getData();

            if (!empty($data))
            {
                /** @var ListVo[] $listVoMany */
                $listVoMany = VoManyFactory::factory($data, function ($key, $val)
                {
                    return new ListVo($val);
                });

                return $listVoMany;
            }

            return FALSE;
        }

        // ######################################

        /**
         * @param mixed $total
         *
         * @return ListsManyResponseVo
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