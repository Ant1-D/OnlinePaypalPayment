<?php

namespace Paypal\Bundle\PaypalBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PaypalPaymentController extends Controller
{
    /**
     * @Route("/", name="PaypalBundle")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return new Response("Hello World !");
    }
}
