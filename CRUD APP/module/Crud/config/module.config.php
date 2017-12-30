<?php
namespace Crud;

use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'controllers' => [
        'factories' => [
            Controller\CrudController::class => 
                            Controller\Factory\CrudControllerFactory::class,    
        ],
    ],
    'router' => [
        'routes' => [
            'crud' => [
                'type'    => \Zend\Router\Http\Segment::class,
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/crud[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller'    => Controller\CrudController::class,
                        'action'        => 'index',
                    ]
                    ]
                    ],

            'delete' => [    
                'type'    => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route'    => '/crud[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller'    => Controller\CrudController::class,
                        'action'        => 'index',
                         ]
                    ]
            ],
            'edit' => [    
                'type'    => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route'    => '/crud[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller'    => Controller\CrudController::class,
                        'action'        => 'index',
                         ]
                    ]
            ],
            'add' => [    
                'type'    => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route'    => '/crud[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller'    => Controller\CrudController::class,
                        'action'        => 'index',
                         ]
                    ]
            ]
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'crud' => __DIR__ . '/../view/',
        ],
    ],
      'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ], 
    'service_manager' => [
        //...
        'factories' => [
            Service\EmpManager::class => Service\Factory\EmpManagerFactory::class,
        ],
    ],
];
