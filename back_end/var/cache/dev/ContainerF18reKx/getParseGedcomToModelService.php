<?php

namespace ContainerF18reKx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getParseGedcomToModelService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Parser\ParseGedcomToModel' shared autowired service.
     *
     * @return \App\Parser\ParseGedcomToModel
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Parser'.\DIRECTORY_SEPARATOR.'ParseGedcomToModel.php';

        return $container->privates['App\\Parser\\ParseGedcomToModel'] = new \App\Parser\ParseGedcomToModel();
    }
}
