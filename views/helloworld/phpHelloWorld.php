<?php

class PhpHelloWorld extends MContainer {

    public function create()
    {
        parent::create();
        $this->addControl($this->newHelloWorldLabel());
    }


    private function newHelloWorldLabel() {
        $helloWorlLabel = new MLabel();
        $helloWorlLabel->setId("lblMensagem");
        $helloWorlLabel->setBold(true);
        $helloWorlLabel->setText("Hello World em PHP!");

        return $helloWorlLabel;
    }
}