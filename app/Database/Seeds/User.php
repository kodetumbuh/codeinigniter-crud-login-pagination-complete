<?php
 
namespace App\Database\Seeds;
 
use CodeIgniter\Database\Seeder;
use \Faker\Factory;
 
class User extends Seeder
{
    public function run()
    {
    	 $data = [
            [
                'username'  => 'admin',
                'email'  => 'admin@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'name_level_user_id'  => '1'
            ],
            [
               	'username'  => 'user',
                'email'  => 'user@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'name_level_user_id'  => '2'
            ]
        ];
        $this->db->table('user')->insertBatch($data);

		for($i = 0; $i < 5500; $i++){
			$this->db->table("user")->insert($this->generateUsers());
		}
    }
 
    public function generateUsers()
    {
        $faker = Factory::create();
 
		return [
			"username" => $faker->name,
			"email" => $faker->email,
			"name_level_user_id" =>  $faker->randomElement(['1' ,'2']),
			"password" => password_hash('123456', PASSWORD_DEFAULT),
			// "created_at" => date("Y-m-d H:i:s"),
		];
    }
}