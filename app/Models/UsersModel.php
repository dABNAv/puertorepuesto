<?php
namespace App\Models;
use CodeIgniter\Model;
use App\Entities\UsersEntities;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = UsersEntities::class;
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
}