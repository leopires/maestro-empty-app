<?php

namespace carcollection\models\map;

class BrandMap extends \MBusinessModel {


    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'db_car_collection',
            'table' => 'Brands',
            'attributes' => array(
                'idBrand' => array('column' => 'idBrand', 'key' => 'primary', 'idgenerator' => 'identity', 'type' => 'integer'),
                'brand' => array('column' => 'brand', 'type' => 'string'),
            ),
            'associations' => array(
                'models' => array('toClass' => 'carcollection\models\Model', 'cardinality' => 'oneToMany', 'keys' => 'idBrand:idBrand'),
            )
        );
    }


    protected $idBrand;

    protected $brand;

    protected $models;


    public function getIdBrand() {
        return $this->idBrand;
    }

    public function setIdBrand($value) {
        $this->idBrand = $value;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($value) {
        $this->brand = $value;
    }

    public function getModels() {
        if (is_null($this->models)) {
            $this->retrieveAssociation("models");
        }
        return $this->models;
    }

    public function setModels($value) {
        $this->models = $value;
    }

    public function getAssociationModels() {
        $this->retrieveAssociation("models");
    }


}

?>