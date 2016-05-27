<?php

namespace Paypal\Bundle\PaypalBundle\Service;

/**
 * Class ApiRequest
 * @package Paypal\Bundle\PaypalBundle\Service
 */
class ApiRequest
{

    /**
     * @param $clientId
     * @param $clientSecret
     * @return mixed
     */
    public function sendAuthRequest($clientId, $clientSecret)
    {

        $requestAPI = 'curl -v https://api.sandbox.paypal.com/v1/oauth2/token \
            -H "Accept: application/json" \
            -H "Accept-Language: en_US" \
            -u "'. $clientId . '":"'. $clientSecret . '" \
            -d "grant_type=client_credentials"';

        $data = json_decode(exec($requestAPI), true);

        return $data;
    }

    /**
     * @param $accessToken
     * @param $orderInfos
     * @return mixed
     */
    public function createPayment($accessToken, $orderInfos){

        $createPaymentRequest = 'curl -v https://api.sandbox.paypal.com/v1/payments/payment \
            -H "Content-Type:application/json" \
            -H "Authorization: Bearer '.$accessToken.' " \
            -d \'{
                "intent":"sale",
                "redirect_urls":{
                  "return_url":"http://projets.odop.fr/OnlinePaypalPayment/web/finalization",
                  "cancel_url":"http://projets.odop.fr/OnlinePaypalPayment/web/cancel"
                },
                "payer":{
                  "payment_method":"paypal"
                },
                "transactions":[
                  {
                    "amount":{
                      "total":"'.$orderInfos['price'].'",
                      "currency":"'.$orderInfos['currency'].'"
                    },
                    "description":"'.$orderInfos['description'].'"
                  }
                ]
              }\'';

        $data = json_decode(exec($createPaymentRequest), true);
        var_dump($data);
        return $data;
    }

    /**
     * @param $accessToken
     * @param $payerId
     * @return mixed
     */
    public function executePayment($accessToken, $paymentInfos){

        $executePaymentRequest = 'curl -v https://api.sandbox.paypal.com/v1/payments/payment/'.$paymentInfos['paymentId'].'/execute/ \
                -H "Content-Type:application/json" \
                -H "Authorization: Bearer '.$accessToken.'" \
                -d \'{ "payer_id" : "'.$paymentInfos['PayerID'].'" }\'';

        $data = json_decode(exec($executePaymentRequest), true);

        return $data;
    }
}