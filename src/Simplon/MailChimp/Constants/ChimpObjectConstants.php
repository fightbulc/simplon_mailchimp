<?php

    namespace Simplon\MailChimp\Constants;

    class ChimpObjectConstants
    {
        CONST MEMBER_STATUS_SUBSCRIBED = 'subscribed';

        // ######################################

        CONST EMAIL_TYPE_TEXT = 'text';
        CONST EMAIL_TYPE_HTML = 'html';

        // ######################################

        CONST WEBHOOK_TYPE_SUBSCRIBE = 'subscribe';
        CONST WEBHOOK_TYPE_UNSUBSCRIBE = 'unsubscribe';
        CONST WEBHOOK_TYPE_PROFILE_UPDATE = 'profile';
        CONST WEBHOOK_TYPE_EMAIL_UPDATE = 'upemail';
        CONST WEBHOOK_TYPE_CLEANED_FROM_LIST = 'cleaned';
        CONST WEBHOOK_TYPE_CAMPAIGN_EVENT = 'campaign';

        CONST WEBHOOK_UNSUBSCRIBE_ACTION_UNSUBSCRIBE = 'unsub';
        CONST WEBHOOK_UNSUBSCRIBE_ACTION_DELETE = 'delete';
        CONST WEBHOOK_UNSUBSCRIBE_REASON_MANUAL = 'manual';
        CONST WEBHOOK_UNSUBSCRIBE_REASON_ABUSE = 'abuse';
        CONST WEBHOOK_CLEANED_REASON_HARD_BOUNCE = 'hard';
        CONST WEBHOOK_CLEANED_REASON_ABUSE = 'abuse';
    }