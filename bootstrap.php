<?php

require_once __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config.php';
$pdo    = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);


return array(
    'pdo'          => $pdo,
    'templatePath' => $config['templatePath']
);
