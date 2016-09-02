<?php

class PhpHelloWorld extends MContainer {

    public function create()
    {
        parent::create();
        $this->addControl($this->newHelloWorldLabel());
    }


    private function newHelloWorldLabel() {
        $helloWorlLabel = new MLabel();
        $helloWorlLabel->setId("lblHelloWorld");
        $helloWorlLabel->setBold(true);
        $helloWorlLabel->setText("Hello World in PHP.");

        return $helloWorlLabel;
    }
}