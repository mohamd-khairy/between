<?php

namespace App\Http\Requests\API\Address;

use App\Http\Requests\API\ApiFormRequest;

class AddUserAddressRequest extends ApiFormRequest
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
            'lat' => 'required_with:long',
            'long' => 'required_with:lat',
            'state_id' => 'required|exists:states,id',
            'country' => 'nullable',
            'district' => 'required_without:lat',
            'street' => 'required_without:lat',
            'building' => 'required',
            'floor' => 'required',
            'apartment_number' => 'required',
            'type' => 'required|in:home,work'
        ];
    }
}
