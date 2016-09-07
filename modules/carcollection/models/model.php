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

class Model extends map\ModelMap {

    public static function config() {
        return array(
            'log' => array(  ),
            'validators' => array(
                'model' => array('notnull'),
                'productionStartYear' => array('notnull'),
                'productionEndYear' => array('notnull'),
                'idBrand' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getModel();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('model');
        if ($filter->model){
            $criteria->where("model LIKE '{$filter->model}%'");
        }
        return $criteria;
    }
}

?>