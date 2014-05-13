<?php

$app = require __DIR__ . '/bootstrap.php';

$controller = new Controller_Guestbook($app['pdo'], $app['templatePath']);
$action     = isset($_GET['action']) ? $_GET['action'] : 'list';

$controller->before();

if ($action === 'list') {
    $controller->listEntries();
}

if ($action === 'new') {
    $controller->newEntry();
}

$controller->after();
