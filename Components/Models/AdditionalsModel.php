<?php

namespace Components\Models;

use Components\Mappers\AdditionalsMapper;

class AdditionalsModel extends AbstractTableModel
{
    private $_id;
    private $_id_product;
    private $_id_order;
    private $_count;
    private $_price;
    private $_created_at;
    private $_updated_at;

    public function __construct(array $data=[])
    {
        if(empty(!$data)){
            $this->_id=isset($data['id'])?$data['id']:null;
            $this->_id_product=isset($data['id_product'])?$data['id_product']:null;
            $this->_id_order=isset($data['id_order'])?$data['id_order']:null;
            $this->_count=isset($data['count'])?$data['count']:null;
            $this->_price=isset($data['price'])?$data['price']:null;
            $this->_created_at=isset($data['created_at'])?$data['created_at']:null;
            $this->_updated_at=isset($data['updated_at'])?$data['updated_at']:null;
        }
    }

    public function addFaker(): void
    {
        AdditionalsMapper::addData();
    }

    public function getData(): array
    {
        $additionals=[];
        $data=AdditionalsMapper::getData();
        foreach ($data as $row){
            $additionals[]=new AdditionalsModel($row);
        }
        return $additionals;
    }

    public function getDataWhere(string $byWhat, string $name): array
    {
        $additionals=[];
        $data=AdditionalsMapper::getDataWhere($byWhat, $name);
        foreach ($data as $row){
            $additionals[]=new AdditionalsModel($row);
        }
        return $additionals;
    }
}