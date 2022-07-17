<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Entities\UsersEntities;


class RegisterController extends BaseController
{
    public function index()
    {
        return view('auth/register');
    }

    public function store()
    {
        $validation = service('validation');
        $validation->setRules([
            'name' => 'required|alpha_space',
            'surname' => 'required|alpha_space',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|matches[c-password]'
        ]);

        if (!$validation->withRequest($this->request)->run())
        {
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = model('UsersModel');

        $user_enti = new UsersEntities($this->request->getPost());
        $user_enti->generateName();

        $model->save($user_enti);
    }

}