<?php

namespace Paypal\Bundle\PaypalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaypalOrder
 *
 * @ORM\Table(name="paypal_order")
 * @ORM\Entity(repositoryClass="Paypal\Bundle\PaypalBundle\Repository\PaypalOrderRepository")
 */
class PaypalOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=0)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="cancel_url", type="text")
     */
    private $cancelUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="return_url", type="text")
     */
    private $returnUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=255)
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="intent", type="string", length=255)
     */
    private $intent;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return PaypalOrder
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return PaypalOrder
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PaypalOrder
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set cancelUrl
     *
     * @param string $cancelUrl
     *
     * @return PaypalOrder
     */
    public function setCancelUrl($cancelUrl)
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    /**
     * Get cancelUrl
     *
     * @return string
     */
    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }

    /**
     * Set returnUrl
     *
     * @param string $returnUrl
     *
     * @return PaypalOrder
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * Get returnUrl
     *
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return PaypalOrder
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set intent
     *
     * @param string $intent
     *
     * @return PaypalOrder
     */
    public function setIntent($intent)
    {
        $this->intent = $intent;

        return $this;
    }

    /**
     * Get intent
     *
     * @return string
     */
    public function getIntent()
    {
        return $this->intent;
    }
}

