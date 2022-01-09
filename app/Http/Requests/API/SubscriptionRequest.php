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
            'ingredient_ids' => 'nullable|array',
            'ingredient_ids.*' => 'nullable|exists:ingredients,id',
            'protien_ids' => 'required|array',
            'protien_ids.*' => 'required|exists:meal_types,id',
            'snack_ids' =>  'required|array',
            'snack_ids.*' =>  'required|exists:meal_types,id',
            'carb_ids' =>  'required|array',
            'carb_ids.*' =>  'required|exists:meal_types,id',
            'target_id' => 'required|exists:targets,id',
            'meal_number_id' => 'required|exists:meal_numbers,id',
            'day_number_id' => 'required|exists:day_numbers,id',
            'prefered_time_id' => 'required|exists:prefered_times,id',
            'dish_id' => 'nullable|exists:dishes,id',
            'diet_id' => 'required|exists:diets,id',
            'address_id' => 'required|exists:addresses,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date'
        ];
    }


    public function validationData()
    {
        if ($this->has('protien_ids') && is_string($this->protien_ids)) {
            $this->request->add([
                'protien_ids' => json_decode($this->protien_ids)
            ]);
        }

        if ($this->has('snack_ids') && is_string($this->snack_ids)) {
            $this->request->add([
                'snack_ids' => json_decode($this->snack_ids)
            ]);
        }

        if ($this->has('carb_ids') && is_string($this->carb_ids)) {
            $this->request->add([
                'carb_ids' => json_decode($this->carb_ids)
            ]);
        }

        if ($this->has('ingredient_ids') && is_string($this->ingredient_ids)) {
            $this->request->add([
                'ingredient_ids' => json_decode($this->ingredient_ids)
            ]);
        }
        return $this->request->all();
    }
}
