<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
              'name' => 'Admin',
            
            ],
            [
              'name' => 'User',
       
            ]
         
          ];

          Roles::insert($users);
        //
    }
}
