<?php

namespace Paypal\Bundle\PaypalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Paypal\Bundle\PaypalBundle\DependencyInjection\PaypalBundleExtension;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PaypalPaymentController extends Controller
{

    public function indexAction()
    {
        $requestAPI = 'curl -v https://api.sandbox.paypal.com/v1/oauth2/token \
            -H "Accept: application/json" \
            -H "Accept-Language: en_US" \
            -u "'. $this->getParameter('client_id') . '":"'. $this->getParameter('client_secret') . '" \
            -d "grant_type=client_credentials"';

        $json = exec($requestAPI);
        var_dump($json);
        die();
        curl_close($curl);
        die();
        // replace this example code with whatever you need
        return new Response("Hello World !");
    }
}
