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

class CarMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'db_car_collection',
            'table' => 'Cars',
            'attributes' => array(
                'idCar' => array('column' => 'idCar','key' => 'primary','idgenerator' => 'identity','type' => 'integer'),
                'year' => array('column' => 'year','type' => 'integer'),
                'color' => array('column' => 'color','type' => 'string'),
                'idModel' => array('column' => 'idModel','key' => 'foreign','type' => 'integer'),
                'idMember' => array('column' => 'idMember','key' => 'foreign','type' => 'integer'),
            ),
            'associations' => array(
                'owner' => array('toClass' => 'carcollection\models\Member', 'cardinality' => 'oneToOne' , 'keys' => 'idMember:idMember'), 
                'model' => array('toClass' => 'carcollection\models\Model', 'cardinality' => 'oneToOne' , 'keys' => 'idModel:idModel'), 
            )
        );
    }
    
    /**
     * 
     * @var integer 
     */
    protected $idCar;
    /**
     * 
     * @var integer 
     */
    protected $year;
    /**
     * 
     * @var string 
     */
    protected $color;
    /**
     * 
     * @var integer 
     */
    protected $idModel;
    /**
     * 
     * @var integer 
     */
    protected $idMember;

    /**
     * Associations
     */
    protected $owner;
    protected $model;
    

    /**
     * Getters/Setters
     */
    public function getIdCar() {
        return $this->idCar;
    }

    public function setIdCar($value) {
        $this->idCar = $value;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($value) {
        $this->year = $value;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($value) {
        $this->color = $value;
    }

    public function getIdModel() {
        return $this->idModel;
    }

    public function setIdModel($value) {
        $this->idModel = $value;
    }

    public function getIdMember() {
        return $this->idMember;
    }

    public function setIdMember($value) {
        $this->idMember = $value;
    }
    /**
     *
     * @return Association
     */
    public function getOwner() {
        if (is_null($this->owner)){
            $this->retrieveAssociation("owner");
        }
        return  $this->owner;
    }
    /**
     *
     * @param Association $value
     */
    public function setOwner($value) {
        $this->owner = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationOwner() {
        $this->retrieveAssociation("owner");
    }
    /**
     *
     * @return Association
     */
    public function getModel() {
        if (is_null($this->model)){
            $this->retrieveAssociation("model");
        }
        return  $this->model;
    }
    /**
     *
     * @param Association $value
     */
    public function setModel($value) {
        $this->model = $value;
    }
    /**
     *
     * @return Association
     */
    public function getAssociationModel() {
        $this->retrieveAssociation("model");
    }

    

}
// end - wizard

?>