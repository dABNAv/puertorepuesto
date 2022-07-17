<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
    public function run()
    {
        $this->call('Roles');
        $this->call('Users');
    }
}
