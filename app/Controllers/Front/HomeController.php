<?php

namespace App\Controllers\Front;
use App\Controllers\BaseController;


class HomeController extends BaseController
{
    public function index()
    {
        return view('front/index');
    }

    public function view_product()
    {
        return view('front/product');
    }
        
}
