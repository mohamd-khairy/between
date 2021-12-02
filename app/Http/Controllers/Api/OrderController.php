<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Http\Requests\API\SubscriptionRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\SubscriptionResource;
use App\Http\Traits\HelperTrait;
use App\Models\Coupon;
use App\Models\DayNumber;
use App\Models\Food;
use App\Models\MealNumber;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use HelperTrait;

    public function add_order(OrderRequest $request)
    {
        $user = auth('api')->user();

        try {
            DB::beginTransaction();
            /******* prepare data *******/
            $data = $request->all();
            $data['address_id'] = $request->address_id;
            $data['user_id'] = $user->id;
            $data['order_date'] = now();
            $data['delivery_fees'] = config('delivery_fees', 0) ?? 0;
            $data['package_value'] = null;
            $data['total'] = ($data['package_value'] + $data['delivery_fees']) ?? null;
            $order = $this->add(Order::class, $data);
            if ($order) {
                $order_foods = [];
                $total = 0;
                foreach ($request->foods as $item) {
                    $food = Food::find($item['food_id']);
                    $total += ($food->price * $item['qty']);
                    array_push($order_foods, [
                        'food_id' => $food->id,
                        'order_id' => $order->id,
                        'qty' => $item['qty'],
                        'price' => ($food->price * $item['qty'])
                    ]);
                }
                OrderFood::insert($order_foods);
                $order->update(['package_value' => $total, 'total' => $total]);
                DB::commit();
                return responseSuccess(new OrderResource($order), __('cruds.created_success'));
            }

            return null;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return null;
        }
    }
}
