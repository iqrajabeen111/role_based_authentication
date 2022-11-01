<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Roles = Roles::first();
        if($Roles->name=='Admin')
        {
            $getid=$Roles->id;
      
        //
        $password = 'iqra111';
        DB::table('users')->insert([
            'name' =>   'iqra jabeen',
            'email' => 'iqra@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'role_id' => $getid,
            'is_email_verified' =>1,
        ]);
    }
    }
}
