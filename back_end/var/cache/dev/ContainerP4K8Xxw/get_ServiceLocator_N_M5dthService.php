<?php

namespace ContainerP4K8Xxw;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_N_M5dthService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.n.m5dth' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.n.m5dth'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'gedcomRepository' => ['privates', 'App\\Repository\\GedcomRepository', 'getGedcomRepositoryService', true],
            'serializeModel' => ['privates', 'App\\Serializer\\SerializeModel', 'getSerializeModelService', true],
        ], [
            'gedcomRepository' => 'App\\Repository\\GedcomRepository',
            'serializeModel' => 'App\\Serializer\\SerializeModel',
        ]);
    }
}
