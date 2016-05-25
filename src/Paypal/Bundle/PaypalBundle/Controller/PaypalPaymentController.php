<?php

namespace Paypal\Bundle\PaypalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Paypal\Bundle\PaypalBundle\DependencyInjection\PaypalBundleExtension;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Class PaypalPaymentController
 * @package Paypal\Bundle\PaypalBundle\Controller
 */
class PaypalPaymentController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction()
    {
        $clientId = $this->getParameter('client_id');

        $clientSecret = $this->getParameter('client_secret');

        $authRequest = $this->get('api_request')->sendAuthRequest($clientId, $clientSecret);

        $createPayment = $this->get('api_request')->createPayment($authRequest['access_token'], $this->createOrder());

        $redirectLink = $createPayment['links'][1];

        return $this->redirect($redirectLink['href']);
    }


    /* TODO externaliser ce morceau de code */
    public function createOrder(){
        $orderInfos = array();
        $orderInfos['amount'] = '15.00';
        $orderInfos['currency'] = 'EUR';
        $orderInfos['description'] = 'This is the payment transaction description.';
        $orderInfos['payment_method'] = 'paypal';
        return $orderInfos;
    }
}
