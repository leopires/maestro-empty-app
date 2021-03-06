<?php

/**
 * Funcionamento:
 *
 * chave => array("Label", "action", "Imagem/Icone", "TRANSACAO", DIREITO_ACESSO , array(SUBITENS))
 *
 * Para saber mais informações a respeito do arquivo de Actions:
 * Ver: http://[instalacao-maestro]/index.php/guia/controller/actionsfile
 */

return array(
    'hello-world-app' => array('main', '', '', '', null, array(
        'helloWorld' => array('Hello World', '', '', '', null, array(
            'hello-world-html' => array('Hello World em HTML', 'helloWorld/htmlHelloWorld', 'iconHelloWorld', '', null, array()),
            'hello-world-xml' => array('Hello World em XML', 'helloWorld/xmlHelloWorld', 'iconHelloWorld', '', null, array()),
            'hello-world-php' => array('Hello World em PHP', 'helloWorld/phpHelloWorld', 'iconHelloWorld', '', null, array()),
            'hello-world-from-model' => array('Hello World de um Model', 'helloWorld/modelHelloWorld', 'iconHelloWorld', '', null, array())
        )
        ),
        'camadaApresentacao' => array('Camada de Apresentação', '', '', '', null, array(
            'apresentacao-view-php' => array('View de um arquivo PHP', 'views/viewFromPHPFile', 'iconUI', '', null, array()),
            'apresentacao-view-xml' => array('View de um arquivo XML', 'views/viewFromXMLFile', 'iconUI', '', null, array()),
            'apresentacao-formulario' => array('Exemplo de Formulário', 'views/formSample', 'iconUI', '', null, array()),
        )
        ),
        'camadaModel' => array('Camada Model', '', '', '', null, array(
            'carCollectionModule' => array('Car Collection', 'carcollection/main', 'iconCar', '', null, array(
                'brand' => array('Brand', 'carcollection/brand/main', 'iconCar', '', null, array()),
                'model' => array('Model', 'carcollection/model/main', 'iconCar', '', null, array()),
                'car' => array('Car', 'carcollection/car/main', 'iconCar', '', null, array()),
                'member' => array('Member', 'carcollection/member/main', 'iconCar', '', null, array()),
            )
            )
        )
        ),
        'exercicios' => array('Exercicios', '', '', '', null, array(
            'exercicio-um' => array('Exercício 01', 'exercicios/exercicioUm', 'iconSettings', '', null, array()),
            'exercicio-dois' => array('Exercício 02', 'exercicios/exercicioDois', 'iconSettings', '', null, array())
        )
        ),
        'sobre' => array('Sobre', '', '', '', null, array(
            'sobre-hello-world-app' => array('Sobre', 'helloworld/main/sobre', '', '', null, array()),
        )
        ),
    )
    )
);
?>