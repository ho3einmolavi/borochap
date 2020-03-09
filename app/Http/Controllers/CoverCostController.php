<?php

namespace App\Http\Controllers;

use App\Size;
use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoverCostController extends Controller
{
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'circulation' => 'required' ,
            'thickness' => 'required' ,
            'edge' => 'required' ,
            'size' => 'required' ,
            'cover_type' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all());
        }

        $costs = Variable::orderBy('id' , 'DESC')->firstOrFail();

        $desired = $costs->hazine_jeld_selefon;
        $size = Size::where('name' , $request->size)->firstOrFail();

        if ($request->thickness == 200)
        {
            $thick = 0.9;
        }
        elseif ($request->thickness == 250)
        {
            $thick = 1;
        }
        elseif ($request->thickness == 300)
        {
            $thick = 1.2;
        }
        else {
            return response([
                'error' => "something went wrong in CoverCostController"
            ] , 400);
        }

        if ($request->edge == 0)
        {
            $edge = 1;
        }
        elseif ($request->edge == 1)
        {
            $edge = 1.5;
        }
        elseif ($request->edge == 2)
        {
            $edge = 2;
        }

        if ($request->circulation == 1)
        {
            $discount = 5;
        }
        elseif ($request->circulation <= 5)
        {
            $discount = 4;
        }
        elseif ($request->circulation <= 10)
        {
            $discount = 3;
        }
        elseif ($request->circulation <= 20)
        {
            $discount = 2;
        }
        elseif ($request->circulation <= 49)
        {
            $discount = 1.5;
        }
        elseif ($request->circulation <= 99)
        {
            $discount = 1;
        }
        elseif ($request->circulation <= 199)
        {
            $discount = 0.95;
        }
        elseif ($request->circulation <= 499)
        {
            $discount = 0.9;
        }
        elseif ($request->circulation <= 999)
        {
            $discount = 0.85;
        }
        elseif ($request->circulation > 999)
        {
            $discount = 0.8;
        }
        else{
            return response([
                'error' => "something went wrong in CoverCostController"
            ] , 400);
        }

        $finalCost = ($desired * $discount * $edge * $thick);
        if ($size->surface == 0.0408)
        {
            $finalCost = ($finalCost * 0.85);
        }
        else if ($size->surface == 0.0319 || $size->surface == 0.029725)
        {
            $finalCost = ($finalCost * 0.61625);
        }
        else if($size->surface == 0.0225)
        {
            $finalCost = ($finalCost * 0.4128875);
        }
        else if($size->surface == 0.0361)
        {
            $finalCost = ($finalCost * 0.5695);
        }
        else if($size->surface == 0.0231)
        {
            $finalCost = (($finalCost * 0.85) / 2);
        }
        else if($size->surface == 0.0204)
        {
            $finalCost = (($finalCost * 0.85) / 2);
        }

        if ($request->cover_type == 'دو رو')
        {
            $finalCost = $finalCost * 1.8;
        }


        return response()->json([
            'desired_cost' => $desired ,
            'discount' => $discount ,
            'edge' => $edge ,
            'thickness' => $thick ,
            'final_cost' => $finalCost
        ]);
    }
}
