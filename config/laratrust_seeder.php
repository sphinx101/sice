<?php

return [
    'role_structure' => [
        'admin' => [
                                 'supervisor' => 'c,r,u,d',
                                 'director' => 'c,r,u,d',
                                 'docente' => 'c,r,u,d',
                                 'alumno'  => 'c,r,u,d'
                                ],
        'supervisor' => [
                            'director' => 'c,r,u,d',
                            'docente' => 'c,r,u,d'

                           ],
        'director' => [
                   'docente' => 'r,u',
                   'alumno'  => 'c,r,u,d'
                  ],
        'docente' =>[
                   'alumno' => 'r,u'
                    ],
        'alumno' =>[
                   'alumno' => 'r'
                   ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
                            'c' => 'create',
                            'r' => 'read',
                            'u' => 'update',
                            'd' => 'delete'
                         ]
];
