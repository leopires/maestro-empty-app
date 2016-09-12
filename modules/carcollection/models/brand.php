<?php

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

    public function listAllBrands() {
        return $this->getCriteria()->orderBy('brand');
    }

    public function listByBrand($brand) {
        return $this->getCriteria()->where("brand like '{$brand}%'")->orderBy("brand");
    }
}

?>