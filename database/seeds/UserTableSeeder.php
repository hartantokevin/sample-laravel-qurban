<?php

use App\Models\feedbackModel;
use App\Models\menuModel;
use App\Models\transactionModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user
        User::truncate();
        User::insert([
            [
                'email' => 'admin@example.com',
                'name' => 'Administrator',
                'password' => Hash::make('admin'),
                'role' => '1',
            ],
            [
                'email' => 'user1@example.com',
                'name' => 'User 1',
                'password' => Hash::make('user1'),
                'role' => '2',
            ],
            [
                'email' => 'user2@example.com',
                'name' => 'User 2',
                'password' => Hash::make('user2'),
                'role' => '2',
            ],
        ]);

        // menu
        menuModel::truncate();
        menuModel::insert([
            [
                'menu_code' => 'sapi',
                'name' => 'Sapi',
                'price' => '2000000',
                'foto' => 'sapi.png'
            ],
            [
                'menu_code' => 'kambing',
                'name' => 'Kambing',
                'price' => '2000000',
                'foto' => 'kambing.png'
            ],
            [
                'menu_code' => 'domba',
                'name' => 'Domba',
                'price' => '2000000',
                'foto' => 'domba.png'
            ],
        ]);

        // get harga
        // $hargaSapi = menuModel::where('menu_code', 'sapi')->value('price');
        // $hargaKambing = menuModel::where('menu_code', 'kambing')->value('price');
        
        // set harga fix
        $harga = 2000000;

        // transaction
        transactionModel::truncate();
        for($i=1; $i<11; $i++)
            transactionModel::insert(
                [
                    'email' => 'user2@example.com',
                    'order' => 'sapi',
                    'instalment' => $i,
                    'fare' => $harga/10,
                    'status' => '0'
                ]
            );
        
            for($i=1; $i<11; $i++)
            transactionModel::insert(
                [
                    'email' => 'user1@example.com',
                    'order' => 'kambing',
                    'instalment' => $i,
                    'fare' => $harga/10,
                    'status' => '0'
                ]
            );
        
        // feedback
        feedbackModel::truncate();
        feedbackModel::insert([
            [
                'email' => 'admin@example.com',
                'menu_code' => 'sapi',
                'comment' => 'enak banget',
            ],
            [
                'email' => 'admin@example.com',
                'menu_code' => 'domba',
                'comment' => 'empuk banget',
            ],
            [
                'email' => 'user1@example.com',
                'menu_code' => 'sapi',
                'comment' => 'segar banget',
            ],
            [
                'email' => 'user1@example.com',
                'menu_code' => 'domba',
                'comment' => 'banyak bulu',
            ],
            [
                'email' => 'user2@example.com',
                'menu_code' => 'sapi',
                'comment' => 'merah banget',
            ],
            [
                'email' => 'user2@example.com',
                'menu_code' => 'kambing',
                'comment' => 'biasa aja',
            ],
        ]);
    }
}
