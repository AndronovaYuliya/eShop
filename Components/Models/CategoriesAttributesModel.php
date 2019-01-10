<?php

namespace Components\Models;

use Components\Mappers\CategoriesAttributesMapper;

class CategoriesAttributesModel extends AbstractTableModel
{
    private $_id;
    private $_id_category;
    private $_id_attribute;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_id_category=isset($data['id_category'])?$data['id_category']:null;
            $this->_id_attribute=isset($data['id_attribute'])?$data['id_attribute']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker():void
    {
        CategoriesAttributesMapper::addData();
    }

    public function getData():array
    {
        $categoriesAttributes=[];
        $data=CategoriesAttributesMapper::getData();
        foreach ($data as $row){
            $categoriesAttributes[]=new CategoriesAttributesModel($row);
        }
        return $categoriesAttributes;
    }

    public function getDataWhere(string $byWhat, string $name):array
    {
        $categoriesAttributes=[];
        $data=CategoriesAttributesMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $categoriesAttributes[]=new CategoriesAttributesModel($row);
        }
        return $categoriesAttributes;
    }
}