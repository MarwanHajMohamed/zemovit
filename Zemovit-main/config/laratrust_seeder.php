<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => false,

    'roles_structure' => [
        'superadministrator' => [
            'admins' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'profile' => 'r,u',
            'change-password' => 'r,u',


            'seo-settings' => 'c,r,u,d',
            'home-settings' => 'c,r,u,d',
            "arrangements"=>'c,r,u,d',
            'banners' => 'c,r,u,d',
            'abouts' => 'c,r,u,d',
//            'faqs' => 'c,r,u,d',
            'why-choose-us'=>'c,r,u,d',
            'therapeutic_areas'=>'c,r,u,d',
            'products-benefits'=>'c,r,u,d',
            'products-details'=>'c,r,u,d',
            'features' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'contacts' => 'r,d',
            'missions'=>'c,r,u,d',
            'visions'=>'c,r,u,d',
            'blogs'=>'c,r,u,d',
            'blogs-images'=>'c,r,u,d'
        

            // new permissions

        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
