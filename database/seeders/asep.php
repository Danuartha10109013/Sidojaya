<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class asep extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'asep',
                'email' => 'asepsaepuloh@gmail.com',
                'role' => 'pengunjung',
                'password' => bcrypt('pengunjung123')
                
            ],

            [
                'name' => 'ica',
                'email' => 'icayunisa@gmail.com',
                'role' => 'adminwisata',
                'password' => bcrypt('adminwisata123')
                
            ],

            [
                'name' => 'danu',
                'email' => 'danuartha@gmail.com',
                'role' => 'superadmin',
                'password' => bcrypt('superadmin123')
                
            ],


        ];

        //ie jang ngesi data na ke tinggal sesuaiken 

        foreach($userData as $key => $val){
            //insert ka user brarti
            User::create($val);
        }
    }
}
