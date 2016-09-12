<?php

use carcollection\models\Model as Model;

class ModelController extends MController {

    const ACTION_MODULE_MAIN = ">carcollection/main";
    const ACTION_FORM_OBJECT = ">carcollection/model/formObject/";
    const ACTION_FORM_FIND = ">carcollection/model/formFind";
    const ACTION_FORM_NEW = ">carcollection/model/formNew";
    const ACTION_FORM_SAVE = "@carcollection/model/save/";
    const ACTION_FORM_DELETE = "@carcollection/model/delete/";

    public function main() {
        $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
    }

    public function formFind() {

        // Limpando o valor que vem do $this->data para evitar SQL Injection.
        $modelDescription = filter_var($this->data->model, FILTER_SANITIZE_STRING);
        // Montando um objeto plano.
        $filter = new stdClass();
        // Criando uma propriedade e setando valor para ela neste objeto plano, criado anteriormente..
        $filter->model = $modelDescription;

        try {
            // Executando a busca no banco de dados e preenchendo a variável para a view.
            $this->data->query = Model::create()->listByFilter($filter)->asQuery();
            // Chamando a view: formfind.xml
            $this->render();
        } catch (Exception $ex) {
            // Tratando erros. Informo que aconteceu um erro e retorno para a action main do módulo.
            // Obs. Não é uma boa prática mostrar erros da linguagem de programação para o usuário.
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to list the Models.", self::ACTION_MODULE_MAIN);
        }
    }

    public function formNew() {
        // Configurando a action do botão do formulário: formNew.xml.
        $this->data->action = self::ACTION_FORM_SAVE;
        $this->render();
    }

    public function formObject() {
        try {
            $model = Model::create($this->data->id);
            if(!$model->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $this->data->model = $model->getData();
                $this->render();
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to retrieve Model data.", self::ACTION_FORM_FIND);
        }
    }

    public function formUpdate() {
        try {
            $model = Model::create($this->data->id);
            if(!$model->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $this->data->model = $model->getData();
                $this->data->model->lkpBrand = $model->getBrand()->getBrand();
                $this->data->action = self::ACTION_FORM_SAVE . $model->getIdModel();
                $this->render();
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to retrieve and load Model data.", self::ACTION_FORM_FIND);
        }
    }

    public function formDelete() {
        try {
            $model = Model::create($this->data->id);
            if(!$model->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $goToFormObject = self::ACTION_FORM_OBJECT . $model->getIdModel();
                $goToDelete = self::ACTION_FORM_DELETE . $model->getIdModel();
                $this->renderPrompt(MPrompt::MSG_TYPE_CONFIRMATION, "Are you sure about delete this Model?", $goToDelete, $goToFormObject);
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to delete Model data.", self::ACTION_FORM_FIND);
        }
    }

    public function save() {

        mdump('Dump do $this->data->model. Olhar no formulário: model::[campo]');
        mdump($this->data->model);

        try {
            $model = Model::create($this->data->id);
            $model->setData($this->data->model);
            $model->save();
            $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Model {$model->getModel()} saved with success!", self::ACTION_FORM_FIND);
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to save the Model data. Please try again or contact the support.", self::ACTION_FORM_NEW);
        }
    }

    public function delete() {
        try {
            $model = Model::create($this->data->id);
            if(!$model->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $model->delete();
                $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Model deleted with success!?", self::ACTION_FORM_FIND);
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to delete Model data.", self::ACTION_FORM_FIND);
        }
    }

}