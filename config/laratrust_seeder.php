<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'owner' => [
            'roles'                       => 'c,r,u,d',
            'admins'                      => 'c,r,u,d',
            'users'                       => 'c,r,u,d',
            'videos'                       => 'c,r,u,d',
            'exams'                       => 'c,r,u,d',
            'contact_us'                  => 'r,d',
            // 'settings'                    => 'r,u',




        ],

        'supervisor' => [
            'exams'                       => 'c,r,u,d',
        ] ,


    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ],

    'roles_structure_arabic' => [
        'superadmin'    => 'مشرف عام',
        'admin'         => 'مشرف',
        'user'          => 'مستخدم'
    ],

    'roles_structure_color' => [
        'superadmin'    => '#F00',
        'admin'         => '#00F',
        'user'          => '#080'
    ],
];
