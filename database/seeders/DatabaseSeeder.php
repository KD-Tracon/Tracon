<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ナンバープレート関連のマスターデータを追加
        $this->call([
            PlateRegionToPrefectureSeeder::class,
            ClassNumberCategoriesSeeder::class,
            HiraganaToUsageTypeSeeder::class,
        ]);
    }
}
