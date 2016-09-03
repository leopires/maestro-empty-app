<?php

include_once Manager::getConf("basePath") . "/models/World.php";

class HelloWorldController extends MController {

    /**
     * Convenção sobre configuração.
     * https://pt.wikipedia.org/wiki/Conven%C3%A7%C3%A3o_sobre_configura%C3%A7%C3%A3o
     */

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
