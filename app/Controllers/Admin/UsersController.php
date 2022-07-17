<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class UsersController extends BaseController
{
    public function index()
    {
        $model = model('UsersModel');
        return view('admin/users', [
            'users' => $model->findAll()
        ]);

    }
        
}
