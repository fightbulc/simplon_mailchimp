<?php

    require __DIR__ . '/../vendor/autoload.php';

    $config = \Simplon\Config\Config::getInstance()
        ->setConfigPath(__DIR__ . '/../tests/_data/config.php');

    $mailchimp = new \Simplon\MailChimp\MailChimp($config->getConfigByKeys(['apiKey']));

    // ##########################################

    // get mailing lists

    $lists = function () use ($mailchimp)
    {
        $listsVo = $mailchimp->retrieveListsMany();

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
        $listMembersTotalVo = $mailchimp->retrieveListMembersMany('95aed394e7');

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
        $listMembersInfoVo = $mailchimp->retrieveListMembersManyByEmail(
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
        $listMemberSubscribeVo = (new \Simplon\MailChimp\Vo\ListMemberSubscribeVo())
            ->setEmail('tino@beatguide.me')
            ->setFname('Tino')
            ->setLname('Ehrich');

        $memberVo = $mailchimp->subscribeListMember('95aed394e7', $listMemberSubscribeVo);

        var_dump($memberVo);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // unsubscribe member to list

    $listMemberUnsubscribe = function () use ($mailchimp)
    {
        $listMemberUnsubscribeVo = (new \Simplon\MailChimp\Vo\ListMemberUnsubscribeVo())
            ->setEmail('tino@beatguide.me')
            ->setDeleteMember(TRUE)
            ->setSendGoodBye(TRUE);

        $response = $mailchimp->unsubscribeListMember('95aed394e7', $listMemberUnsubscribeVo);

        var_dump($response);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // batch subscribe

    $listMemberBatchSubscribe = function () use ($mailchimp)
    {
        $listMemberBatchSubscribeVoMany = [];

        $listMemberBatchSubscribeVoMany[] = (new \Simplon\MailChimp\Vo\ListMemberBatchSubscribeMemberVo())
            ->setEmail('tino@beatguide.me')
            ->setFname('Tino')
            ->setLname('Ehrich');

        $listMemberBatchSubscribeVoMany[] = (new \Simplon\MailChimp\Vo\ListMemberBatchSubscribeMemberVo())
            ->setEmail('daniel@beatguide.me')
            ->setFname('Daniel')
            ->setLname('Bock');

        $listMemberBatchSubscribeVoMany[] = (new \Simplon\MailChimp\Vo\ListMemberBatchSubscribeMemberVo())
            ->setEmail('brendon@beatguide.me')
            ->setFname('Brendon')
            ->setLname('Blackwell');

        // --------------------------------------

        $listMemberBatchSubscribeVo = (new \Simplon\MailChimp\Vo\ListMemberBatchSubscribeVo())
            ->setListMemberBatchSubscribeMemberVoMany($listMemberBatchSubscribeVoMany);

        $response = $mailchimp->batchSubscribeListMember('95aed394e7', $listMemberBatchSubscribeVo);

        var_dump($response);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    // batch unsubscribe

    $listMemberBatchUnsubscribe = function () use ($mailchimp)
    {
        $listMemberBatchUnsubscribeVoMany = [];

        $listMemberBatchUnsubscribeVoMany[] = (new \Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeMemberVo())
            ->setEmail('tino@beatguide.me');

        $listMemberBatchUnsubscribeVoMany[] = (new \Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeMemberVo())
            ->setEmail('daniel@beatguide.me');

        $listMemberBatchUnsubscribeVoMany[] = (new \Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeMemberVo())
            ->setEmail('brendon@beatguide.me');

        // --------------------------------------

        $listMemberBatchUnsubscribeVo = (new \Simplon\MailChimp\Vo\ListMemberBatchUnsubscribeVo())
            ->setListMemberBatchUnsubscribeMemberVoMany($listMemberBatchUnsubscribeVoMany);

        $response = $mailchimp->batchUnsubscribeListMember('95aed394e7', $listMemberBatchUnsubscribeVo);

        var_dump($response);

        echo "\n\n#############################\n\n";
    };

    // ##########################################

    $listMemberBatchUnsubscribe();