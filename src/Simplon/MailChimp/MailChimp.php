<?php

    namespace Simplon\MailChimp;

    use Simplon\MailChimp\Vo\ListMemberBatchSubscribeResponseVo;
    use Simplon\MailChimp\Vo\ListMemberBatchSubscribeVo;
    use Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeResponseVo;
    use Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeVo;
    use Simplon\MailChimp\Vo\ListMembersManyByEmailResponseVo;
    use Simplon\MailChimp\Vo\ListMembersManyResponseVo;
    use Simplon\MailChimp\Vo\ListMemberSubscribeVo;
    use Simplon\MailChimp\Vo\ListMemberUnsubscribeVo;
    use Simplon\MailChimp\Vo\ListsManyResponseVo;

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
         * @return ListsManyResponseVo
         */
        public function retrieveListsMany()
        {
            $response = ChimpConnector::request(ChimpApiConstants::RESOURCE_LISTS_LIST);

            return new ListsManyResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         *
         * @return ListMembersManyResponseVo
         */
        public function retrieveListMembersMany($listId)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBERS,
                ['id' => $listId]
            );

            return new ListMembersManyResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param array $emailMany
         *
         * @return ListMembersManyByEmailResponseVo
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

            return new ListMembersManyByEmailResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberSubscribeVo $listMemberSubscribeVo
         *
         * @return ListMembersManyByEmailResponseVo
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
         *
         * @return ListMemberBatchSubscribeResponseVo
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

            return new ListMemberBatchSubscribeResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberBatchUnsubscribeVo $listMemberBatchUnsubscribeVo
         *
         * @return ListMemberBatchUnsubscribeResponseVo
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

            return new ListMemberBatchUnsubscribeResponseVo($response);
        }
    }