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
            'log' => array(),
            'validators' => array(
                'brand' => array('notnull', 'notblank'),
            ),
            'converters' => array(
                'brand' => array('case' => 'upper')
            )
        );
    }

    public function getDescription() {
        return $this->getBrand();
    }

    public function listByBrand($brand) {
        return $this->getCriteria()->where("brand like '{$brand}%'")->orderBy("brand");
    }
}

?>