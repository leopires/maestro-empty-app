<?php

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
            'apresentacao-view-php' => array('View de um arquivo PHP', 'helloworld/views/viewFromPHPFile', 'iconUI', '', null, array()),
            'apresentacao-view-xml' => array('View de um arquivo XML', 'helloworld/views/viewFromXMLFile', 'iconUI', '', null, array()),
            'apresentacao-formulario' => array('Exemplo de Formulário', 'helloworld/views/formSample', 'iconUI', '', null, array()),
        )
        ),
        'exercicios' => array('Exercicios', '', '', '', null, array(
            'exercicio-um' => array('Exercício 01', 'helloworld/exercicios/exercicioUm', 'iconSettings', '', null, array()),
            'exercicio-dois' => array('Exercício 02', 'helloworld/exercicios/exercicioDois', 'iconSettings', '', null, array())
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