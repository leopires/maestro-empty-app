<?php

class ExerciciosController extends MController
{
    public function exercicioUm() {
        $this->data->nome = "Nome: Leonardo";
        $this->data->sobrenome = "Sobrenome: Pires";
        $this->data->nascimento =  "Nascido em: 04/03/1985";
        $this->render();
    }
}
