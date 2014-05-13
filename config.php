<?php

return array(
    'dsn'      => 'mysql:dbname=guestbook;server=localhost;charset=utf8',
    'username' => 'root',
    'password' => 'mik',
    'options'  => array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ),
    'templatePath' => realpath(__DIR__ . '/templates')
);
