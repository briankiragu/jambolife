<?php

use Illuminate\Database\Seeder;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Merchant::create([
            'merchant_uuid' => str_random(10),
            'name' => 'Deveint',
            'telephone' => '254701770597',
            'email' => 'dev@deveint.com',
            'password' => bcrypt('secret'),
            'is_active' => true,
            'api_token' => base64_encode('dev@deveint.com'),
        ]);
    }
}
