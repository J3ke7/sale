<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * R,un the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Đặc sản Bắc Bộ',
            'Đặc sản Nam Trung Bộ',
            'Đặc sản Bắc Trung Bộ',
            'Đặc sản Nam Bộ',
            'Đặc sản Tây Nguyên',
            'Đặc sản Tây Bắc'
        ];
        for($i = 0; $i < count($category); $i++) {
            DB::table('categories')->insert([
                'name' => $category[$i]
            ]);
        }
    }
}
