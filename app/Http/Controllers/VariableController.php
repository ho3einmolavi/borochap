<?php

namespace App\Http\Controllers;

use App\Size;
use App\Variable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $var = Variable::orderBy('id' , 'DESC')->first();
        if ($var)
        {
            if ($var->hazine_jeld_selefon)
            {
                $obj = json_decode($var->hazine_jeld_selefon);
                $obj1 = $obj;
                $ids = Size::all()->pluck('id');
                foreach ($obj as $key => $item)
                {
                    $flag = 0;
                    foreach ($ids as $id)
                    {
                        if ($id == $item->id)
                        {
                            $flag = 1;
                        }
                    }
                    if ($flag == 0)
                    {
                        unset($obj[$key]);
                    }
                }
                if ($obj != $obj1)
                {
                    $var->update([
                       'hazine_jeld_selefon' => $obj
                    ]);
                }
            }


            return new JsonResponse([$var]);
        }
        else
        {
            $var = Variable::create([
                'jame_estelake_meshki' => ''
            ]);

            return new JsonResponse([$var]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variables = Variable::orderBy('id' , 'DESC')->first();
        if (! $variables)
        {
            $variables = Variable::create([
                'jame_estelake_meshki' => $request->jame_estelake_meshki ,
                'toner_matn_meshki' => $request->toner_matn_meshki ,
                'sude_morede_nazar' => $request->sude_morede_nazar ,
                'koliye_tahrirha' => $request->koliye_tahrirha ,
                'koliye_gelaseha' => $request->koliye_gelaseha ,
                'toner_rangi_matn' => $request->toner_rangi_matn ,
                'toner_rangi_matn_tasvir' => $request->toner_rangi_matn_tasvir ,
                'toner_rangi_tasvir' => $request->toner_rangi_tasvir ,
                'toner_rangi_estelak' => $request->toner_rangi_estelak ,
                'hazine_jeld_selefon' => $request->hazine_jeld_selefon ,
                'chasbe_garm' => $request->chasbe_garm ,
                'jelde_sakht' => $request->jelde_sakht ,
                'fanar_zani' => $request->fanar_zani ,
                'mangane_zani' => $request->mangane_zani ,
            ]);
        }

        else
        {
            $variables->update([
                'jame_estelake_meshki' => $request->jame_estelake_meshki ,
                'toner_matn_meshki' => $request->toner_matn_meshki ,
                'sude_morede_nazar' => $request->sude_morede_nazar ,
                'koliye_tahrirha' => $request->koliye_tahrirha ,
                'koliye_gelaseha' => $request->koliye_gelaseha ,
                'toner_rangi_matn' => $request->toner_rangi_matn ,
                'toner_rangi_matn_tasvir' => $request->toner_rangi_matn_tasvir ,
                'toner_rangi_tasvir' => $request->toner_rangi_tasvir ,
                'toner_rangi_estelak' => $request->toner_rangi_estelak ,
                'hazine_jeld_selefon' => $request->hazine_jeld_selefon ,
                'chasbe_garm' => $request->chasbe_garm ,
                'jelde_sakht' => $request->jelde_sakht ,
                'fanar_zani' => $request->fanar_zani ,
                'mangane_zani' => $request->mangane_zani ,
            ]);
        }


        return response([
            'message' => 'متغیر های جدید اضافه شد' ,
            'variables' => $variables
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function show(Variable $variable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        //
    }
}
