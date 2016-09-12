<?php

namespace carcollection\models\map;

class ModelMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'db_car_collection',
            'table' => 'Models',
            'attributes' => array(
                'idModel' => array('column' => 'idModel','key' => 'primary','idgenerator' => 'identity','type' => 'integer'),
                'model' => array('column' => 'model','type' => 'string'),
                'productionStartYear' => array('column' => 'productionStartYear','type' => 'integer'),
                'productionEndYear' => array('column' => 'productionEndYear','type' => 'integer'),
                'idBrand' => array('column' => 'idBrand','key' => 'foreign','type' => 'integer'),
            ),
            'associations' => array(
                'brand' => array('toClass' => 'carcollection\models\Brand', 'cardinality' => 'oneToOne' , 'keys' => 'idBrand:idBrand'), 
                'cars' => array('toClass' => 'carcollection\models\Car', 'cardinality' => 'oneToMany' , 'keys' => 'idModel:idModel'), 
            )
        );
    }

    /**
     * Atributos da classe Model
     */

    protected $idModel;

    protected $model;

    protected $productionStartYear;

    protected $productionEndYear;

    protected $idBrand;

    /**
     * Atributos da classe Model que referenciam associações.
     */

    protected $brand;
    protected $cars;
    

    /**
     * Getters/Setters
     */

    public function getIdModel() {
        return $this->idModel;
    }

    public function setIdModel($value) {
        $this->idModel = $value;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($value) {
        $this->model = $value;
    }

    public function getProductionStartYear() {
        return $this->productionStartYear;
    }

    public function setProductionStartYear($value) {
        $this->productionStartYear = $value;
    }

    public function getProductionEndYear() {
        return $this->productionEndYear;
    }

    public function setProductionEndYear($value) {
        $this->productionEndYear = $value;
    }

    public function getIdBrand() {
        return $this->idBrand;
    }

    public function setIdBrand($value) {
        $this->idBrand = $value;
    }

    /**
     *
     * @return Association
     */
    public function getBrand() {
        if (is_null($this->brand)){
            $this->retrieveAssociation("brand");
        }
        return  $this->brand;
    }

    /**
     *
     * @param Association $value
     */
    public function setBrand($value) {
        $this->brand = $value;
    }

    /**
     *
     * @return Association
     */
    public function getAssociationBrand() {
        $this->retrieveAssociation("brand");
    }

    /**
     *
     * @return Association
     */
    public function getCars() {
        if (is_null($this->cars)){
            $this->retrieveAssociation("cars");
        }
        return  $this->cars;
    }

    /**
     *
     * @param Association $value
     */
    public function setCars($value) {
        $this->cars = $value;
    }

    /**
     *
     * @return Association
     */
    public function getAssociationCars() {
        $this->retrieveAssociation("cars");
    }

    

}

?>