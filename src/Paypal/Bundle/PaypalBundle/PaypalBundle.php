<?php

namespace Paypal\Bundle\PaypalBundle;

use Paypal\Bundle\PaypalBundle\DependencyInjection\PaypalBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PaypalBundle extends Bundle
{

    public function getContainerExtension()
    {
        return new PaypalBundleExtension();
    }
}
