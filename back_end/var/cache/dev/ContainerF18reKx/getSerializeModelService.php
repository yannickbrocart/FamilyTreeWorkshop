<?php

namespace ContainerF18reKx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSerializeModelService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Serializer\SerializeModel' shared autowired service.
     *
     * @return \App\Serializer\SerializeModel
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Serializer'.\DIRECTORY_SEPARATOR.'SerializeModel.php';

        $a = ($container->privates['debug.serializer'] ?? self::getDebug_SerializerService($container));

        if (isset($container->privates['App\\Serializer\\SerializeModel'])) {
            return $container->privates['App\\Serializer\\SerializeModel'];
        }

        return $container->privates['App\\Serializer\\SerializeModel'] = new \App\Serializer\SerializeModel($a);
    }
}
