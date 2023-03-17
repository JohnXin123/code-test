<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Test Admin One',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('admin123'),
        ]);
    }
}
