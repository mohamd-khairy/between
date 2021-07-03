<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DayNumberResource;
use App\Http\Resources\MainTypeResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\TargetResource;
use App\Http\Traits\HelperTrait;
use App\Models\DayNumber;
use App\Models\MealType;
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
        $data['states'] = StateResource::collection($this->get(State::class));
        $data['daynumbers'] = DayNumberResource::collection($this->get(DayNumber::class));
        $data['main_types'] = MainTypeResource::collection($this->getBy(MealType::class , ['parent' => 1], ['meal_types']));
        return responseSuccess($data);
    }
}
