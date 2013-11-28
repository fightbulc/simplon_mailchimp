<?php

    namespace Simplon\MailChimp\Vo;

    use Simplon\Helper\VoSetDataFactory;

    class MemberGeoVo
    {
        protected $_latitude;
        protected $_longitude;
        protected $_gmtOff;
        protected $_dstoff;
        protected $_timeZone;
        protected $_cc; // 2-digit iso-3166 country code
        protected $_region;

        // ######################################

        /**
         * @param array $data
         */
        public function __construct(array $data)
        {
            (new VoSetDataFactory())
                ->setRawData($data)
                ->setConditionByKey('latitude', function ($val) { $this->setLatitude($val); })
                ->setConditionByKey('longitude', function ($val) { $this->setLongitude($val); })
                ->setConditionByKey('gmtoff', function ($val) { $this->setGmtOff($val); })
                ->setConditionByKey('dstoff', function ($val) { $this->setDstOff($val); })
                ->setConditionByKey('timezone', function ($val) { $this->setTimeZone($val); })
                ->setConditionByKey('cc', function ($val) { $this->setCc($val); })
                ->setConditionByKey('region', function ($val) { $this->setRegion($val); })
                ->run();
        }

        // ######################################

        /**
         * @param mixed $cc
         *
         * @return MemberGeoVo
         */
        public function setCc($cc)
        {
            $this->_cc = $cc;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getCc()
        {
            return (string)$this->_cc;
        }

        // ######################################

        /**
         * @param mixed $dstoff
         *
         * @return MemberGeoVo
         */
        public function setDstoff($dstoff)
        {
            $this->_dstoff = $dstoff;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getDstoff()
        {
            return (string)$this->_dstoff;
        }

        // ######################################

        /**
         * @param mixed $gmtOff
         *
         * @return MemberGeoVo
         */
        public function setGmtOff($gmtOff)
        {
            $this->_gmtOff = $gmtOff;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getGmtOff()
        {
            return (string)$this->_gmtOff;
        }

        // ######################################

        /**
         * @param mixed $latitude
         *
         * @return MemberGeoVo
         */
        public function setLatitude($latitude)
        {
            $this->_latitude = $latitude;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLatitude()
        {
            return (string)$this->_latitude;
        }

        // ######################################

        /**
         * @param mixed $longitude
         *
         * @return MemberGeoVo
         */
        public function setLongitude($longitude)
        {
            $this->_longitude = $longitude;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getLongitude()
        {
            return (string)$this->_longitude;
        }

        // ######################################

        /**
         * @param mixed $region
         *
         * @return MemberGeoVo
         */
        public function setRegion($region)
        {
            $this->_region = $region;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getRegion()
        {
            return (string)$this->_region;
        }

        // ######################################

        /**
         * @param mixed $timeZone
         *
         * @return MemberGeoVo
         */
        public function setTimeZone($timeZone)
        {
            $this->_timeZone = $timeZone;

            return $this;
        }

        // ######################################

        /**
         * @return string
         */
        public function getTimeZone()
        {
            return (string)$this->_timeZone;
        }
    } 