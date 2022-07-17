<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $user = [
            [
                'full_name' => 'Esteban Barria',
                'email' => 'dabnav1995@gmail.com',
                'role_id' => 1, // Administrador
                'password' => password_hash('123',PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $builder = $this->db->table('users');
        $builder->insertBatch($user);
    }
}
