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
        $data = [
            'product' => $products->getProductById($id),
            'images' => $products->getImages($id)
        ];
        
        return view('front/products/index', $data);
    }
        
}
