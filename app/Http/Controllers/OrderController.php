<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Order;
use App\Pay;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class OrderController extends Controller
{
    public function RequestForPay($id)
    {
        $order = Order::find($id);
        if ($order)
        {
            $order->update([
                'status' => 'درخواست تسویه'
            ]);
            return response()->json($order);
        }
        else
        {
            return response()->json([
                'message' => 'order not found'
            ] , 404);
        }
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all() ,[
            'size' => 'required' ,
            'material' => 'required' ,
            'one_color_number' => 'required' ,
            'one_color_toner' => 'required' ,
            'colorful_number' => 'required' ,
            'colorful_toner' => 'required' ,
            'cover_type' => 'required' ,
            'thickness' => 'required' ,
            'circle_cover' => 'required' ,
            'cover_material' => 'required' ,
            'edge' => 'required' ,
            'Binding' => 'required' ,
            'circulation' => 'required' ,
            'book_cost' => 'required' ,
            'final_price' => 'required' ,
            'paid' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return response()->json($valid->errors()->all() , 400);
        }

        $user = Auth::user();
        $code = rand(10000 , 1000000) ;
        $tarikh = Jalalian::now()->format('%A, %d %B %y');
        $customer = $user->first_name .' '. $user->last_name;
        $order = Order::create([
            'pay_id' => $request->pay_id ,
            'user_id' => $user->id ,
            'file_id' => $user->files()->orderBy('id' , 'DESC')->first()->id ,
            'customer' => $customer ,
            'code' => 'BR'.$user->id .''.$code ,
            'size' => $request->size ,
            'material' =>  $request->material ,
            'one_color_number' =>  $request->one_color_number ,
            'circle_cover' =>  $request->circle_cover ,
            'status' =>  $request->status ,
            'one_color_toner' =>  $request->one_color_toner ,
            'colorful_number' =>  $request->colorful_number ,
            'colorful_toner' =>  $request->colorful_toner ,
            'cover_type' =>  $request->cover_type ,
            'thickness' =>  $request->thickness ,
            'cover_material' =>  $request->cover_material ,
            'edge' =>  $request->edge ,
            'Binding' =>  $request->Binding ,
            'circulation' =>  $request->circulation ,
            'book_cost' =>  $request->book_cost ,
            'final_price' =>  $request->final_price ,
            'paid' =>  $request->paid ,
            'tarikh' =>  $tarikh ,
        ]);

        if ($request->has('pay_id'))
        {
            $pay = Pay::where('transaction_id' , $request->pay_id)->first();
            $pay->update([
                'order_id' => $order->id
            ]);
        }

        if ($request->has('finance'))
        {
            $finance = Finance::find($request->finance);
            $finance->update([
                'order_id' => $order->id
            ]);
        }
        return response()->json($order);
    }

    public function index()
    {
        $orders = Order::orderBy('id' , 'DESC')->get();

        foreach ($orders as $order)
        {
            if ($order['paid'] != $order['final_price'])
            {
                $order['invoices'] = $order->invoices;
                $sum = 0;
                foreach ($order['invoices'] as $invoice)
                {
                    $sum +=$invoice['price'];
                }


                if ($sum == $order['final_price'])
                {
                    Order::where('id' , $order['id'])->update([
                        'paid' => $order['final_price']
                    ]);
                }
            }
        }
        //return response()->json($res);
       return response()->json($orders);
    }

    public function single($id)
    {
        $order = Order::find($id);
        $user = $order->user;
        return response()->json(['order' => $order , 'user' => $user]);
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);

        if ($order->delete())
        {
            return response('the order is deleted successfully' , 200);
        }

        return response('This order could not be deleted' , 400);
    }

    public function verification($id)
    {
        $order = Order::find($id);
        if ($order)
        {
            $order->update([
                'verification' => 1
            ]);

            return response('success');
        }

        return response('something went wrong in orderController (order not found)' , 400);
    }

    public function userOrders()
    {
        $user = auth()->user();
        $orders = $user->orders;
        foreach ($orders as $order)
        {
            $order['user'] = [
                'fullname' => "{$user->first_name} {$user->last_name}" ,
                'address' => $user->address ,
                'postal_code' => $user->postal_code ,
                'phone' => $user->phone ,
                'mobile' => $user->username ,
                'office' => $user->printing_office ,
                'office_number' => $user->printing_office_number ,
                'delivery' => $user->delivery
            ];
            if ($order['paid'] != $order['final_price'])
            {
                $order['invoices'] = $order->invoices;
                $sum = 0;
                foreach ($order['invoices'] as $invoice)
                {
                    $sum +=$invoice['price'];
                }

                if ($sum == $order['final_price'])
                {
                    Order::where('id' , $order['id'])->update([
                        'paid' => $order['final_price']
                    ]);
                }
            }
        }
        return response()->json($user->orders);
    }
}
