<?php
/**
 * 
 *
 * @category   Maestro
 * @package    UFJF
 * @subpackage helloworld
 * @copyright  Copyright (c) 2003-2012 UFJF (http://www.ufjf.br)
 * @license    http://siga.ufjf.br/license
 * @version    
 * @since      
 */

namespace carcollection\models;

class Car extends map\CarMap {

    public static function config() {
        return array(
            'log' => array(  ),
            'validators' => array(
                'year' => array('notnull'),
                'color' => array('notnull'),
                'idModel' => array('notnull'),
                'idMember' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getIdCar();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('idCar');
        if ($filter->idCar){
            $criteria->where("idCar LIKE '{$filter->idCar}%'");
        }
        return $criteria;
    }
}

?>