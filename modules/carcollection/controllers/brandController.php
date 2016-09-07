<?php

class BrandController extends MController {

    public function main() {
        $this->render("formBase");
    }
    
    public function formFind() {
        $brand = new Brand($this->data->id);
        $filter->brand = $this->data->brand;
        $this->data->query = $brand->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function formNew() {
        $this->data->action = '@carcollection/brand/save';
        $this->render();
    }

    public function formObject() {
        $this->data->brand = Brand::create($this->data->id)->getData();
        $this->render();
    }

    public function formUpdate() {
        $brand = new Brand($this->data->id);
        $this->data->brand = $brand->getData();

        $this->data->action = '@carcollection/brand/save/' . $this->data->id;
        $this->render();
    }

    public function formDelete() {
        $brand = new Brand($this->data->id);
        $ok = '>carcollection/brand/delete/' . $brand->getId();
        $cancelar = '>carcollection/brand/formObject/' . $brand->getId();
        $this->renderPrompt('confirmation', "Confirma remoção do Brand [{brand->getDescription()}] ?", $ok, $cancelar);
    }

    public function lookup() {
        $model = new Brand();
        $filter->brand = $this->data->brand;
        $this->data->query = $model->listByFilter($filter)->asQuery();
        $this->render();
    }

    public function save() {
        $brand = new Brand($this->data->brand);
        $brand->save();
        $go = '>carcollection/brand/formObject/' . $brand->getId();
        $this->renderPrompt('information', 'OK', $go);
    }

    public function delete() {
        $brand = new Brand($this->data->id);
        $brand->delete();
        $go = '>carcollection/brand/formFind';
        $this->renderPrompt('information', "Brand [{$this->data->brand}] removido.", $go);
    }

}