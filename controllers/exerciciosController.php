<?php

class ExerciciosController extends MController
{
    public function exercicioUm()
    {
        $this->data->nome = "Nome: Leonardo";
        $this->data->sobrenome = "Sobrenome: Pires";
        $this->data->nascimento = "Nascido em: 04/03/1985";
        $this->render();
    }

    public function exercicioDois()
    {
        $this->data->action = "@hello-world/exercicios/exercicioDoisData";
        $this->render();
    }

    public function exercicioDoisData()
    {
        mdump("##");
        mdump("Ojeto data vindo do POST: ");
        mdump($this->data);
        mdump("##");
        $this->data->nome = $this->data->txtNome;
        $this->data->sobrenome = $this->data->txtSobrenome;
        $this->data->nascimento = $this->data->txtDataNascimento;
        mdump("$$");
        mdump("Ojeto data antes de ser enviado para View");
        mdump($this->data);
        mdump("$$");
        $this->render();
    }
}
