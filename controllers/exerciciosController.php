<?php

class ExerciciosController extends MController
{
    public function exercicioUm() {
        $this->data->nome = "Nome: Leonardo";
        $this->data->sobrenome = "Sobrenome: Pires";
        $this->data->nascimento =  "Nascido em: 04/03/1985";
        $this->render();
    }

    public function exercicioDois() {
        $moduleMain = ">helloworld/main/main";
        $this->renderPrompt(MPrompt::MSG_TYPE_ALERT, "Você precisa implementar.", $moduleMain);
    }
}
