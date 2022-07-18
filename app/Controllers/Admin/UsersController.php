<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        $users = new UsersModel();
        $datos = [
            'users' => $users->getUsers()
        ];
        return view('admin/users/index', $datos);
    }
        
}
