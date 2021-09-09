<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Address\AddUserAddressRequest;
use App\Http\Requests\API\Address\UpdateUserAddressRequest;
use App\Http\Resources\AddressResource;
use App\Http\Traits\HelperTrait;
use App\Models\Address;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AddressController extends Controller
{
    use HelperTrait;

    public function user_add_address(AddUserAddressRequest $request)
    {
        $user = auth('api')->user();
        /******* prepare data *******/
        $data = $request->all();
        if ($request->lat && $request->long) {
            $data['en'] = get_address_from_google($request->lat, $request->long, 'en');
            $data['ar'] = get_address_from_google($request->lat, $request->long, 'ar');
        } else {
            $data['state'] = State::find($request->state_id)->name;
            $data = translated_fields(Address::class, $data);
            $data['country'] = App::getLocale() == 'en' ? 'United Arab Emirates' : 'الإمارات العربية المتحدة';
            $data['full_address'] = $data['street'] . '-' . $data['district'] . '-' . $data['state'] . '-' . $data['country'];
        }
        $data['user_id'] = $user->id;

        /******* save data *******/
        $result = $this->add(Address::class, $data);
        return responseSuccess(new AddressResource($result), __('cruds.created_success'));
    }

    public function user_get_address()
    {
        $user = auth('api')->user();
        $result = $this->getBy(Address::class, ['user_id' => $user->id], ['user']);
        return responseSuccess(AddressResource::collection($result));
    }

    public function user_delete_address($id)
    {
        $user = auth('api')->user();
        $result = $this->find(Address::class, ['id' => $id, 'user_id' => $user->id]);
        if (!$result) {
            return responseFail('there is no address with this id');
        }
        $result->delete();
        return responseSuccess([], 'deleted successfully');
    }

    public function user_update_address($id, UpdateUserAddressRequest $request)
    {
        $data = $request->all();
        $user = auth('api')->user();
        $result = $this->find(Address::class, ['id' => $id, 'user_id' => $user->id]);
        if (!$result) {
            return responseFail('there is no address with this id');
        }
        $result->update($data);
        return responseSuccess(new AddressResource($result), 'updated successfully');
    }
}
