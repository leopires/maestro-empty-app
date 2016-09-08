<?php

Manager::import('helloworld\models\World');

class HelloWorldController extends MController {

    public function htmlHelloWorld() {
    	$this->render();
    }

    public function xmlHelloWorld() {
        $this->render();
    }

    public function phpHelloWorld() {
        $this->render();
    }

    public function modelHelloWorld() {
        $world = new World();
        $this->data->mensagem = $world->getHelloMessage();
        $this->render();
    }
}
