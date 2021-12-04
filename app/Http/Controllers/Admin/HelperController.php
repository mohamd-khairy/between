<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DayNumber;
use App\Models\MealNumber;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function user_addresses($user_id)
    {
        return Address::where('user_id', $user_id)->get();
    }

    public function diet_day_numbers($diet_id)
    {
        return DayNumber::where('diet_id', $diet_id)->get();
    }

    public function diet_meal_numbers($diet_id)
    {
        return MealNumber::where('diet_id', $diet_id)->get();
    }
}
