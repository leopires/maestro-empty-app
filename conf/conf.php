<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Hello World App',
    'import' => array(
        'modules' => array(
            'carcollection'
        )
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
