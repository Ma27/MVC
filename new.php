<?php

$app = require __DIR__ . '/bootstrap.php';

$controller = new Controller_Guestbook($app['pdo'], $app['templatePath']);
$controller->before();
$controller->newEntry();
$controller->newEntry();
$controller->after();
