<?php
namespace App\Models;
use CodeIgniter\Model;
use Config\Database;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['full_name', 'email', 'password', 'role_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Metdo para buscar en la "tabla", y a su "variable"
    public function getUserBy(string $column, string $value)
    {
        return $this->where($column, $value)->first();
    }

    protected function setPassword(string $password)
    {
        $this->attributes['password'] = password_hash($password,PASSWORD_DEFAULT);
    }

    public function getUsers()
    {
        $db = Database::connect();
        $builder = $db->table('users');
        $builder->select('users.*');
        $builder->where('users.deleted_at', null);
        $builder->where('users.role', 'Superadmin');
        $builder->orWhere('users.role', 'Admin');
        $query = $builder->get();
        
        return $query->getResult();
    }

    /*
    public function getUsersWithRoles()
    {
        $db = Database::connect();
        $builder = $db->table('users');
        $builder->select('users.*, roles.name as role_name');
        $builder->join('roles', 'roles.id = users.role_id');
        $builder->where('users.deleted_at', null);
        $query = $builder->get();
        
        return $query->getResult();
    }
    */
}
