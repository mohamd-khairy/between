<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DayNumberResource;
use App\Http\Resources\DietResource;
use App\Http\Resources\FoodResource;
use App\Http\Resources\MainTypeResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\TargetResource;
use App\Http\Traits\HelperTrait;
use App\Models\DayNumber;
use App\Models\Diet;
use App\Models\Food;
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
            $data = new DietResource($this->findWith(Diet::class, ['id' => request('diet_id')], ['days', 'mealNumbers']));
            if (!$data) {
                return responseFail('there is no diet with this id');
            }
        } else {
            $data = DietResource::collection($this->get(Diet::class, ['days', 'mealNumbers']));
        }
        return responseSuccess($data);
    }

    public function get_targets()
    {

        if (request('target_id')) {
            $data = new TargetResource($this->findWith(Target::class, ['id' => request('target_id')], ['diets']));
            if (!$data) {
                return responseFail('there is no target with this id');
            }
        } else {
            $data = TargetResource::collection($this->get(Target::class, ['diets']));
        }
        return responseSuccess($data);
    }

    public function get_foods()
    {
        if (request('food_id')) {
            $data = new FoodResource($this->findWith(Food::class, ['id' => request('food_id')], ['mealtypes', 'foodtypes_many']));
            if (!$data) {
                return responseFail('there is no diet with this id');
            }
        } else {
            $data = FoodResource::collection($this->get(Food::class, ['mealtypes', 'foodtypes_many']));
        }
        return responseSuccess($data);
    }

    
}
