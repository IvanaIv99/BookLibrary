<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $for_insert = [
            array(
                'name' => 'Ivana',
                'surname' => 'Ivanovic',
                'email' => 'librarian@gmail.com',
                'password' => bcrypt('librarian99'),
                'user_type_id'=> 1,
                'created_at' => $now,
                'updated_at' => $now
            ),
        ];

        User::insert($for_insert);
    }
}
