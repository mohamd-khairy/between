<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\ApiFormRequest;

class SubscriptionRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ingredient_ids' => 'nullable',
            'protien_ids' => 'nullable',
            'snack_ids' => 'nullable',
            'carb_ids' => 'nullable',
            'target_id' => 'required|exists:targets,id',
            'meal_number_id' => 'required|exists:meal_numbers,id',
            'prefered_time_id' => 'required|exists:prefered_times,id',
            'dish_id' => 'required|exists:dishes,id',
            'food_id' => 'nullable|exists:food,id',
            'address_id' => 'required|exists:addresses,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date'
        ];
    }
}
