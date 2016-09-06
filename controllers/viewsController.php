<?php

class ViewsController extends MController {

    const ACTION_FORM_SAMPLE = ">hello-world/views/formSample";

    public function viewFromPHPFile() {
    	$this->render();
    }

    public function viewFromXMLFile() {
        $this->render();
    }

    public function formSample() {
        $this->render();
    }

    public function showSubmitedFormData() {
        mdump("Dummp do data:");
        mdump($this->data);
        $mensagem = "Veículo [{$this->data->txtMarca} {$this->data->txtModelo}/{$this->data->txtAno}] incluído com sucesso!";
        $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, $mensagem, self::ACTION_FORM_SAMPLE);
    }
}
