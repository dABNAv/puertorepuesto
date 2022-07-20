<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class ProductImagesModel extends Model
{
    protected $table      = 'product_images';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'product_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getCustomers()
    {
        $db = Database::connect();
        $builder = $db->table('users');
        $builder->select('users.*');
        $builder->where('users.deleted_at', null);
        $builder->where('users.role', 'Customer');
        $query = $builder->get();
        
        return $query->getResult();
    }


}