<?php
/**
 * $_comment
 *
 * @category   Maestro
 * @package    UFJF
 * @subpackage $_package
 * @copyright  Copyright (c) 2003-2012 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version    
 * @since      
 */

Manager::import("carcollection\models\*");

class ModelController extends MController {

    public function main() {
        $this->render("formBase");
    }

    public function formFind() {
        $model= new Model($this->data->id);
        $filter->model = $this->data->model;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@carcollection/model/save';
        $this->render();
    }

    public function formObject() {
        $this->data->model = Model::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $model= new Model($this->data->id);
        $this->data->model = $model->getData();
        $this->data->model->idBrandDesc = $model->getBrand()->getDescription();
	
        $this->data->action = '@carcollection/model/save/' .  $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $model = new Model($this->data->id);
        $ok = '>carcollection/model/delete/' . $model->getId();
        $cancelar = '>carcollection/model/formObject/' . $model->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Model [{model->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Model();
        $filter->model = $this->data->model;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
            $model = new Model($this->data->model);
            $model->save();
            $go = '>carcollection/model/formObject/' . $model->getId();
            $this->renderPrompt('information','OK',$go);
    }

    public function delete() {
            $model = new Model($this->data->id);
            $model->delete();
            $go = '>carcollection/model/formFind';
            $this->renderPrompt('information',"Model [{$this->data->model}] removido.", $go);
    }

}