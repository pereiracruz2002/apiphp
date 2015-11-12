<?php
return array(
    'db' => array(
        'adapters' => array(
            'dbAdapter' => array(
                'database' => 'apigility_ionic_ok',
                'driver' => 'PDO_Mysql',
                'username' => 'root',
                'password' => 'senha',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authentication' => array(
            'adapters' => array(
                'oauthadapter' => array(
                    'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
                    'storage' => array(
                        'adapter' => 'pdo',
                        'dsn' => 'mysql:host=localhost;dbname=apigility_ionic_ok;',
                        'route' => '/oauth',
                        'username' => 'root',
                        'password' => 'senha',
                    ),
                ),
            ),
        ),
    ),
);
