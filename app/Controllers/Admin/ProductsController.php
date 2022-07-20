<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\ProductImagesModel;
use App\Models\InventoryModel;
use App\Models\ProductsModel;

class ProductsController extends BaseController
{
    public function index()
    {
        $productModel = new ProductsModel();
        $products = [];

        // iteramos todos los productos y le agregamos la foto (porque tiene varias fotos)
        foreach ($productModel->getProducts() as $product) {
            // creamos propiedad "image"
            $product->image = $productModel->getImages($product->id)[0]->name;
            $products[] = $product;
        }

        $datos = [
            'products' => $products
        ];
        
        return view('admin/products/index', $datos);
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
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }

        // crear inventario
        $inventory = new InventoryModel();
        $dato_cantidad = [
            'quantity' =>  $this->request->getVar('quantity')
        ];
        $inventory->insert($dato_cantidad);

        // crear producto
        $products = new ProductsModel();
        $dato = [
            'name' =>  $this->request->getVar('name'),
            'description' =>  $this->request->getVar('description'),
            'price' =>  $this->request->getVar('price'),
            'inventory_id' => $inventory->getInsertID(),
            'category_id' =>  $this->request->getVar('category_id')
        ];
        $products->insert($dato);

        // subir imagenes
        $images = $this->request->getFileMultiple('images');
        foreach($images as $image) {   
            $productImage = new ProductImagesModel();

            // movemos imagen
            $nameRandom = $image->getRandomName();
            $image->move('../public/uploads/products/', $nameRandom);

            // crear carpeta con nombre ID producto
            // $image->move('../public/uploads/products/' . $products->getInsertID() . '/', $nameRandom);

            // guardamos imagen
            $datos = [
                'name' => $nameRandom,
                'product_id' =>  $products->getInsertID()
            ];

            $productImage->insert($datos);
        }

        return redirect()->route('productsList')->with('message', 'Registro creado exitosamente!');
    }
}
