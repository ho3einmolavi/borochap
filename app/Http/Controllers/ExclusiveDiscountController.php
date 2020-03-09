<?php

namespace App\Http\Controllers;

use App\Exclusive_discount;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExclusiveDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $items = Exclusive_discount::all();
        return new JsonResponse($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'amount' => 'required|integer|min:0|max:100' ,
            'user_id' => 'required|numeric' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $user = User::where('id' , $request->user_id)->firstOrFail();

        $item = Exclusive_discount::create([
            'amount' => $request->amount ,
            'user_id' => $request->user_id
        ]);

        $user->update([
            'Exclusive_discounts_id' => $item->id
        ]);

        return new JsonResponse($item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function use(Request $request)
    {
        $user = auth()->user();
        $valid = Validator::make($request->all() ,[
            'base' => 'required|integer|min:0' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $item = $user->exclusiveDiscount;
        $amount = $item->amount;
        $cost = ((100 - $amount) * $request->base) /100;
        if ($cost < 1000)
        {
            $cost = 1000;
            return new JsonResponse($cost);
        }
        else
        {
            return new JsonResponse($cost);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exclusive_discount  $exclusive_discount
     * @return \Illuminate\Http\Response
     */
    public function show(Exclusive_discount $exclusive_discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exclusive_discount  $exclusive_discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Exclusive_discount $exclusive_discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exclusive_discount  $exclusive_discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exclusive_discount $exclusive_discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'user_id' => 'required|numeric' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $user = User::find($request->user_id);
        if ($user)
        {
            if ($user->exclusiveDiscount)
            {
                DB::table('exclusive_discounts')->where('id' , $user->exclusiveDiscount->id)
                    ->delete();

                $user->update([
                    'Exclusive_discounts_id' => 0
                ]);

                return new JsonResponse('item deleted');
            }
            return new JsonResponse('تخفیفی وجود ندارد' , 404);
        }
        return new JsonResponse('user not found' , 404);
    }
}
