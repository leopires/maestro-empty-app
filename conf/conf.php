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
            'host' => 'cursomaestro.ufjf.br',
            'dbname' => 'db_car_collection',
            'user' => 'root',
            'password' => '123456',
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
        'descricao' => 'Modulo para apresentação dos recursos do Framework Maestro.',
        'autor' => 'Leonardo Pires',
        'contato' => 'leonardo.pires@ufjf.edu.br',
        'versao' => '0.1 Beta'
    )
);
