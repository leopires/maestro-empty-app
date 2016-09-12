<?php

namespace carcollection\models;

class Model extends map\ModelMap {

    public static function config() {
        return array(
            'log' => array(),
            'validators' => array(
                'model' => array('notnull', 'notblank'),
                'productionStartYear' => array('notnull', 'notblank'),
                'idBrand' => array('notnull', 'notblank'),
            ),
            'converters' => array(
                'model' => array('case' => 'upper')
            )
        );
    }

    public function getDescription() {

        return $this->getBrand()->getBrand() . " - " . $this->getModel();

    }

    public function listByFilter($filter) {
        $criteria = $this->getCriteria()
            ->select('idModel')
            ->select('model')
            ->select('brand.brand')
            ->select('productionStartYear')
            ->select('productionEndYear')
            ->orderBy('model');
        if ($filter->model) {
            $criteria->where("model LIKE '{$filter->model}%'");
        }
        return $criteria;
    }

    public function isInProduction() {
        if (!$this->getProductionEndYear())
            return true;
    }

}

?>