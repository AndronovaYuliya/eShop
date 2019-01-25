<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use Core\App;
use Core\Controller;
use Core\View;

/**
 * Class CategoryController
 * @package App\Controllers
 */
class CategoryController extends Controller
{
    /**
     * @return void
     * @param string $param
     */
    public function categoryAction($param = null): void
    {
        $this->setMeta(App::$app->getProperty('title'), 'Shop', 'cheap');
        if (!$param) {
            $products = ProductsModel::getFullData();
        } else {
            $products = ProductsModel::getDataByCategory('alias', $param);
        }
        $brands = ProductsModel::query();
        $categories = CategoriesModel::query();
        $this->set(compact('products', 'categories', 'brands'));
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Shop", "action" => "shop"], 'default', 'shop');
        $viewObj->rendor($this->data);
    }
}