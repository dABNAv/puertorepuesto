<?php

namespace App\Controllers\Front;
use App\Controllers\BaseController;
use App\Models\ProductsModel;

class HomeController extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function viewproduct($id)
    {
        $products = new ProductsModel();
        return view('front/product', ['product' => $products->getProductById($id)]);
    }
        
}
