<?php

namespace App\Http\Controllers;

use App\Calculation;
use App\Material;
use App\Order;
use App\Size;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return float
     */
    public function create(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'size' => 'required' ,
            'circulation' => 'required' ,
            'material' => 'required' ,
            'one_color_number' => 'required' ,
            'one_color_toner' => 'required' ,
            'colorful_number' => 'required' ,
            'colorful_toner' => 'required' ,
            'cover_type' => 'required' ,
            'circle_cover' => 'required' ,
            'thickness' => 'required' ,
            'cover_material' => 'required' ,
            'edge' => 'required' ,
            'Binding' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json('لطفا تمامی مقادیر را کامل کنید' , 400);
        }

        $size = Size::where('name' , $request->size)->firstOrFail();
        $material = Material::where('name' , $request->material)->firstOrFail();
        $price = DB::table('material_size')->where('size_id' , $size->id)
            ->where('material_id' , $material->id)->first();
        if ($price)
        {
            $price = $price->price;
            $one_color_paper_cost = $price * ($request->one_color_number/2);
            $colorful_paper_cost = $price * ($request->colorful_number/2);
        }
        else {
            return response("قیمتی برای این سایز و جنس کاغذ تعیین نشده است", 400);
        }


        $res = $this->getOneColorPrintingCost($request);
        $res1 = $this->getOneColorProfitMargin($request);
        $res2 = $this->getColorfulPrintingCost($request);
        $res3 = $this->getColorfulProfitMargin($request);
        $res4 = $this->getCoverCost($request);
        $res5 = $this->getBinding($request);


        $calculation = [
            'one_color_paper_cost' => $one_color_paper_cost ,
            'one_color_toner' => round((($res['cost'] * $size->surface) / 0.060475) * $request->one_color_number),
            'one_color_profit' => round(($res1['final_profit'] * $size->surface) / 0.060475 ) * $request->one_color_number ,
            'colorful_paper_cost' => $colorful_paper_cost ,
            'colorful_toner' => round(($res2['cost'] * $size->surface) / 0.060475) * $request->colorful_number ,
            'colorful_profit' => round((($res3['final_profit'] * $size->surface) / 0.060475) * $request->colorful_number) ,
            'cover_cost' => $res4['final_cost'] ,
            'binding_cost' => $res5['cost']
        ];

        $cost = array_values($calculation);
        $book_price = round(array_sum($cost));
        $book_price = $book_price - ($book_price % 10);
        $final_price = $book_price * $request->circulation;


//        $calculation = Calculation::create([
//            'size_id' => $size->id ,
//            'material_id' => $material->id ,
//            'one_color_paper_cost' => $one_color_paper_cost ,
//            'one_color_toner' => round((($res['cost'] * $size->surface) / 0.060475) * $request->one_color_number),
//            'one_color_profit' => round(($res1['final_profit'] * $size->surface) / 0.060475 ) * $request->one_color_number ,
//            'colorful_paper_cost' => $colorful_paper_cost ,
//            'colorful_toner' => round(($res2['cost'] * $size->surface) / 0.060475) * $request->colorful_number ,
//            'colorful_profit' => round((($res3['final_profit'] * $size->surface) / 0.060475) * $request->colorful_number) ,
//            'cover_cost' => $res4['final_cost'] ,
//            'binding_cost' => $res5['cost'] ,
//            'book_cost' => $book_price,
//            'final_price' => round($final_price)
//        ]);

         $order = [
           // 'calculation_id' => $calculation->id ,
            'size' => $request->size ,
            'circulation' => $request->circulation ,
            'material' => $request->material ,
            'one_color_number' =>  $request->one_color_number ,
            'one_color_toner' => $request->one_color_toner ,
            'colorful_number' => $request->colorful_number ,
            'colorful_toner' => $request->colorful_toner ,
            'cover_type' => $request->cover_type ,
            'circle_cover' => $request->circle_cover ,
            'thickness' => $request->thickness ,
            'cover_material' => $request->cover_material  ,
            'edge' => $request->edge  ,
            'Binding' => $request->Binding ,
            'book_cost' => $book_price,
            'final_price' => round($final_price) ,
            'date' => Jalalian::forge('now')->format('Y/m/d')
        ];

         if ($request->without_paper == 1)
         {
             if (\auth()->user())
             {
                 if (auth()->user()->exclusiveDiscount)
                 {
                     $amount = auth()->user()->exclusiveDiscount->amount;
                     $papersCost = ($colorful_paper_cost + $one_color_paper_cost) * $request->circulation * 0.9;
                     $order['final_price'] = ($order['final_price'] - $papersCost) * (100 - $amount)/100;
                 }
                 else {
                     $papersCost = ($colorful_paper_cost + $one_color_paper_cost) * $request->circulation * 0.9;
                     $order['final_price'] = ($order['final_price'] - $papersCost);
                 }
             }
             else
             {
                 $papersCost = ($colorful_paper_cost + $one_color_paper_cost) * $request->circulation * 0.9;
                 $order['final_price'] = ($order['final_price'] - $papersCost);
             }
         }

        return response()->json($order);

    }

    public function getOneColorPrintingCost(Request $request)
    {
        $oneColorPrintingCost = new MonochromePrintingCostController();
        $res = $oneColorPrintingCost->create($request);
        return $res->getOriginalContent();
    }

    public function getOneColorProfitMargin(Request $request)
    {
        $MonochromeProfitMargin = new MonochromeProfitMarginController();
        $res = $MonochromeProfitMargin->create($request);
        return $res->getOriginalContent();
    }

    public function getColorfulPrintingCost(Request $request)
    {
        $ColorfulPrintingCost = new ColorfulPrintingCostController();
        $res = $ColorfulPrintingCost->create($request);
        return $res->getOriginalContent();
    }

    public function getColorfulProfitMargin(Request $request)
    {
        $ColorfulProfitMargin = new ColorfulProfitMarginController();
        $res = $ColorfulProfitMargin->create($request);
        return $res->getOriginalContent();
    }

    public function getCoverCost(Request $request)
    {
        $CoverCost = new CoverCostController();
        $res = $CoverCost->create($request);
        return $res->getOriginalContent();
    }

    public function getBinding(Request $request)
    {
        $binding = new BindingController();
        $res = $binding->create($request);
        return $res->getOriginalContent();
    }



}
