<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\ApiFormRequest;

class OrderRequest extends ApiFormRequest
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
            'address_id' => 'required|exists:addresses,id',
            'foods' => 'required|array',
            'foods.*.food_id' => 'required|exists:food,id',
            'foods.*.qty' => 'required|int|min:1',
        ];
    }


    public function validationData()
    {
        if ($this->has('foods') && is_string($this->foods)) {
            $this->request->add([
                'foods' => json_decode($this->foods)
            ]);
        }
        return $this->request->all();
    }
}
