<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassNumberCategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['start' => 10, 'end' => 19, 'category' => '普通貨物車', 'vehicle_type' => '普通'],
            ['start' => 20, 'end' => 29, 'category' => 'バス・乗合自動車', 'vehicle_type' => '普通'],
            ['start' => 30, 'end' => 39, 'category' => '普通乗用車', 'vehicle_type' => '普通'],
            ['start' => 40, 'end' => 49, 'category' => '小型貨物車', 'vehicle_type' => '普通'],
            ['start' => 50, 'end' => 59, 'category' => '小型乗用車', 'vehicle_type' => '普通'],
            ['start' => 80, 'end' => 89, 'category' => '特殊用途車', 'vehicle_type' => '軽'],
            ['start' => 0, 'end' => 9, 'category' => '建設機械等', 'vehicle_type' => '普通'],
            ['start' => 100, 'end' => 199, 'category' => '普通貨物車（3桁）', 'vehicle_type' => '普通'],
            ['start' => 200, 'end' => 299, 'category' => 'バス等（3桁）', 'vehicle_type' => '普通'],
            ['start' => 300, 'end' => 399, 'category' => '普通乗用車（3桁）', 'vehicle_type' => '普通'],
            ['start' => 400, 'end' => 499, 'category' => '小型貨物車（3桁）', 'vehicle_type' => '普通'],
            ['start' => 500, 'end' => 599, 'category' => '小型乗用車（3桁）', 'vehicle_type' => '普通'],
            ['start' => 700, 'end' => 799, 'category' => '特種用途車（3桁）', 'vehicle_type' => '軽'],
            ['start' => 800, 'end' => 899, 'category' => '軽自動車', 'vehicle_type' => '軽'],
        ];

        DB::table('class_number_categories')->insert($categories);
    }
}
