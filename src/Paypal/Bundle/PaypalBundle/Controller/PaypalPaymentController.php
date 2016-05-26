<?php

namespace Paypal\Bundle\PaypalBundle\Controller;

use Paypal\Bundle\PaypalBundle\Entity\PaypalOrder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Paypal\Bundle\PaypalBundle\DependencyInjection\PaypalBundleExtension;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Paypal\Bundle\PaypalBundle\Form\Type\OrderType;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Class PaypalPaymentController
 * @package Paypal\Bundle\PaypalBundle\Controller
 */
class PaypalPaymentController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if(!$this->get('session')->isStarted()){
                $session = new Session();
                $session->start();
            }

            return $this->redirectToRoute('payment', array('order' => $_POST));
        }

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/payment/", name="payment")
     */
    public function paymentAction(){

        $orderData = $_GET['order']['order'];

        $clientId = $this->getParameter('client_id');

        $clientSecret = $this->getParameter('client_secret');

        $authRequest = $this->get('api_request')->sendAuthRequest($clientId, $clientSecret);

        $this->get('session')->set('access_token', $authRequest['access_token']);

        $createPayment = $this->get('api_request')->createPayment($authRequest['access_token'], $orderData);

        $redirectLink = $createPayment['links'][1];

        return $this->redirect($redirectLink['href']);
    }

    /**
     * @Route("/cancel/" , name="cancel")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function cancelAction(){
        return new Response('Order cancelled');
    }

    /**
     * @Route("/finalization")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function finalizationAction(){

        $paymentInfos = $_GET;

        $accessToken = $this->get('session')->get('access_token');

        $createPayment = $this->get('api_request')->executePayment($accessToken, $paymentInfos);

        if($createPayment['state']=='approved'){

            return new Response('Paiement réalisé !');

        }else{

            return new Response('Une erreur a interronpu le paiement.');

        }
    }
}
