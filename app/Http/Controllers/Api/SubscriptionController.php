<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SubscriptionRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\SubscriptionResource;
use App\Http\Traits\HelperTrait;
use App\Models\Coupon;
use App\Models\DayNumber;
use App\Models\MealNumber;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                'paymentmethod'
            ]);
            if (!$data) {
                return responseFail('there is no subscription with this id');
            }
            $data = new SubscriptionResource($data);
        } else if (request('order_id')) {
            $data = $this->findWith(Order::class, ['user_id' => $user->id, 'id' => request('order_id')], [
                'user',
            ]);
            if (!$data) {
                return responseFail('there is no order with this id');
            }
            $data = new OrderResource($data);
        } else {
            $data['subscriptions'] = SubscriptionResource::collection($this->getBy(Subscription::class, ['user_id' => $user->id], [
                'user',
                'target',
                'meal_number',
                'prefered_time',
                'dish',
                'food',
                'address',
                'paymentmethod'
            ]));

            $data['orders'] = OrderResource::collection($this->getBy(Order::class, ['user_id' => $user->id], [
                'user',
            ]));
        }
        return responseSuccess($data);
    }

    public function add_subscription(SubscriptionRequest $request)
    {
        $user = auth('api')->user();
        $meal_number = MealNumber::find($request->meal_number_id);
        $day_number = DayNumber::find($request->day_number_id);
        $paymentMethods = PaymentMethod::where('key', 'cash')->first();

        /******* prepare data *******/
        $data = $request->all();
        $data['payment_method_id'] = $paymentMethods ? $paymentMethods->id : null;
        $data['weight'] = $user->weight;
        $data['height'] = $user->height;
        $data['gender'] = $user->gender;
        $data['user_id'] = $user->id;
        $data['delivery_fees'] = config('delivery_fees', 0) ?? 0;
        $data['package_value'] = ($meal_number->price * $day_number->number) ?? null;
        $data['total'] =  ($data['package_value'] + $data['delivery_fees']) ?? null;

        /******* save data *******/
        $result = $this->add(Subscription::class, $data);
        return responseSuccess(new SubscriptionResource($result), __('cruds.created_success'));
    }

    public function coupon(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'code' => 'required|exists:coupons,code',
            'subscription_id' => 'nullable|required_without:order_id|exists:subscriptions,id',
            'order_id' => 'nullable|required_without:subscription_id|exists:orders,id',
            'plus' => 'required|in:1,0'
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        $coupon = Coupon::where('code', $request->code)->where(function ($q) {
            $q->whereDate('start_date', '<=', date('Y-m-d'))
                ->whereDate('end_date', '>=', date('Y-m-d'));
        })->first();

        if (!$coupon) {
            return responseFail('this code is not available');
        }

        if ($request->subscription_id) {
            $data = Subscription::find($request->subscription_id);
        } elseif ($request->order_id) {
            $data = Order::find($request->order_id);
        }

        if ($request->plus == 0) {
            $coupon_code = null;
            $coupon_discount = 0;
        } else {
            $coupon_code = $coupon->code;
            if ($coupon->type == 'cash') {
                $coupon_discount = $coupon->discount;
            } elseif ($coupon->type == 'percentage') {
                $coupon_discount = (($data->package_value * $coupon->discount) / 100);
            }
        }

        $total = (($data->package_value + $data->delivery_fees) - $coupon_discount) ?? null;
        $data->update(['coupon_code' => $coupon_code, 'coupon_discount' => $coupon_discount, 'total' => $total < 0 ? 0 : $total]);

        if ($request->subscription_id) {
            return responseSuccess(new SubscriptionResource($data));
        } elseif ($request->order_id) {
            return responseSuccess(new OrderResource($data));
        } else {
            return null;
        }
    }

    public function payment(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'subscription_id' => 'nullable|required_without:order_id|exists:subscriptions,id',
            'order_id' => 'nullable|required_without:subscription_id|exists:orders,id',
            'payment' => 'required|in:1,0'
        ]);

        if ($validateData->fails()) {
            return responseFail($validateData->errors()->first());
        }

        if ($request->subscription_id) {
            $data = Subscription::find($request->subscription_id);
        } elseif ($request->order_id) {
            $data = Order::find($request->order_id);
        }

        if ($request->payment == 1) {
            $status = 'in_progress';
        } else {
            $status = 'cancel';
        }
        return responseSuccess($data->update(['status' => $status]));
    }
}
