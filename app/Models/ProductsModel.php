<?php
namespace App\Models;
use CodeIgniter\Model;


class ProductsModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'descripcion', 'price', 'category_id', 'inventory_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


}