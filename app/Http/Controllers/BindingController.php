<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BindingController extends Controller
{
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'Binding' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all());
        }

        $costs = Variable::orderBy('id' , 'DESC')->firstOrFail();

        if ($request->Binding == "چسب گرم")
        {
            $cost = $costs->chasbe_garm;
        }
        elseif ($request->Binding == "جلد سخت")
        {
            $cost = $costs->jelde_sakht;
        }
        elseif ($request->Binding == "فنر زنی")
        {
            $cost = $costs->fanar_zani;
        }
        elseif ($request->Binding == "منگنه زنی")
        {
            $cost = $costs->mangane_zani;
        }
        else
        {
            return \response()->json([
               'error' => 'نوع صحافی را صحیح وارد کنید'
            ] , 400);
        }

        return \response()->json([
            'type' => $request->Binding ,
            'cost' => $cost
        ]);
    }
}
