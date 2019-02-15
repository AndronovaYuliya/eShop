<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Core\View;

/**
 * Class ProductController
 * @package AppModel\Controllers
 */
class ProductController extends AppController
{
    /**
     * @param null $param
     * @throws \Exception
     */
    public function showAction($param = null): void
    {
        $products = $this->products;
        $brands = $products;
        $categories = $this->categories;

        $product = ProductsModel::getProductWithImg('alias', $param);
        $this->set(compact('products', 'categories', 'brands', 'product'));
        $this->getView();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function getView(): void
    {
        $viewObj = new View(["controller" => "Site/Product", "action" => "show"], 'Site/default', 'show');
        $viewObj->rendor($this->data);
    }
}