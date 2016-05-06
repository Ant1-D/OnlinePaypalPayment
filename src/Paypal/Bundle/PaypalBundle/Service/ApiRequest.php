<?php

namespace Paypal\Bundle\PaypalBundle\Service;

class ApiRequest
{
    public function sendAuthRequest($clientId, $clientSecret)
    {
        $requestAPI = 'curl -v https://api.sandbox.paypal.com/v1/oauth2/token \
            -H "Accept: application/json" \
            -H "Accept-Language: en_US" \
            -u "'. $clientId . '":"'. $clientSecret . '" \
            -d "grant_type=client_credentials"';

        $json = json_decode(exec($requestAPI));

        return $json;
    }
}