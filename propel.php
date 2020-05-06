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
                        'charset' => 'utf8',
                        'queries' => [
                            'utf8' => "SET NAMES 'UTF8'"
                        ]
                    ]
                ],
                'crc' => [
                    'adapter' => 'pgsql',
                    'dsn' => 'pgsql:host=localhost;port=5432;dbname=crc',
                    'user' => 'postgres',
                    'password' => 'postgres',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'crc',
            'connections' => ['crc']
        ],
        'generator' => [
            'defaultConnection' => 'crc',
            'connections' => ['crc']
        ]
    ]
];
