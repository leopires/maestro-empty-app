<?php

return array(
    'hello-world-app' => array('main', '', '', '', null, array(
        'tiposHelloWorld' => array('Hello World', '', '', '', null, array(
            'hello-world-html' => array('Hello World em HTML', 'hello-world/helloWorld/htmlHelloWorld', 'iconHelloWorld', '', null, array()),
            'hello-world-xml' => array('Hello World em XML', 'hello-world/helloWorld/xmlHelloWorld', 'iconHelloWorld', '', null, array()),
            'hello-world-php' => array('Hello World em PHP', 'hello-world/helloWorld/phpHelloWorld', 'iconHelloWorld', '', null, array()),
            'hello-world-from-model' => array('Hello World de um Model', 'hello-world/helloWorld/modelHelloWorld', 'iconHelloWorld', '', null, array())
        )
        ),
        'camadaApresentacao' => array('Camada de Apresentação', '', '', '', null, array(
            'apresentacao-view-php' => array('View de um arquivo PHP', 'hello-world/views/viewFromPHPFile', 'iconUI', '', null, array()),
            'apresentacao-view-xml' => array('View de um arquivo XML', 'hello-world/views/viewFromXMLFile', 'iconUI', '', null, array()),
            'apresentacao-formulario' => array('Exemplo de Formulário', 'hello-world/views/formSample', 'iconUI', '', null, array()),
        )
        ),
        'exercicios' => array('Exercicios', '', '', '', null, array(
            'exercicio-um' => array('Exercício 01', 'hello-world/exercicios/exercicioUm', 'iconHelloWorld', '', null, array()),
            'exercicio-dois' => array('Exercício 02', 'hello-world/exercicios/exercicioDois', 'icoHelloWorld', '', null, array())
        )
        ),
    )
    )
);
?>