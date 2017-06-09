<?php

class ViewsController extends MController {

    const ACTION_FORM_SAMPLE = ">hello-world/views/formSample";

    public function viewFromPHPFile() {
    	$this->render();
    }

    public function viewFromXMLFile() {

        for ($i = 2000; $i < 2051; $i++) {
            $options["'$i'"] = "Ano de " . $i;
        }

        $this->data->anos = $options;
        mdump("Opções:");
        mdump($this->data->anos);
        $this->data->anoSelecionado = "'2034'";
        mdump("Selecionado: " . $this->data->anoSelecionado);
        $this->render();
    }

    public function formSample() {
        $this->data->action = "@hello-world/views/showSubmitedFormData";
        $this->render();
    }

    public function showSubmitedFormData() {
        mdump("Dummp do data:");
        mdump($this->data);
        $mensagem = "Veículo [{$this->data->txtMarca} {$this->data->txtModelo}/{$this->data->txtAno}] incluído com sucesso!";
        $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, $mensagem, self::ACTION_FORM_SAMPLE);
    }
}
