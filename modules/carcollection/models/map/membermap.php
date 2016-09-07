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

class MemberMap extends \MBusinessModel {

    
    public static function ORMMap() {

        return array(
            'class' => \get_called_class(),
            'database' => 'db_car_collection',
            'table' => 'Members',
            'attributes' => array(
                'idMember' => array('column' => 'idMember','key' => 'primary','idgenerator' => 'identity','type' => 'integer'),
                'firstName' => array('column' => 'firstName','type' => 'string'),
                'lastName' => array('column' => 'lastName','type' => 'string'),
                'email' => array('column' => 'email','type' => 'string'),
                'city' => array('column' => 'city','type' => 'string'),
                'state' => array('column' => 'state','type' => 'string'),
                'idBrand' => array('column' => 'idBrand','key' => 'foreign','type' => 'integer'),
            ),
            'associations' => array(
                'cars' => array('toClass' => 'carcollection\models\Car', 'cardinality' => 'oneToMany' , 'keys' => 'idMember:idMember'), 
            )
        );
    }
    
    /**
     * 
     * @var integer 
     */
    protected $idMember;
    /**
     * 
     * @var string 
     */
    protected $firstName;
    /**
     * 
     * @var string 
     */
    protected $lastName;
    /**
     * 
     * @var string 
     */
    protected $email;
    /**
     * 
     * @var string 
     */
    protected $city;
    /**
     * 
     * @var string 
     */
    protected $state;
    /**
     * 
     * @var integer 
     */
    protected $idBrand;

    /**
     * Associations
     */
    protected $cars;
    

    /**
     * Getters/Setters
     */
    public function getIdMember() {
        return $this->idMember;
    }

    public function setIdMember($value) {
        $this->idMember = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) {
        $this->lastName = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($value) {
        $this->city = $value;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($value) {
        $this->state = $value;
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
// end - wizard

?>