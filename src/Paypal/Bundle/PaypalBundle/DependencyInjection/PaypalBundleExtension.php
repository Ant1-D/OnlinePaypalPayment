<?php

namespace Paypal\Bundle\PaypalBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class PaypalBundleExtension extends Extension
{
    /**
     *
     * @param ContainerBuilder $container
     */
    public function load(ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('api_config.yml');
    }
}
