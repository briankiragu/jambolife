<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Admin::create([
            'user_uuid' => str_random(10),
            'fname' => 'Brian',
            'lname' => 'Kiragu',
            'phone' => '254715236020',
            'email' => 'dev@deveint.com',
            'identification' => '32391080',
            'password' => bcrypt('secret'),
            'is_active' => true,
            'api_token' => base64_encode('bkariuki@hotmail.com'),
        ]);
    }
}
