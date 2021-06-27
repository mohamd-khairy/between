<?php

namespace Database\Seeders;

use App\Models\Diet;
use App\Models\Target;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);


        $targets = [
            [
                'en' => ['name' => 'Weight Lose'],
                'ar' => ['name' => 'فقدان الوزن'],
            ],
            [
                'en' => ['name' => 'Maintaining weight'],
                'ar' => ['name' => 'المحافظه علي الوزن'],
            ],
            [
                'en' => ['name' => 'Over Weight'],
                'ar' => ['name' => 'زياده الوزن'],
            ],
        ];

        foreach ($targets as $target) {
            Target::create($target);
        }

        $diets = [
            [
                'en' => ['name' => 'Keto'],
                'ar' => ['name' => 'كيتو'],
                'protein' => '100',
                'carb' => '100',
                'target_id' => 1
            ],
            [
                'en' => ['name' => 'Easy'],
                'ar' => ['name' => 'سهل'],
                'protein' => '100',
                'carb' => '100',
                'target_id' => 1
            ],
            [
                'en' => ['name' => 'Maintaining 1'],
                'ar' => ['name' => '1 المحافظه'],
                'protein' => '150',
                'carb' => '150',
                'target_id' => 2
            ], [
                'en' => ['name' => 'Maintaining 2'],
                'ar' => ['name' => '2 المحافظه'],
                'protein' => '150',
                'carb' => '150',
                'target_id' => 2
            ],
            [
                'en' => ['name' => 'Overweight 1'],
                'ar' => ['name' => 'زياده 1'],
                'protein' => '200',
                'carb' => '200',
                'target_id' => 3
            ],
            [
                'en' => ['name' => 'Overweight 2'],
                'ar' => ['name' => 'زياده 2'],
                'protein' => '250',
                'carb' => '250',
                'target_id' => 3
            ],
        ];

        foreach($diets as $diet){
            Diet::create($diet);
        }

        // $countItem = 10;
        // for ($i = 0; $i < $countItem; $i++) {
        // }
    }
}
