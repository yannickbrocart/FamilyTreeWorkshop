<?php

namespace ContainerAZvUWiw;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLexikJwtAuthentication_JwtManagerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'lexik_jwt_authentication.jwt_manager' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'lexik'.\DIRECTORY_SEPARATOR.'jwt-authentication-bundle'.\DIRECTORY_SEPARATOR.'Services'.\DIRECTORY_SEPARATOR.'JWTTokenManagerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'lexik'.\DIRECTORY_SEPARATOR.'jwt-authentication-bundle'.\DIRECTORY_SEPARATOR.'Services'.\DIRECTORY_SEPARATOR.'JWTManager.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'lexik'.\DIRECTORY_SEPARATOR.'jwt-authentication-bundle'.\DIRECTORY_SEPARATOR.'Services'.\DIRECTORY_SEPARATOR.'PayloadEnrichmentInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'lexik'.\DIRECTORY_SEPARATOR.'jwt-authentication-bundle'.\DIRECTORY_SEPARATOR.'Services'.\DIRECTORY_SEPARATOR.'PayloadEnrichment'.\DIRECTORY_SEPARATOR.'ChainEnrichment.php';

        $a = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->services['lexik_jwt_authentication.jwt_manager'])) {
            return $container->services['lexik_jwt_authentication.jwt_manager'];
        }

        return $container->services['lexik_jwt_authentication.jwt_manager'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager(($container->services['lexik_jwt_authentication.encoder'] ?? $container->load('getLexikJwtAuthentication_EncoderService')), $a, 'username', new \Lexik\Bundle\JWTAuthenticationBundle\Services\PayloadEnrichment\ChainEnrichment([]));
    }
}