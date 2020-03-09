<?php

namespace App\Http\Controllers;

use App\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function off(Request $request)
    {
        $user = auth()->user();
        if ($request->name == '')
        {
            return response('' , 400);
        }

        $valid = Validator::make($request->all() ,[
            'base' => 'required|numeric' ,
            'name' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all(), 450);
        }

        $name = Discount::where('name' , $request->name)->first();

        if (is_null($name))
        {
            return response()->json("کد تخفیف معتبر نیست" , 404);
        }

        if ($user->last_discount_code === $name->name)
        {
            return response()->json("این کد تخفیف برای شما فعال نیست" , 404);
        }

        $user->update([
            'last_discount_code' => $name->name
        ]);

        if (($request->base - $name->amount) < 1000)
        {
            return response([
                'cost_after_off' => 1000
            ]);
        }
        else
        {
            return response([
                'cost_after_off' => ($request->base - $name->amount)
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'name' => 'required|unique:discounts' ,
            'amount' => 'required|numeric' ,
            'expire' => 'required|date'
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $off = Discount::create([
            'name' => $request->name ,
            'amount' => $request->amount ,
            'expire' => $request->expire ,
        ]);
        return response($off);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $off = Discount::all();
        $arr = [];
        foreach ($off as $item)
        {
            $date = Jalalian::forge($item->expire)->format('%A, %d %B %y');
            $arr[] = [$item , $date];
        }

        return response()->json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
