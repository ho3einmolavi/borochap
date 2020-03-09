<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class sendMessageController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone' => ['required', 'string', 'max:255' , 'exists:users' , 'iran_mobile'],
            'template' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        if ($request->template == 'borochap')
        {
            $code = $request->code;
            $body = [
                'receptor' => $request->phone,
                'token' => $code,
                'template' => $request->template
            ];
        }
        if ($request->template == 'borochapCheckout')
        {
            $code = $request->code;
            $body = [
                'receptor' => $request->phone,
                'token' => $code,
                'template' => $request->template
            ];
        }
      //  $code = rand(100000, 999999);
        $client = new Client();
        $body = [
            'receptor' => $request->phone,
            'token' => $code,
            'template' => $request->template
        ];
        $headers = [
            'Accept' => 'application/json',
//            'Content-Length' => 411
        ];


        $response = $client->post('https://api.kavenegar.com/v1/78645A53426B482B63316372637968556838724F2B712B4B5252587236434C31446A466C506A542F6D5A343D/verify/lookup.json', [
            'form_params' => $body,
            'headers' => $headers
        ]);


        if ($response->getStatusCode() == 200)
        {
            return response()->json([
                'message' => ['کد تایید برای شما ارسال شد'] ,
                'status' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'an error occurred' ,
            'status' => 'error' ,
            'code' => $response->getStatusCode()
        ] , 400);
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone_number' => ['required' , 'iran_mobile'],
            'first_name' => ['required'],
            'code' => ['required'],
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }

        $client = new Client();

        $body = [
            'receptor' => $request->phone_number,
            'token' => $request->first_name,
            'token2' => $request->code,
            'template' => 'order'
        ];
        $headers = [
            'Accept' => 'application/json',
//            'Content-Length' => 411
        ];


        $response = $client->post('https://api.kavenegar.com/v1/78645A53426B482B63316372637968556838724F2B712B4B5252587236434C31446A466C506A542F6D5A343D/verify/lookup.json', [
            'form_params' => $body,
            'headers' => $headers
        ]);

        if ($response->getStatusCode() == 200)
        {
            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'an error occurred' ,
            'status' => 'error' ,
            'code' => $response->getStatusCode()
        ] , 400);
    }
}
