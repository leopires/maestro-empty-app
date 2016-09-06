<?php

class ViewFromPHPFile extends MContainer{

    public function create()
    {
        parent::create();
        $this->addControl($this->createPanel());
    }

    private function createPanel() {

        $panel = new MPanel();
        $panel->setTitle("Dados do Veículo");

        $txtlblMarca = new MTextLabel();
        $txtlblMarca->setId("txtlblMarca");
        $txtlblMarca->setLabel("Marca:");
        $txtlblMarca->setText("Toyota");
        $txtlblMarca->setBold(true);

        $controlesDadosVeiculo[] = $txtlblMarca;

        $txtlblModelo = new MTextLabel();
        $txtlblModelo->setId("txtlblModelo");
        $txtlblModelo->setLabel("Modelo:");
        $txtlblModelo->setText("Corolla Gli 1.8 16v Automático");
        $txtlblModelo->setBold(true);

        $controlesDadosVeiculo[] = $txtlblModelo;

        $txtlblAno = new MTextLabel();
        $txtlblAno->setId("txtlblAno");
        $txtlblAno->setLabel("Ano:");
        $txtlblAno->setText("2010 / 2011");
        $txtlblAno->setBold(true);

        $controlesDadosVeiculo[] = $txtlblAno;

        $verticalContainer = new MVContainer();
        $verticalContainer->setControls($controlesDadosVeiculo);

        $panel->addControl($verticalContainer);

        return $panel;
    }

}