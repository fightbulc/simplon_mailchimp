<?php

    namespace Simplon\MailChimp\Constants;

    class ChimpApiConstants
    {
        CONST ENDPOINT = 'https://{{areaCode}}.api.mailchimp.com/2.0';
        CONST FORMAT_OUTPUT = 'json';

        // ######################################

        CONST RESOURCE_LISTS_LIST = 'lists/list';

        CONST RESOURCE_LISTS_MEMBERS = 'lists/members';
        CONST RESOURCE_LISTS_MEMBER_INFO = 'lists/member-info';
        CONST RESOURCE_LISTS_MEMBER_SUBSCRIBE = 'lists/subscribe';
        CONST RESOURCE_LISTS_MEMBER_UPDATE = 'lists/update-member';
        CONST RESOURCE_LISTS_MEMBER_UNSUBSCRIBE = 'lists/unsubscribe';
        CONST RESOURCE_LISTS_MEMBER_BATCH_SUBSCRIBE = 'lists/batch-subscribe';
        CONST RESOURCE_LISTS_MEMBER_BATCH_UNSUBSCRIBE = 'lists/batch-unsubscribe';

        CONST RESOURCE_LISTS_WEBHOOKS = 'lists/webhooks';
        CONST RESOURCE_LISTS_WEBHOOK_ADD = 'lists/webhook-add';
        CONST RESOURCE_LISTS_WEBHOOK_DEL = 'lists/webhook-del';
    }