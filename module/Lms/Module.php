<?php
namespace Lms;

use Zend\Uri\Uri;
use Zend\Uri\UriFactory;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
    public function onBootstrap($e)
    {
        $app = $e->getTarget();
        $services = $app->getServiceManager();

        //Attah to view
        $view = $services->get('View');
        //Attach to router mvc
        $em = $app->getEventManager();

        // Origin when is an IOS device
        UriFactory::registerScheme('ionic', Uri::class);
    }
}
