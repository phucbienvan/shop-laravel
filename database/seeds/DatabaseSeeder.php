<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'phucdz',
            'email' => 'p@gmail',
            'password' => bcrypt('123456'),
            'phone' => '1234',
            'address' => 'Quang Binh',
            'level' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
