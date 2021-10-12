<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DayNumberResource;
use App\Http\Resources\DietResource;
use App\Http\Resources\FoodResource;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\MainTypeResource;
use App\Http\Resources\MealTypeResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\TargetResource;
use App\Http\Traits\HelperTrait;
use App\Models\DayNumber;
use App\Models\Diet;
use App\Models\Dish;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\MealType;
use App\Models\PreferedTime;
use App\Models\State;
use App\Models\Target;
use Illuminate\Http\Request;

class ApiHomeController extends Controller
{
    use HelperTrait;

    public function get_public_data()
    {
        $data = [];
        $data['target'] = TargetResource::collection($this->get(Target::class, ['diets']));
        $data['daynumbers'] = DayNumberResource::collection($this->get(DayNumber::class));
        $data['main_types'] = MainTypeResource::collection($this->getBy(MealType::class, ['parent' => 1], ['meal_types']));
        $data['preferedtimes'] = $this->get(PreferedTime::class);
        $data['dishes'] = GeneralResource::collection($this->get(Dish::class));

        return responseSuccess($data);
    }

    public function get_address_create_data()
    {
        $data = [];
        $data['states'] = StateResource::collection($this->get(State::class));
        return responseSuccess($data);
    }

    public function get_diets()
    {
        if (request('diet_id')) {
            $data = $this->findWith(Diet::class, ['id' => request('diet_id')], ['days', 'mealNumbers']);
            if (!$data) {
                return responseFail('there is no diet with this id');
            }
            $data = new DietResource($data);
        } else {
            $data = DietResource::collection($this->get(Diet::class, ['days', 'mealNumbers']));
        }
        return responseSuccess($data);
    }

    public function get_targets()
    {

        if (request('target_id')) {
            $data = $this->findWith(Target::class, ['id' => request('target_id')], ['diets']);
            if (!$data) {
                return responseFail('there is no target with this id');
            }
            $data = new TargetResource($data);
        } else {
            $data = TargetResource::collection($this->get(Target::class, ['diets']));
        }
        return responseSuccess($data);
    }

    public function get_foods()
    {
        $data = Food::query();

        if (request('food_id')) {
            $data = $data->where('id', request('food_id'));
        } elseif (request('dish_id')) {
            $data = $data->whereHas('foodtypes_many', function ($q) {
                $q->whereIn('dish_id', json_decode(request('dish_ids')));
            });
        } elseif (request('main_type_id')) {
            $data = $data->where('main_type_id', request('main_type_id'));
        } elseif (request('meal_type_id')) {
            $data = $data->whereHas('mealtypes_many', function ($q) {
                $q->whereIn('mealtype_id', json_decode(request('mealtype_ids')));
            });
        } elseif (request('ingredient_ids')) {
            $data = $data->whereHas('ingredients_many', function ($q) {
                $q->whereIn('ingredient_id', json_decode(request('ingredient_ids')));
            });
        } else {
            $data = FoodResource::collection($this->get(Food::class, ['mealtypes', 'foodtypes_many', 'ingredients_many']));
            return responseSuccess($data);
        }

        $data = FoodResource::collection($data->get());
        return responseSuccess($data);
    }

    public function get_dishes()
    {
        if (request('dish_id')) {
            $data = $this->findWith(Dish::class, ['id' => request('dish_id')], []);
            if (!$data) {
                return responseFail('there is no dish with this id');
            }
            $data = new GeneralResource($data);
        } else {
            $data = GeneralResource::collection($this->get(Dish::class));
        }

        return responseSuccess($data);
    }

    public function get_maintypes()
    {
        if (request('main_type_id')) {
            $data = $this->findWith(MealType::class, ['id' => request('main_type_id'), 'parent_id' => 0], []);
            if (!$data) {
                return responseFail('there is no main type with this id');
            }
            $data = new MealTypeResource($data);
        } else {
            $data = MealTypeResource::collection($this->getBy(MealType::class,  ['parent_id' => 0]));
        }

        return responseSuccess($data);
    }

    public function get_mealtypes()
    {
        if (request('meal_type_id')) {
            $data = $this->findWith(MealType::class, ['id' => request('meal_type_id'), 'parent' => 0], []);
            if (!$data) {
                return responseFail('there is no meal type with this id');
            }
            $data = new MealTypeResource($data);
        } else {
            $data = MealTypeResource::collection($this->getBy(MealType::class,  ['parent' => 0]));
        }

        return responseSuccess($data);
    }

    public function get_ingredients()
    {
        if (request('ingredient_id')) {
            $data = new GeneralResource($this->findWith(Ingredient::class, ['id' => request('ingredient_id')], []));
            if (!$data) {
                return responseFail('there is no ingredient with this id');
            }
        } else {
            $data = GeneralResource::collection($this->get(Ingredient::class));
        }

        return responseSuccess($data);
    }
}
