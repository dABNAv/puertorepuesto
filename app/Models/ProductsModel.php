<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;


class ProductsModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'description', 'price', 'category_id', 'inventory_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getProducts()
    {
        $db = Database::connect();
        $builder = $db->table('products');
        $builder->select('products.*, categories.name as category_name, inventory.quantity as stock');
        $builder->join('categories', 'categories.id = products.category_id');
        $builder->join('inventory', 'inventory.id = products.inventory_id');
        $builder->where('products.deleted_at', null);
        $query = $builder->get();
        
        return $query->getResult(); 
    }

    // metodo para obtener todas las imagenes segun el id del producto
    public function getImages($product_id)
    {
        $db = Database::connect();
        $builder = $db->table('product_images');
        $builder->select('product_images.name');
        $builder->where('product_images.product_id', $product_id);
        $builder->orderBy('product_images.id', 'ASC');
        $query = $builder->get();
        
        return $query->getResult(); 
    }
}
