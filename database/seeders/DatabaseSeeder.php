<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\DayNumber;
use App\Models\Diet;
use App\Models\Dish;
use App\Models\Food;
use App\Models\FoodMealType;
use App\Models\FoodType;
use App\Models\Ingredient;
use App\Models\MealType;
use App\Models\PaymentMethod;
use App\Models\State;
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
            'en' => ['name' => 'admin'],
            'ar' => ['name' => 'أدمن'],
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
            'gender' => 'male'
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

        /******************************************************** */

        $diets = [
            [
                'en' => ['name' => 'Keto'],
                'ar' => ['name' => 'كيتو'],
                'protein' => '100',
                'carb' => '100',
                'fats' => 100,
                'weight_from' => 100,
                'weight_to' => 500,
                'calories' => 100,
                'target_id' => 1,

            ],
            [
                'en' => ['name' => 'Easy'],
                'ar' => ['name' => 'سهل'],
                'protein' => '100',
                'carb' => '100',
                'fats' => 100,
                'weight_from' => 100,
                'weight_to' => 500,
                'calories' => 100,
                'target_id' => 1,

            ],
            [
                'en' => ['name' => 'Maintaining 1'],
                'ar' => ['name' => '1 المحافظه'],
                'protein' => '150',
                'carb' => '150',
                'fats' => 100,
                'weight_from' => 100,
                'weight_to' => 500,
                'calories' => 100,
                'target_id' => 2,

            ], [
                'en' => ['name' => 'Maintaining 2'],
                'ar' => ['name' => '2 المحافظه'],
                'protein' => '150',
                'carb' => '150',
                'fats' => 100,
                'weight_from' => 100,
                'weight_to' => 500,
                'calories' => 100,
                'target_id' => 2,

            ],
            [
                'en' => ['name' => 'Overweight 1'],
                'ar' => ['name' => 'زياده 1'],
                'protein' => '200',
                'carb' => '200',
                'fats' => 100,
                'weight_from' => 100,
                'weight_to' => 500,
                'calories' => 100,
                'target_id' => 3,

            ],
            [
                'en' => ['name' => 'Overweight 2'],
                'ar' => ['name' => 'زياده 2'],
                'protein' => '250',
                'carb' => '250',
                'fats' => 100,
                'weight_from' => 100,
                'weight_to' => 500,
                'calories' => 100,
                'target_id' => 3,

            ],
        ];

        foreach ($diets as $diet) {
            $diet = Diet::create($diet);
            $day = DayNumber::insert([
                [
                    'number' => rand(1, 100),
                    'diet_id' => $diet->id
                ],
                [
                    'number' => rand(1, 100),
                    'diet_id' => $diet->id
                ]
            ]);
        }


        /**************************************************************** */


        $states = [
            [
                'en' => ['name' => 'Dubai'],
                'ar' => ['name' => 'دبي'],
            ],
            [
                'en' => ['name' => 'Abu dhabi'],
                'ar' => ['name' => 'أبوظبي'],
            ],
            [
                'en' => ['name' => 'Ajman'],
                'ar' => ['name' => 'عجمان'],
            ],
            [
                'en' => ['name' => 'Sharjah'],
                'ar' => ['name' => 'الشارقة'],
            ],
            [
                'en' => ['name' => 'Fujairah'],
                'ar' => ['name' => 'الفجيرة'],
            ],  [
                'en' => ['name' => 'Ras Al Khaimah'],
                'ar' => ['name' => 'رأس الخيمة'],
            ],  [
                'en' => ['name' => 'Umm al Quwain'],
                'ar' => ['name' => 'أم القيوين'],
            ],
        ];

        foreach ($states as $state) {
            $state = State::create($state);
            for ($i = 0; $i < 10; $i++) {
                City::create([
                    'state_id' => $state->id,
                    'en' => ['name' => 'city' . $i],
                    'ar' => ['name' => $i . 'سيتي'],
                ]);
            }
        }

        /******************************************************************** */

        $meal_types_protein = MealType::create([
            'en' => ['name' => 'protein'],
            'ar' => ['name' => 'بروتين'],
            'parent' => 1,
            'parent_id' => 0
        ]);

        $meal_types_carb = MealType::create([
            'en' => ['name' => 'carb'],
            'ar' => ['name' => 'كربوهيدرات'],
            'parent' => 1,
            'parent_id' => 0
        ]);

        $meal_types_snacks = MealType::create([
            'en' => ['name' => 'snacks'],
            'ar' => ['name' => 'وجبات خفيفه'],
            'parent' => 1,
            'parent_id' => 0
        ]);

        $meal_types = [
            [
                'en' => ['name' => 'Seafood'],
                'ar' => ['name' => 'مأكولات بحريه'],
                'parent' => 0,
                'parent_id' => $meal_types_protein->id
            ],
            [
                'en' => ['name' => 'Chicken'],
                'ar' => ['name' => 'دجاج'],
                'parent' => 0,
                'parent_id' =>  $meal_types_protein->id
            ],
            [
                'en' => ['name' => 'Beef'],
                'ar' => ['name' => 'لحم'],
                'parent' => 0,
                'parent_id' =>  $meal_types_protein->id
            ],
            [
                'en' => ['name' => 'Fish'],
                'ar' => ['name' => 'سمك'],
                'parent' => 0,
                'parent_id' =>  $meal_types_protein->id
            ],

            [
                'en' => ['name' => 'Potatoes'],
                'ar' => ['name' => 'بطاطا'],
                'parent' => 0,
                'parent_id' => $meal_types_carb->id
            ],
            [
                'en' => ['name' => 'Rice'],
                'ar' => ['name' => 'أرز'],
                'parent' => 0,
                'parent_id' =>  $meal_types_carb->id
            ],
            [
                'en' => ['name' => 'Bread'],
                'ar' => ['name' => 'خبز'],
                'parent' => 0,
                'parent_id' =>  $meal_types_carb->id
            ],
            [
                'en' => ['name' => 'Pasta'],
                'ar' => ['name' => 'الباستا'],
                'parent' => 0,
                'parent_id' =>  $meal_types_carb->id
            ],
            [
                'en' => ['name' => 'sweets'],
                'ar' => ['name' => 'حلويات'],
                'parent' => 0,
                'parent_id' => $meal_types_snacks->id
            ],
            [
                'en' => ['name' => 'salad'],
                'ar' => ['name' => 'سلطه'],
                'parent' => 0,
                'parent_id' =>  $meal_types_snacks->id
            ],
            [
                'en' => ['name' => 'soup'],
                'ar' => ['name' => 'حساء'],
                'parent' => 0,
                'parent_id' =>  $meal_types_snacks->id
            ],
        ];

        $types = ['breakfast', 'dinner', 'launch', 'other'];
        $ingredients_data = ['egg', 'milk', 'cheese', 'other'];
        foreach ($meal_types as $k => $meal_type) {
            $meal_type = MealType::create($meal_type);

            $food = Food::create([
                'en' => ['name' => 'food ' . $k, 'details' => 'details ' . $k],
                'ar' => ['name' => 'food ' . $k, 'details' => 'details ' . $k],
                'main_type_id' => $meal_type->main_type->id,
                'protein' => '100',
                'carb' => '100',
                'fats' => '100',
                'calories' => '100',
                'weight' => '100',
                'price' => 500,
            ]);

            FoodMealType::create([
                'food_id' => $food->id,
                'meal_type_id' => $meal_type->id
            ]);

            $dish = Dish::create([
                'en' => ['name' => $types[rand(0, 3)] . $k],
                'ar' => ['name' => $types[rand(0, 3)] . $k],
            ]);

            FoodType::create([
                'dish_id' => $dish->id,
                'food_id' => $food->id
            ]);

            $ingredients = Ingredient::create([
                'en' => ['name' => $ingredients_data[rand(0, 3)] . $k],
                'ar' => ['name' => $ingredients_data[rand(0, 3)] . $k],
            ]);
        }



        PaymentMethod::create(
            [
                'id' => 1,
                'key' => 'cash',
                'en' => ['title' => 'Cash On Delivery'],
                'ar' => ['title' => 'الدفع في المكان'],
                'status' => 1

            ]
        );
    }
}
