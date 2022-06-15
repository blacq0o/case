<?php

namespace Database\Seeders;

use App\Models\Api;
use Illuminate\Database\Seeder;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Api::truncate();
        Api::insert([
            [
                'api_url' => 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa',
                'api_type' => 1
            ],
            [
                'api_url' => 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7',
                'api_type' => 2
            ]
        ]);
    }
}
