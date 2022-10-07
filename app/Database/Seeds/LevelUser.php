<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LevelUser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_level_user'  => 'admin',
            ],
            [
                'name_level_user'  => 'user',
            ]
        ];
        $this->db->table('level')->insertBatch($data);
    }
}
