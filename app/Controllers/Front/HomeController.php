<?php

namespace App\Controllers\Front;
use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

class HomeController extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function viewProduct($id)
    {
        $products = new ProductsModel();
        $data = [
            'product' => $products->getProductById($id),
            'images' => $products->getImages($id)
        ];
        
        return view('front/products/index', $data);
    }

    public function viewCategory($id)
    {
        
        $products = new ProductsModel();
        $category = new CategoriesModel();
        $data = [
            'product' => $products->getProductByCategory($id),
            'images' => $products->getImages($id),
            'category' => $category->getCategoryById($id)
        ];
        
        return view('front/categories/index', $data);
    }
        
}
    