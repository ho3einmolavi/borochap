<?php

namespace App\Http\Controllers;

use App\Http\Resources\PricesCollection;
use App\Material;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Material_SizeController extends Controller
{
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'size' => 'required' ,
            'material' => 'required' ,
            'price' => 'required'
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $size = Size::where('name' , $request->size)->firstOrFail();
        $material = Material::where('name' , $request->material)->firstOrFail();

        $db = DB::table('material_size')->where('size_id' , $size->id)
            ->where('material_id' , $material->id)->first();

        if (is_null($db))
        {
            $material->sizes()->attach($size);
            DB::table('material_size')->where('size_id' , $size->id)
                ->where('material_id' , $material->id)->update([
                    'price' => $request->price
                ]);

        }
        else {
            DB::table('material_size')->where('size_id' , $size->id)
                ->where('material_id' , $material->id)->update([
                    'price' => $request->price
                ]);
        }
        return "success";
    }

    public function index()
    {
        $res = DB::table('material_size')->get();
        $arr = [];

        foreach ($res as $key => $item)
        {
            $arr[$key]['id'] = $item->id;
            $material = Material::find($item->material_id);
            $arr[$key]['material'] = $material['name'];
            $size = Size::find($item->size_id);
            $arr[$key]['size'] = $size['name'];
            $arr[$key]['price'] = $item->price;
        }

        return response()->json($arr);
    }
}
