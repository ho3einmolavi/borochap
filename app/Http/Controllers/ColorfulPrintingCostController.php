<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorfulPrintingCostController extends Controller
{
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'colorful_toner' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all());
        }

        $costs = Variable::orderBy('id' , 'DESC')->firstOrFail();
        $toner_rangi_estelak = $costs->toner_rangi_estelak;

        if ($request->colorful_toner == 'text')
        {
            $cost = $toner_rangi_estelak + $costs->toner_rangi_matn;
        }
        else if ($request->colorful_toner == 'text_picture')
        {
            $cost = $toner_rangi_estelak + $costs->toner_rangi_matn_tasvir;
        }
        else
        {
            $cost = $toner_rangi_estelak + $costs->toner_rangi_tasvir;
        }


        return response()->json([
            'toner' => $request->colorful_toner ,
            'cost' => $cost ,
        ]);
    }
}
