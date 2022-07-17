<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    public function index()
    {
        $category = new CategoriesModel();
        $datos = [
            'category' => $category->findAll()
        ];
        return view('admin/categories/index', $datos);
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function save()
    {
        $category = new CategoriesModel();

        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4098]',
            ]
        ]);

        if(!$validation){
            $session = session();
            $session->setFlashdata('msj','Revise Informacion');
            return redirect()->back()->withInput();
            //return $this->response->redirect(base_url(route_to('categoriesList')));
        }


        if($image = $this->request->getFile('image')){
            $nameRandom = $image->getRandomName();
            $image->move('../public/uploads/categories/',$nameRandom);
            $datos = [
                'name' => $this->request->getVar('name'),
                'image' =>  $nameRandom
            ];

            $category->insert($datos);
        }

        return $this->response->redirect(base_url(route_to('categoriesList')));
    }

    public function edit($id=null)
    {
        $category = new CategoriesModel();
        $datos['category'] = $category->where('id',$id)->first();
             
        return view('admin/categories/edit', $datos);
    }

    public function update()
    {
        $category = new CategoriesModel();
        $datos = [
            'name' => $this->request->getVar('name')
        ];
        $id = $this->request->getVar('id');
        $category->update($id, $datos);

        $validation = $this->validate([
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4098]',
            ]
        ]);

        if($validation){
            if($image = $this->request->getFile('image')){
                $data_category = $category->where('id',$id)->first();     
                $rute = ('../public/uploads/categories/'.$data_category['image']);
                unlink($rute);

                $nameRandom = $image->getRandomName();
                $image->move('../public/uploads/categories/',$nameRandom);

                $datos = ['image' =>  $nameRandom];
                $category->update($id,$datos);
            }
        }

    }

    public function delete($id=null)
    {
        $category = new CategoriesModel();
        $data_category = $category->where('id', $id)->first();
        $rute = ('../public/uploads/categories/'.$data_category['image']);
        unlink($rute);

        $category->where('id', $id)->delete($id);

        return $this->response->redirect(base_url(route_to('categoriesList')));
    }


        
}
