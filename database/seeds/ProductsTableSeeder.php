<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Bánh đậu xanh',
            'code' => str_random(5),
            'image' => 'banhdauxanh.jpg',
            'price' => 100000,
            'quantity' => 20,
            'local' => 'Hải Dương',
            'description' => 'Là món ăn nổi tiếng của Hải Dương',
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Nem chua',
            'code' => str_random(5),
            'image' => 'nemchua.jpg',
            'price' => 100000,
            'quantity' => 20,
            'local' => 'Thanh Hóa',
            'description' => 'Là món ăn nổi tiếng của Thanh Hóa',
            'category_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Bánh đa cua',
            'code' => str_random(5),
            'image' => 'banhdacua.jpg',
            'price' => 100000,
            'quantity' => 20,
            'local' => 'Hải Phòng',
            'description' => 'Là món ăn nổi tiếng của Hải Phòng',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Chả cá lá vọng',
            'code' => str_random(5),
            'image' => 'chacalavong.jpeg',
            'price' => 100000,
            'quantity' => 20,
            'local' => 'Hà Nội',
            'description' => 'Là món ăn nổi tiếng của Hà Nội',
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'Chả mực Hạ Long',
            'code' => str_random(5),
            'image' => 'chamuchalong.jpeg',
            'price' => 100000,
            'quantity' => 20,
            'local' => 'Hạ Long',
            'description' => 'Là món ăn nổi tiếng của Hạ Long',
            'category_id' => 3
        ]);
    }
}
