<?php

    namespace Simplon\MailChimp;

    use Simplon\Helper\VoManyFactory;
    use Simplon\MailChimp\Constants\ChimpApiConstants;
    use Simplon\MailChimp\Vo\Lists\ListMemberBatchSubscribeResponseVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberBatchSubscribeVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberBatchUnsubscribeResponseVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberBatchUnsubscribeVo;
    use Simplon\MailChimp\Vo\Lists\ListMembersManyByEmailResponseVo;
    use Simplon\MailChimp\Vo\Lists\ListMembersManyResponseVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberSubscribeUpdateResponseVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberSubscribeVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberUnsubscribeVo;
    use Simplon\MailChimp\Vo\Lists\ListMemberUpdateVo;
    use Simplon\MailChimp\Vo\Lists\ListsManyResponseVo;
    use Simplon\MailChimp\Vo\Lists\ListVo;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookVo;

    class MailChimpLists
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
         * @param $listId
         *
         * @return ListVo
         */
        public function listsRetrieve($listId)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_LIST,
                [
                    'list_id' => $listId
                ]
            );

            return new ListVo($response);
        }

        // ######################################

        /**
         * @return ListsManyResponseVo
         */
        public function listsRetrieveMany()
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_LIST,
                [
                    'limit' => 100,
                ]
            );

            return new ListsManyResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         *
         * @return ListMembersManyResponseVo
         */
        public function membersRetrieveMany($listId)
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
         * @param $email
         *
         * @return ListMembersManyByEmailResponseVo|Vo\Lists\Member\MemberVo
         */
        public function membersRetrieveByEmail($listId, $email)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_INFO,
                [
                    'id'     => $listId,
                    'emails' => [
                        'email' => $email
                    ],
                ]
            );

            $listMembersManyByEmailResponseVo = new ListMembersManyByEmailResponseVo($response);

            if ($listMembersManyByEmailResponseVo->getSuccessCount() > 0)
            {
                $memberVoMany = $listMembersManyByEmailResponseVo->getMemberVoMany();

                return $memberVoMany[0];
            }

            return $listMembersManyByEmailResponseVo;
        }

        // ######################################

        /**
         * @param $listId
         * @param array $emailMany
         *
         * @return ListMembersManyByEmailResponseVo
         */
        public function membersRetrieveManyByEmail($listId, array $emailMany)
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
         * @return ListMemberSubscribeUpdateResponseVo
         */
        public function membersSubscribe($listId, ListMemberSubscribeVo $listMemberSubscribeVo)
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

            return new ListMemberSubscribeUpdateResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberUpdateVo $listMemberUpdateVo
         *
         * @return ListMemberSubscribeUpdateResponseVo
         */
        public function membersUpdate($listId, ListMemberUpdateVo $listMemberUpdateVo)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_MEMBER_UPDATE,
                [
                    'id'                => $listId,
                    'email'             => $listMemberUpdateVo->getEmailStruct(),
                    'merge_vars'        => $listMemberUpdateVo->getMergeVars(),
                    'email_type'        => $listMemberUpdateVo->getEmailType(),
                    'replace_interests' => $listMemberUpdateVo->shouldReplaceInterest(),
                ]
            );

            return new ListMemberSubscribeUpdateResponseVo($response);
        }

        // ######################################

        /**
         * @param $listId
         * @param ListMemberUnsubscribeVo $listMemberUnsubscribeVo
         *
         * @return bool
         */
        public function membersUnsubscribe($listId, ListMemberUnsubscribeVo $listMemberUnsubscribeVo)
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

            if (isset($response['complete']) && (bool)$response['complete'] === TRUE)
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
        public function membersSubscribeBatch($listId, ListMemberBatchSubscribeVo $listMemberBatchSubscribeVo)
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
        public function membersUnsubscribeBatch($listId, ListMemberBatchUnsubscribeVo $listMemberBatchUnsubscribeVo)
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

        // ######################################

        /**
         * @param $listId
         *
         * @return Vo\Lists\Webhook\WebhookVo[]
         */
        public function webhooksRetrieveMany($listId)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_WEBHOOKS,
                [
                    'id' => $listId,
                ]
            );

            /** @var WebhookVo[] $webhookVoMany */
            $webhookVoMany = VoManyFactory::factory($response, function ($key, $val)
            {
                return new WebhookVo($val);
            });

            return $webhookVoMany;
        }

        // ######################################

        /**
         * @param $listId
         * @param WebhookVo $webhookAddVo
         *
         * @return bool
         */
        public function webhooksAdd($listId, WebhookVo $webhookAddVo)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_WEBHOOK_ADD,
                [
                    'id'      => $listId,
                    'url'     => $webhookAddVo->getUrl(),
                    'actions' => $webhookAddVo->getActions(),
                    'sources' => $webhookAddVo->getSources(),
                ]
            );

            if (isset($response['id']))
            {
                return $response['id'];
            }

            return FALSE;
        }

        // ######################################

        /**
         * @param $listId
         * @param $url
         *
         * @return bool
         */
        public function webhooksDelete($listId, $url)
        {
            $response = ChimpConnector::request(
                ChimpApiConstants::RESOURCE_LISTS_WEBHOOK_DEL,
                [
                    'id'  => $listId,
                    'url' => $url,
                ]
            );

            if (isset($response['complete']) && (bool)$response['complete'] === TRUE)
            {
                return TRUE;
            }

            return FALSE;
        }
    }