<?php

namespace ContainerOKOrxrY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_PhJRUQService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.PhJR_UQ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.PhJR_UQ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\DataController::deleteGenealogyById' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\DataController::getAllGenealogies' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\DataController::getGenealogyById' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\DataController::renameGenealogyById' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\Files\\ImportGedcomFileController::importGedcomFile' => ['privates', '.service_locator.2UVx68m', 'get_ServiceLocator_2UVx68mService', true],
            'App\\Controller\\RegistrationController::register' => ['privates', '.service_locator.URv18j3', 'get_ServiceLocator_URv18j3Service', true],
            'App\\Controller\\RegistrationController::verifyUserEmail' => ['privates', '.service_locator.kPUOGb8', 'get_ServiceLocator_KPUOGb8Service', true],
            'App\\Controller\\ResetPasswordController::request' => ['privates', '.service_locator.EE0.cm9', 'get_ServiceLocator_EE0_Cm9Service', true],
            'App\\Controller\\ResetPasswordController::reset' => ['privates', '.service_locator.Mhqdd2r', 'get_ServiceLocator_Mhqdd2rService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\DataController:deleteGenealogyById' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\DataController:getAllGenealogies' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\DataController:getGenealogyById' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\DataController:renameGenealogyById' => ['privates', '.service_locator.n.m5dth', 'get_ServiceLocator_N_M5dthService', true],
            'App\\Controller\\Files\\ImportGedcomFileController:importGedcomFile' => ['privates', '.service_locator.2UVx68m', 'get_ServiceLocator_2UVx68mService', true],
            'App\\Controller\\RegistrationController:register' => ['privates', '.service_locator.URv18j3', 'get_ServiceLocator_URv18j3Service', true],
            'App\\Controller\\RegistrationController:verifyUserEmail' => ['privates', '.service_locator.kPUOGb8', 'get_ServiceLocator_KPUOGb8Service', true],
            'App\\Controller\\ResetPasswordController:request' => ['privates', '.service_locator.EE0.cm9', 'get_ServiceLocator_EE0_Cm9Service', true],
            'App\\Controller\\ResetPasswordController:reset' => ['privates', '.service_locator.Mhqdd2r', 'get_ServiceLocator_Mhqdd2rService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\DataController::deleteGenealogyById' => '?',
            'App\\Controller\\DataController::getAllGenealogies' => '?',
            'App\\Controller\\DataController::getGenealogyById' => '?',
            'App\\Controller\\DataController::renameGenealogyById' => '?',
            'App\\Controller\\Files\\ImportGedcomFileController::importGedcomFile' => '?',
            'App\\Controller\\RegistrationController::register' => '?',
            'App\\Controller\\RegistrationController::verifyUserEmail' => '?',
            'App\\Controller\\ResetPasswordController::request' => '?',
            'App\\Controller\\ResetPasswordController::reset' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\DataController:deleteGenealogyById' => '?',
            'App\\Controller\\DataController:getAllGenealogies' => '?',
            'App\\Controller\\DataController:getGenealogyById' => '?',
            'App\\Controller\\DataController:renameGenealogyById' => '?',
            'App\\Controller\\Files\\ImportGedcomFileController:importGedcomFile' => '?',
            'App\\Controller\\RegistrationController:register' => '?',
            'App\\Controller\\RegistrationController:verifyUserEmail' => '?',
            'App\\Controller\\ResetPasswordController:request' => '?',
            'App\\Controller\\ResetPasswordController:reset' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
