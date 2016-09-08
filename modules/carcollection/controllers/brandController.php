<?php

use carcollection\models\Brand as Brand;

class BrandController extends MController {

    const ACTION_MODULE_MAIN = ">carcollection/main";
    const ACTION_FORM_OBJECT = ">carcollection/brand/formObject";
    const ACTION_FORM_FIND = ">carcollection/brand/formFind";
    const ACTION_SAVE = "@carcollection/brand/save";
    const ACTION_DELETE = "@carcollection/brand/delete/";


    public function main() {
        $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
    }

    public function formFind() {

        try {
            $brand = $this->data->txtBrand;
            $this->data->brands = Brand::create()->listByBrand($brand)->asQuery();
            $this->render();
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to list the Brands.", self::ACTION_MODULE_MAIN);
        }
    }

    public function formNew() {
        $this->data->action = self::ACTION_SAVE;
        $this->render();
    }

    public function formObject() {
        try {
            $brand = Brand::create($this->data->id);
            if(!$brand->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            }else {
                $this->data->brand = $brand->getData();
                $this->render();
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to read the Brand.", self::ACTION_FORM_FIND);
        }
    }

    public function formUpdate() {
        try {
            $brand = Brand::create($this->data->id);
            if(!$brand->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            }else {
                $this->data->brand = $brand->getData();
                $this->data->action = self::ACTION_SAVE . "/" . $this->data->id;
                $this->render();
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to load the Brand data.", self::ACTION_FORM_FIND);
        }
    }

    public function formDelete() {
        try {
            $brand = Brand::create($this->data->id);
            if(!$brand->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $noAction = self::ACTION_FORM_OBJECT . "/" . $this->data->id;
                $yesAction = self::ACTION_DELETE . $this->data->id;
                $this->renderPrompt(MPrompt::MSG_TYPE_CONFIRMATION, "Are you sure about remove Brand '{$brand->getBrand()}'?",
                    $yesAction, $noAction);
            }
        } catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to retrieve the Brand data.". self::ACTION_FORM_FIND);
        }
    }

    public function delete() {
        try {
            $brand = Brand::create($this->data->id);
            if(!$brand->isPersistent()) {
                $this->redirect(Manager::getURL(self::ACTION_FORM_FIND));
            } else {
                $brand->delete();
                $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Brand was removed with success!", self::ACTION_FORM_FIND);
            }
        } catch (Exception $ex) {
            $onDeleteError = self::ACTION_FORM_OBJECT . "/" . $this->data->id;
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to delete Brand data.", $onDeleteError);
        }
    }

    public function save() {
        try {
            $brand = Brand::create($this->data->id);
            $brand->setBrand($this->data->brand->brand);
            $brand->save();
            $this->renderPrompt(MPrompt::MSG_TYPE_INFORMATION, "Brand data saved!", self::ACTION_FORM_FIND);
        } catch (EDataValidationException $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "Cannot save Brand due to invalid data.", self::ACTION_FORM_FIND);
        }catch (Exception $ex) {
            $this->renderPrompt(MPrompt::MSG_TYPE_ERROR, "An error occurs while trying to save the Brands data.", self::ACTION_FORM_FIND);
        }
    }

}