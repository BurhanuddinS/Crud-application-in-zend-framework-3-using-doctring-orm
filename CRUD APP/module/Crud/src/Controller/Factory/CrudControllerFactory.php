<?php
namespace Crud\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Crud\Controller\CrudController;
use Crud\Service\EmpManager;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class CrudControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, 
                     $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $empManager = $container->get(EmpManager::class);
        // Instantiate the controller and inject dependencies
        return new CrudController($entityManager, $empManager);
    }
}