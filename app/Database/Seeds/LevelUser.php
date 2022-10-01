<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LevelUser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_level_user'  => 'user',
            ],
            [
                'name_level_user'  => 'admin',
            ]
        ];
        $this->db->table('level_users')->insertBatch($data);
    }
}
