<?php
/**
 * @category   Maestro
 * @package    UFJF
 * @subpackage helloworld
 * @copyright  Copyright (c) 2003-2013 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version
 * @since
 */

// wizard - code section created by Wizard Module

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

    /**
     *
     * @var integer
     */
    protected $idBrand;
    /**
     *
     * @var string
     */
    protected $brand;

    /**
     * Associations
     */
    protected $models;


    /**
     * Getters/Setters
     */
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

    /**
     *
     * @return Association
     */
    public function getModels() {
        if (is_null($this->models)) {
            $this->retrieveAssociation("models");
        }
        return $this->models;
    }

    /**
     *
     * @param Association $value
     */
    public function setModels($value) {
        $this->models = $value;
    }

    /**
     *
     * @return Association
     */
    public function getAssociationModels() {
        $this->retrieveAssociation("models");
    }


}

// end - wizard

?>