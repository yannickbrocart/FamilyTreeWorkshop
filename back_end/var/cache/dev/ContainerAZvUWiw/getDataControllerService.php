<?php

namespace ContainerAZvUWiw;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\DataController' shared autowired service.
     *
     * @return \App\Controller\DataController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'DataController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-bundle'.\DIRECTORY_SEPARATOR.'Security.php';

        $container->services['App\\Controller\\DataController'] = $instance = new \App\Controller\DataController(new \Symfony\Bundle\SecurityBundle\Security(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'security.token_storage' => ['privates', 'security.token_storage', 'getSecurity_TokenStorageService', false],
            'security.authorization_checker' => ['privates', 'security.authorization_checker', 'getSecurity_AuthorizationCheckerService', false],
            'security.authenticator.managers_locator' => ['privates', 'security.authenticator.managers_locator', 'getSecurity_Authenticator_ManagersLocatorService', true],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'security.firewall.map' => ['privates', 'security.firewall.map', 'getSecurity_Firewall_MapService', false],
            'security.user_checker' => ['privates', 'security.user_checker', 'getSecurity_UserCheckerService', true],
            'security.firewall.event_dispatcher_locator' => ['privates', 'security.firewall.event_dispatcher_locator', 'getSecurity_Firewall_EventDispatcherLocatorService', true],
            'security.csrf.token_manager' => ['privates', 'security.csrf.token_manager', 'getSecurity_Csrf_TokenManagerService', true],
        ], [
            'security.token_storage' => '?',
            'security.authorization_checker' => '?',
            'security.authenticator.managers_locator' => '?',
            'request_stack' => '?',
            'security.firewall.map' => '?',
            'security.user_checker' => '?',
            'security.firewall.event_dispatcher_locator' => '?',
            'security.csrf.token_manager' => '?',
        ]), ['dev' => NULL, 'login' => new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'security.authenticator.json_login.login' => ['privates', 'security.authenticator.json_login.login', 'getSecurity_Authenticator_JsonLogin_LoginService', true],
        ], [
            'security.authenticator.json_login.login' => '?',
        ]), 'api' => NULL]));

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\DataController', $container));

        return $instance;
    }
}
