<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class ProductsController extends BaseController
{
    public function index()
    {
        return view('admin/products');
        /*$model = model('UsersModel');
        return view('admin/users', [
            'users' => $model->findAll()
        ]);*/

    }
        
}
