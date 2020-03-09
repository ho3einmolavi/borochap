<?php

namespace App\Http\Controllers;

use App\Material;
use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorfulProfitMarginController extends Controller
{
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'colorful_number' => 'required' ,
            'circulation' => 'required' ,
            'material' => 'required'
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all());
        }

        $material = Material::where('name' , $request->material)->firstOrFail();
        $desired = '';
        $costs = Variable::orderBy('id' , 'DESC')->firstOrFail();
        if ($material->type == 'گلاسه')
        {
            $desired = $costs->koliye_gelaseha;
        }
        else if ($material->type == 'تحریر')
        {
            $desired = $costs->koliye_tahrirha;
        }

        if ($desired == '')
        {
            return response([
                'error' => "something went wrong in ColorfulProfitMarginController"
            ] , 400);
        }
        $number = $request->colorful_number;
        $Circulation = $request->circulation;
        $discount = 1;

        if ($number * $Circulation <= 50)
        {
            $discount = 0.85;
        }
        else if ($number * $Circulation <= 100)
        {
            $discount = 0.8;
        }
        else if ($number * $Circulation <= 200)
        {
            $discount = 0.75;
        }
        else if ($number * $Circulation <= 300)
        {
            $discount = 0.7;
        }
        else if ($number * $Circulation <= 500)
        {
            $discount = 0.65;
        }
        else if ($number * $Circulation <= 1000)
        {
            $discount = 0.6;
        }
        else if ($number * $Circulation <= 2000)
        {
            $discount = 0.55;
        }
        else if ($number * $Circulation <= 3000)
        {
            $discount = 0.5;
        }
        else if ($number * $Circulation <= 5000)
        {
            $discount = 0.45;
        }
        else if ($number * $Circulation <= 10000)
        {
            $discount = 0.4;
        }
        else if ($number * $Circulation <= 15000)
        {
            $discount = 0.35;
        }
        else if ($number * $Circulation <= 100000)
        {
            $discount = 0.3;
        }
        else if ($number * $Circulation > 100000)
        {
            $discount = 0.2;
        }

        $profit = $desired * $discount;

        return response()->json([
            'desired_profit' => $desired ,
            'discount' => $discount ,
            'final_profit' => $profit
        ]);

    }
}
