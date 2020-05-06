<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'pgsql',
                    'dsn' => 'pgsql:host=localhost;port=5432;dbname=crc',
                    'user' => 'postgres',
                    'password' => 'postgres',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ]
    ]
];
