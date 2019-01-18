<?php

namespace App\Models;

use App\Mappers\AdditionalsMapper;

class AdditionalsModel extends AbstractTableModel
{
    public static function addFaker(): void
    {
        AdditionalsMapper::addData();
    }

    public static function getData(): array
    {
        return AdditionalsMapper::getData();
    }

    public static function getDataWhere(string $byWhat, string $name): array
    {
        return AdditionalsMapper::getDataWhere($byWhat, $name);

    }
}