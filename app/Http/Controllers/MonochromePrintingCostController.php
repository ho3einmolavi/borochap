<?php

namespace App\Http\Controllers;

use App\Monochrome_Printing_Cost;
use App\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MonochromePrintingCostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'one_color_toner' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all());
        }

        $costs = Variable::orderBy('id' , 'DESC')->firstOrFail();
        $toner_matn_meshki = $costs->toner_matn_meshki;
        if ($request->one_color_toner == 'text')
        {
            $cost = $costs->jame_estelake_meshki + $toner_matn_meshki;
        }
        else if ($request->one_color_toner == 'text_picture')
        {
            $cost = $costs->jame_estelake_meshki + ($toner_matn_meshki * 3);
        }
        else
        {
            $cost = $costs->jame_estelake_meshki + ($toner_matn_meshki * 6);
        }


        return response()->json([
            'toner' => $request->one_color_toner ,
            'cost' => $cost ,
        ]);
    }

}
