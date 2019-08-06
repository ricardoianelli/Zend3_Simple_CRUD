<?php

namespace Usuario;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'usuario' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/usuario[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zAZ0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\UsuarioController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
          //  Controller\UsuarioController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'usuario' => __DIR__ . '/../view',
        ],
    ],
    'db' => [
        'driver' => 'Pdo_Mysql',
        'database' => 'Zend',
        'username' => 'root',
        'password' => '',
        'hostname' => 'localhost',
    ],
];
