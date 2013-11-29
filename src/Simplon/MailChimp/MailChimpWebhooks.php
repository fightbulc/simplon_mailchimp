<?php

    namespace Simplon;

    use Simplon\MailChimp\ChimpException;
    use Simplon\MailChimp\Constants\ChimpExceptionConstants;
    use Simplon\MailChimp\Constants\ChimpObjectConstants;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookCampaignEventVo;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookCleanedFromListVo;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookEmailUpdateVo;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookProfileUpdateVo;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookSubscribeVo;
    use Simplon\MailChimp\Vo\Lists\Webhook\WebhookUnsubscribeVo;

    class MailChimpWebhooks
    {
        /**
         * @param array $postData
         *
         * @return WebhookCampaignEventVo|WebhookCleanedFromListVo|WebhookEmailUpdateVo|WebhookProfileUpdateVo|WebhookSubscribeVo|WebhookUnsubscribeVo
         * @throws MailChimp\ChimpException
         */
        public function process(array $postData)
        {
            switch ($postData['type'])
            {
                case ChimpObjectConstants::WEBHOOK_TYPE_SUBSCRIBE:
                    return new WebhookSubscribeVo($postData);

                // ------------------------------

                case ChimpObjectConstants::WEBHOOK_TYPE_UNSUBSCRIBE:
                    return new WebhookUnsubscribeVo($postData);

                // ------------------------------

                case ChimpObjectConstants::WEBHOOK_TYPE_PROFILE_UPDATE:
                    return new WebhookProfileUpdateVo($postData);

                // ------------------------------

                case ChimpObjectConstants::WEBHOOK_TYPE_EMAIL_UPDATE:
                    return new WebhookEmailUpdateVo($postData);

                // ------------------------------

                case ChimpObjectConstants::WEBHOOK_TYPE_CLEANED_FROM_LIST:
                    return new WebhookCleanedFromListVo($postData);

                // ------------------------------

                case ChimpObjectConstants::WEBHOOK_TYPE_CAMPAIGN_EVENT:
                    return new WebhookCampaignEventVo($postData);

                // ------------------------------

                default:
                    throw new ChimpException(
                        ChimpExceptionConstants::ERROR_WEBHOOK_UNKNOWN_MESSAGE,
                        ChimpExceptionConstants::ERROR_WEBHOOK_UNKNOWN_CODE,
                        $postData
                    );
            }
        }
    }