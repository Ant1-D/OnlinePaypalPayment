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
        die($this->clientId);
        // replace this example code with whatever you need
        return new Response("Hello World !");
    }
}
