<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Hello World App',
    'import' => array(
        'modules' => array(
            'carcollection'
        )
    ),
    'db' => array(
        'db_car_collection' => array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname' => 'db_car_collection',
            'user' => 'root',
            'password' => 'root',
            'charset' => 'UTF8',
            'formatDate' => '%d/%m/%Y %T',
            'formatTimestamp' => '%d/%mm/%Y %T',
            'formatDateWhere' => '%Y/%m/%d',
            'formatTime' => '%T'
        ),
    ),
    'login' => array(
        'check' => false
    ),
    'sobre' => array(
        'autor' => 'Leonardo Pires',
        'contato' => 'leonardo.pires@ufjf.edu.br'
    )
);
