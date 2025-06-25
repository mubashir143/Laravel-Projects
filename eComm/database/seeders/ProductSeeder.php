<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
        [
            'name' => 'LG Tv',
            'price' => '15000',
            'description' => 'This is a smart TV with lots of specification',
            'category' => 'led',
            'gallery' => 'http://surl.li/mdlgpx'
        ],
        [
            'name' => 'Samsung LED',
            'price' => '9000',
            'description' => 'Your favorite TV programs and movies get real. The rich and vivid Full HD resolution with twice the resolution of HD TV.',
            'category' => 'led',
            'gallery' => 'http://surl.li/mdlgpx'
        ],
        [
            'name' => 'LG Mobile',
            'price' => '9000',
            'description' => 'This is a smart phone with lots of specification',
            'category' => 'mobile',
            'gallery' => 'http://surl.li/mdlgpx'
        ]
    );

    }
}
