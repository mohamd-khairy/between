<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Http\Traits\HelperTrait;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use HelperTrait;

    public function get_subscription()
    {
        $user = auth('api')->user();

        if (request('subscription_id')) {
            $data = $this->findWith(Subscription::class, ['user_id' => $user->id, 'id' => request('subscription_id')], [
                'user',
                'target',
                'meal_number',
                'prefered_time',
                'dish',
                'food',
                'address',
            ]);
            if (!$data) {
                return responseFail('there is no subscription with this id');
            }
            $data = new SubscriptionResource($data);
        } else {
            $data = SubscriptionResource::collection($this->getBy(Subscription::class, ['user_id' => $user->id], [
                'user',
                'target',
                'meal_number',
                'prefered_time',
                'dish',
                'food',
                'address',
            ]));
        }
        return responseSuccess($data);
    }

    public function add_subscription(SubscriptionRequest $request)
    {
        $user = auth('api')->user();
        /******* prepare data *******/
        $data = $request->all();
        $data['user_id'] = $user->id;

        /******* save data *******/
        $result = $this->add(Subscription::class, $data);
        return responseSuccess($result, __('cruds.created_success'));
    }
}
