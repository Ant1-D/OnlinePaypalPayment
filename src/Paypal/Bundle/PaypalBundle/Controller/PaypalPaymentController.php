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
        $clientId = $this->getParameter('client_id');

        $clientSecret = $this->getParameter('client_secret');

        $authRequest = $this->get('api_request')->sendAuthRequest($clientId, $clientSecret);

        return new Response($authRequest);
    }
}
