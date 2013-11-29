<?php

    require __DIR__ . '/../vendor/autoload.php';

    $config = \Simplon\Config\Config::getInstance()
        ->setConfigPath(__DIR__ . '/../tests/_data/config.php');

    $mailchimp = new \Simplon\MailChimp\MailChimpLists($config->getConfigByKeys(['apiKey']));

    // ##########################################

    // get mailing lists

    $lists = function () use ($mailchimp)
    {
        $listsVo = $mailchimp->listsRetrieveMany();

        foreach ($listsVo->getListVoMany() as $listVo)
        {
            $out = [
                $listVo->getId(),
                $listVo->getName()
            ];

            var_dump($out);
        }

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // get members by listId

    $listMembers = function () use ($mailchimp)
    {
        $listMembersTotalVo = $mailchimp->membersRetrieveMany('95aed394e7');

        foreach ($listMembersTotalVo->getMemberVoMany() as $memberVo)
        {
            $out = [
                $memberVo->getId(),
                $memberVo->getEmail(),
                $memberVo->getMemberMergeVo()
                    ->getFname()
            ];

            var_dump($out);
        }

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // get members by listId and emails

    $listMembersByEmail = function () use ($mailchimp)
    {
        $listMembersInfoVo = $mailchimp->membersRetrieveManyByEmail(
            '6aa8be3f2f',
            [
                'dad@beatguide.me',
                'daniel@beatguide.me'
            ]
        );

        $memberVoMany = $listMembersInfoVo->getMemberVoMany();

        if ($memberVoMany !== FALSE)
        {
            foreach ($listMembersInfoVo->getMemberVoMany() as $memberVo)
            {
                $out = [
                    $memberVo->getId(),
                    $memberVo->getEmail(),
                    $memberVo->getMemberMergeVo()
                        ->getFname()
                ];

                var_dump($out);
            }
        }

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // subscribe member to list

    $listMemberSubscribe = function () use ($mailchimp)
    {
        $listMemberSubscribeVo = (new \Simplon\MailChimp\Vo\Lists\ListMemberSubscribeVo())
            ->setEmail('tino@beatguide.me')
            ->setFname('Tino')
            ->setLname('Ehrich');

        $memberVo = $mailchimp->membersSubscribe('95aed394e7', $listMemberSubscribeVo);

        var_dump($memberVo);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // unsubscribe member to list

    $listMemberUnsubscribe = function () use ($mailchimp)
    {
        $listMemberUnsubscribeVo = (new \Simplon\MailChimp\Vo\Lists\ListMemberUnsubscribeVo())
            ->setEmail('tino@beatguide.me')
            ->setDeleteMember(TRUE)
            ->setSendGoodBye(TRUE);

        $response = $mailchimp->membersUnsubscribe('95aed394e7', $listMemberUnsubscribeVo);

        var_dump($response);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // batch subscribe

    $listMemberBatchSubscribe = function () use ($mailchimp)
    {
        $listMemberBatchSubscribeVoMany = [];

        $listMemberBatchSubscribeVoMany[] = (new \Simplon\MailChimp\Vo\Lists\ListMemberBatchSubscribeMemberVo())
            ->setEmail('tino12345@beatguide.me')
            ->setFname('Toni')
            ->setLname('Ehrich')
            ->addMergeVar('UID', 'XXCC');

        // --------------------------------------

        $listMemberBatchSubscribeVo = (new \Simplon\MailChimp\Vo\Lists\ListMemberBatchSubscribeVo())
            ->setListMemberBatchSubscribeMemberVoMany($listMemberBatchSubscribeVoMany)
            ->setUpdateExisting(TRUE);

        $response = $mailchimp->membersSubscribeBatch('95aed394e7', $listMemberBatchSubscribeVo);

        var_dump($response);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // batch unsubscribe

    $listMemberBatchUnsubscribe = function () use ($mailchimp)
    {
        $listMemberBatchUnsubscribeVoMany = [];

        $listMemberBatchUnsubscribeVoMany[] = (new \Simplon\MailChimp\Vo\Lists\ListMemberBatchUnsubscribeMemberVo())
            ->setEmail('tino@beatguide.me');

        $listMemberBatchUnsubscribeVoMany[] = (new \Simplon\MailChimp\Vo\Lists\ListMemberBatchUnsubscribeMemberVo())
            ->setEmail('daniel@beatguide.me');

        $listMemberBatchUnsubscribeVoMany[] = (new \Simplon\MailChimp\Vo\Lists\ListMemberBatchUnsubscribeMemberVo())
            ->setEmail('brendon@beatguide.me');

        // --------------------------------------

        $listMemberBatchUnsubscribeVo = (new \Simplon\MailChimp\Vo\Lists\ListMemberBatchUnsubscribeVo())
            ->setListMemberBatchUnsubscribeMemberVoMany($listMemberBatchUnsubscribeVoMany);

        $response = $mailchimp->membersUnsubscribeBatch('95aed394e7', $listMemberBatchUnsubscribeVo);

        var_dump($response);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    $listMemberBatchSubscribe();