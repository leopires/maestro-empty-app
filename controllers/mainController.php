<?php

class MainController extends MController {

    public function main() {
        $this->render();
    }

    public function sobre() {
        $this->data->descricao = Manager::getConf("sobre.descricao");
        $this->data->autor = Manager::getConf("sobre.autor");
        $this->data->contato = Manager::getConf("sobre.contato");
        $this->data->contato = Manager::getConf("sobre.contato");
        $this->data->versao = Manager::getConf("sobre.versao");
        $this->render("sobre/sobre");
    }
}
