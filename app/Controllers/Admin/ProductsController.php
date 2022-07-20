<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\ProductImagesModel;
use App\Models\InventoryModel;
use App\Models\ProductModel;
use App\Models\ProductsModel;

class ProductsController extends BaseController
{
    public function index()
    {
        
        return view('admin/products/index');
    }
        
    public function create()
    {
        $categories = new CategoriesModel();
        $datos = [
            'categories' => $categories->getCategories()
        ];
        return view('admin/products/create', $datos);
    }
    public function save()
    {
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required'
        ]);
        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }
        $inventory = new InventoryModel();
        $dato_cantidad = [
            'quantity' =>  $this->request->getVar('quantity')
        ];
        $inventory->insert($dato_cantidad);

        $products = new ProductsModel();
        $dato = [
            'name' =>  $this->request->getVar('name'),
            'description' =>  $this->request->getVar('description'),
            'price' =>  $this->request->getVar('price'),
            'inventory_id' => $inventory->getInsertID(),
            'category_id' =>  $this->request->getVar('category_id')
        ];
        $products->insert($dato);
        /*
        $productImages = new ProductImagesModel();
        $images = $this->request->getFile('images');
       dd($validation);
        $nameRandom = $images->getRandomName();
        $images->move('../public/uploads/products/', $nameRandom);
        $datos_products = [
            'name' => $this->request->getVar('name'),
            'images' =>  $nameRandom
        ];
        $productImages->insert($datos_products);*/

    }
}
