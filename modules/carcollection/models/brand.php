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

class Brand extends map\BrandMap {

    public static function config() {
        return array(
            'log' => array(  ),
            'validators' => array(
                'brand' => array('notnull'),
            ),
            'converters' => array()
        );
    }
    
    public function getDescription(){
        return $this->getBrand();
    }

    public function listByFilter($filter){
        $criteria = $this->getCriteria()->select('*')->orderBy('brand');
        if ($filter->brand){
            $criteria->where("brand LIKE '{$filter->brand}%'");
        }
        return $criteria;
    }
}

?>