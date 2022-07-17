<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UsersModel;


class LoginController extends BaseController
{
    public function index()
    {
        if (!session()->is_logged)
        {
            return view('Auth/login');
        }

        return redirect()->route('homeAdmin');
    }

    public function login()
    {
        if(!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])){
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        $email = trim($this->request->getVar('email'));
        $password = trim($this->request->getVar('password'));

        $model = model('UsersModel');

        if(!$user = $model->getUserBy('email', $email))
        {
            return redirect()->back()->with('msg', [
                'type' => 'danger',
                'body' => 'Este usuario no se encuentra registrado en el sistema'
            ]);
        }

        if (!password_verify($password, $user->password))
        {
            return redirect()->back()->with('msg', [
                'type' => 'danger',
                'body' => 'Credenciales invalidas'
            ]);
        }

        //crear un IF con el ROLE para denegar accesos, usando el metodo userby dentro de userentities //

        session()->set([
            'id' => $user->id,
            'full_name' => $user->full_name,
            'is_logged' => true
        ]);

        return redirect()->route('homeAdmin')->with('msg' , [
            'type' => 'success',
            'body' => 'Bienvenido! '
        ]);

    }

    public function signout()
    {
        session()->destroy();
        return redirect()->route('login');
    }

        
}
