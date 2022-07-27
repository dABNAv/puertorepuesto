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
        $productModel = new ProductsModel();
        $categoryModel = new CategoriesModel();
        $products = [];

        foreach ($productModel->getProductByCategory($id) as $product) {
            $images = $productModel->getImages($product->id);
            $product->image = (count($images)) ? $images[0]->name : '';
            
            $products[] = $product;
        }

        $data = [
            'category' => $categoryModel->getCategoryById($id),
            'products' => $products
        ];
        
        return view('front/categories/index', $data);
    }

    public function cart()
    {
        return view('front/cart');
    }    
}
    