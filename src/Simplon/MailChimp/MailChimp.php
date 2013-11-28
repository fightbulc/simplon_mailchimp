<?php

    namespace Simplon\MailChimp;

    use Simplon\MailChimp\Vo\ListMemberBatchSubscribeVo;
    use Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeVo;
    use Simplon\MailChimp\Vo\ListMembersInfoVo;
    use Simplon\MailChimp\Vo\ListMembersTotalVo;
    use Simplon\MailChimp\Vo\ListMemberSubscribeVo;
    use Simplon\MailChimp\Vo\ListMemberUnsubscribeVo;
    use Simplon\MailChimp\Vo\ListsTotalVo;

    class MailChimp
    {
        protected $_chimpConnector;

        // ######################################

        /**
         * @param null $apiKey
         *
         * @throws ChimpException
         */
        public function __construct($apiKey = NULL)
        {
            ChimpConnector::setApiKey($apiKey);
        }

        // ######################################

        /**
         * @return ListsTotalVo
         */
        public function retrieveListsMany()
        {
            $response = ChimpConnector::request(ChimpApiConstants::RESOURCE_LISTS_LIST);

            return new ListsTotalVo($response);
        }

        // ######################################

        /**
         * @param $listId
         *
         * @return ListMembersTotalVo
         */
        public function retrieveListMembersMany($listId)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBERS,
                ['id' => $listId]
            );

            return new ListMembersTotalVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param array $emailMany
         *
         * @return ListMembersInfoVo
         */
        public function retrieveListMembersManyByEmail($listId, array $emailMany)
        {
            // generate email struct
            $emailStructs = [];

            foreach ($emailMany as $email)
            {
                $emailStructs[] = [
                    'email' => $email
                ];
            }

            // ----------------------------------

            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_INFO,
                [
                    'id'     => $listId,
                    'emails' => $emailStructs,
                ]
            );

            return new ListMembersInfoVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberSubscribeVo $listMemberSubscribeVo
         *
         * @return ListMembersInfoVo
         */
        public function subscribeListMember($listId, ListMemberSubscribeVo $listMemberSubscribeVo)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_SUBSCRIBE,
                [
                    'id'                => $listId,
                    'email'             => $listMemberSubscribeVo->getEmailStruct(),
                    'merge_vars'        => $listMemberSubscribeVo->getMergeVars(),
                    'email_type'        => $listMemberSubscribeVo->getEmailType(),
                    'double_optin'      => $listMemberSubscribeVo->shouldDoubleOptin(),
                    'update_existing'   => $listMemberSubscribeVo->shouldUpdateExisting(),
                    'replace_interests' => $listMemberSubscribeVo->shouldReplaceInterest(),
                    'send_welcome'      => $listMemberSubscribeVo->shouldSendWelcome(),
                ]
            );

            // fetch member
            return $this->retrieveListMembersManyByEmail($listId, [$listMemberSubscribeVo->getEmail()]);
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberUnsubscribeVo $listMemberUnsubscribeVo
         *
         * @return bool
         */
        public function unsubscribeListMember($listId, ListMemberUnsubscribeVo $listMemberUnsubscribeVo)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_UNSUBSCRIBE,
                [
                    'id'            => $listId,
                    'email'         => $listMemberUnsubscribeVo->getEmailStruct(),
                    'delete_member' => $listMemberUnsubscribeVo->shouldDeleteMember(),
                    'send_goodbye'  => $listMemberUnsubscribeVo->shouldSendGoodBye(),
                    'send_notify'   => $listMemberUnsubscribeVo->shouldSendNotify(),
                ]
            );

            if ((bool)$response['complete'] === TRUE)
            {
                return TRUE;
            }

            return FALSE;
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberBatchSubscribeVo $listMemberBatchSubscribeVo
         */
        public function batchSubscribeListMember($listId, ListMemberBatchSubscribeVo $listMemberBatchSubscribeVo)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_BATCH_SUBSCRIBE,
                [
                    'id'                => $listId,
                    'batch'             => $listMemberBatchSubscribeVo->getBatch(),
                    'double_optin'      => $listMemberBatchSubscribeVo->shouldDoubleOptin(),
                    'update_existing'   => $listMemberBatchSubscribeVo->shouldUpdateExisting(),
                    'replace_interests' => $listMemberBatchSubscribeVo->shouldReplaceInterest(),
                ]
            );

            var_dump($response);
            exit;
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberBatchUnsubscribeVo $listMemberBatchUnsubscribeVo
         */
        public function batchUnsubscribeListMember($listId, ListMemberBatchUnsubscribeVo $listMemberBatchUnsubscribeVo)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_BATCH_UNSUBSCRIBE,
                [
                    'id'            => $listId,
                    'batch'         => $listMemberBatchUnsubscribeVo->getBatch(),
                    'delete_member' => $listMemberBatchUnsubscribeVo->shouldDeleteMember(),
                    'send_goodbye'  => $listMemberBatchUnsubscribeVo->shouldSendGoodBye(),
                    'send_notify'   => $listMemberBatchUnsubscribeVo->shouldSendNotify(),
                ]
            );

            var_dump($response);
            exit;
        }
    }