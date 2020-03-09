<?php

namespace App\Http\Controllers;

use App\Type_discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TypeDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $item = Type_discount::orderBy('id' , 'DESC')->get();
        return new JsonResponse($item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function use(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'base' => 'required|numeric' ,
            'number' => 'required|numeric' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $type = DB::table('type_discounts')->orderBy('id' , 'DESC')->first();
        if ($type)
        {
            if ($request->number >= $type->number)
            {
                $amount = $type->amount;
                $cost = ((100 - $amount) * $request->base) /100;
                if ($cost < 1000)
                {
                    $cost = 1000;
                    return new JsonResponse($cost);
                }
                else
                {
                    return response()->json($cost);
                }
            }
            else
            {
                return response()->json('این تخفیف برای تیراژ '.$type->number.' به بالاست'  , 400);
            }
        }
        else
        {
            return response()->json('تخفیف مناسبتی وجود ندارد' , 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'amount' => 'required|integer|min:0' ,
            'number' => 'required|numeric' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $item = Type_discount::create([
            'amount' => $request->amount ,
            'number' => $request->number ,
            'text' => $request->text ,
        ]);

        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_discount  $type_discount
     * @return \Illuminate\Http\Response
     */
    public function show(Type_discount $type_discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_discount  $type_discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Type_discount $type_discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_discount  $type_discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_discount $type_discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_discount  $type_discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_discount $type_discount)
    {
        //
    }
}
