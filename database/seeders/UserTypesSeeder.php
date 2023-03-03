<?php

namespace Database\Seeders;

use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
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
                'type' => 'librarian',
                'created_at' => $now, 'updated_at' => $now),
            array(
                'type' => 'reader',
                'created_at' => $now, 'updated_at' => $now),
        ];

        UserType::insert($for_insert);
    }
}
