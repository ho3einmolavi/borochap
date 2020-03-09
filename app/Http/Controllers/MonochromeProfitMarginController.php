<?php

namespace App\Http\Controllers;

use App\Monochrome_Profit_Margin;
use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MonochromeProfitMarginController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'one_color_number' => 'required' ,
            'circulation' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all());
        }

        $costs = Variable::orderBy('id' , 'DESC')->firstOrFail();


        $desired = $costs->sude_morede_nazar;
        $number = $request->one_color_number;
        $Circulation = $request->circulation;
        $discount = 1;
        if ($number * $Circulation <= 1000)
        {
            $discount = 1;
        }
        else if ($number * $Circulation <= 1999)
        {
            $discount = 0.92;
        }
        else if ($number * $Circulation <= 3999)
        {
            $discount = 0.9;
        }
        else if ($number * $Circulation <= 4999)
        {
            $discount = 0.88;
        }
        else if ($number * $Circulation <= 9999)
        {
            $discount = 0.86;
        }
        else if ($number * $Circulation <= 19999)
        {
            $discount = 0.84;
        }
        else if ($number * $Circulation <= 39999)
        {
            $discount = 0.82;
        }
        else if ($number * $Circulation <= 59999)
        {
            $discount = 0.8;
        }
        else if ($number * $Circulation > 59999)
        {
            $discount = 0.75;
        }


        $profit = ($desired * $discount);

        return response()->json([
            'desired_profit' => $desired ,
            'discount' => $discount ,
            'final_profit' => $profit
        ]);

    }
}
