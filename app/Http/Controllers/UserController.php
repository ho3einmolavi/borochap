<?php

namespace App\Http\Controllers;

use App\Exclusive_discount;
use App\Finance;
use App\Type_discount;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;


class UserController extends Controller
{
    public function checkAndUsePrepayment(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'base' => ['required', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }

        $user = \auth()->user();

        $prepayment = $user->prepayment;

        if ($prepayment)
        {
            $res = ($request->base) * ($prepayment/100);

            return response()->json([
                'cost' => $res ,
                'status' => 'success'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'برای این کاربر پیش پرداخت تعریف نشده است' ,
                'status' => 'error'
            ] , 404);
        }
    }

    public function checkAndUseCredit(Request $request)
    {
        //validation data
        $validator = Validator::make($request->all() ,[
            'base' => ['required', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }
        $user = \auth()->user();

        $credit = $user->credit_limit;

        $res = ($credit) - ($request->base);
        if ($res < 0)
        {
            return response()->json([
                'credit' => $user->credit_limit ,
                'message' => 'اعتبار کافی نیست'
            ]);
        }
        else
        {
            $finance = Finance::create([
                'user_id' => $user->id ,
                'amount' => abs($user->credit_limit - $res) ,
                'remain' => $res ,
                'action' => 0 ,
            ]);
            $user->update([
                'credit_limit' => $res
            ]);
            return response()->json([
                'credit' => $res ,
                'message' => 'success' ,
                'finance_id' => $finance->id
            ]);
        }
    }

    public function set_prepayment($id , Request $request)
    {
        //validation data
        $validator = Validator::make($request->all() ,[
            'prepayment' => ['nullable', 'numeric' , 'min:0' , 'max:100'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }

        $user = User::find($id);
        $user->update([
            'prepayment' => $request->prepayment
        ]);

        return response()->json([
            'message' => "prepayment is set" ,
            'prepayment' => $user->prepayment
        ]);
    }

    public function set_credit_limit($id , Request $request)
    {
        //validation data
        $validator = Validator::make($request->all() ,[
            'credit_limit' => ['nullable', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }

        $user = User::find($id);
        if (($user->credit_limit - $request->credit_limit) <= 0)
        {
            $action = 1;
        }
        else
        {
            $action = 0;
        }

        Finance::create([
            'user_id' => $user->id ,
            'amount' => abs($request->credit_limit - $user->credit_limit) ,
            'remain' => $request->credit_limit ,
            'action' => $action
        ]);

        $user->update([
            'credit_limit' => $request->credit_limit
        ]);



        return response()->json([
            'message' => "credit limit is set" ,
            'user_credit_limit' => $user->credit_limit
        ]);
    }

    public function checkForDiscount(Request $request)
    {
        $user = auth()->user();
        $special = $user->exclusiveDiscount;
        if (!$special)
        {
            $type = Type_discount::latest('id')->first();

            if (! $type)
            {
                return response()->json([
                    'message' => 'شما فقط میتوانید از کد تخفیف استفاده کنید' ,
                    'status' => 3
                ]);
            }
            else
            {
                return response()->json([
                    'message' => 'شما فقط میتوانید از تخفیف مناسبتی استفاده کنید' ,
                    'status' => 1
                ]);
            }
        }
        else
        {
            return response()->json([
                'message' => 'شما فقط میتوانید از تخفیف اختصاصی استفاده کنید' ,
                'status' => 2
            ]);

        }
    }

    public function index()
    {
        $users = User::all();
        return new JsonResponse($users);
    }

    public function register(Request $request)
    {
        //validation data
        $validator = Validator::make($request->all() ,[
            'password' => ['required', 'string', 'min:4' , 'regex:#^[ -~£±§]*$#'],
            'email' => ['nullable', 'email' , 'unique:users'],
            'confirm' => ['required' , 'string'],
            'gender' => ['required'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'numeric' , 'iran_mobile'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }
        $phone = User::where('phone' , $request->phone)->first();
        if (! is_null($phone))
        {
            return new JsonResponse("این شماره قبلا ثبت نام کرده است", 400);
        }
        else
        {
            if ($request->password === $request->confirm)
            {
                if ($request->has('file') && $request->file != null && $request->file != '')
                {
                    $image = $request->file('file');
                    $name = $image->getClientOriginalName();
                    $image->move(public_path('/LICENSES/'.$request->first_name. '.' .$request->last_name .'/') , $name);
                    $user = User::create([
                        'password' => bcrypt($request->password) ,
                        'api_token' => Str::random(200),
                        'first_name' => $request->first_name ,
                        'last_name' => $request->last_name ,
                        'email' => $request->email ,
                        'phone' => $request->phone ,
                        'username' => $request->phone ,
                        'gender' => $request->gender ,
                        'printing_office' => $request->printing_office ,
                        'file' => $name ,
                    ]);
                }
                else
                {
                    $user = User::create([
                        'password' => bcrypt($request->password) ,
                        'api_token' => Str::random(200),
                        'first_name' => $request->first_name ,
                        'last_name' => $request->last_name ,
                        'email' => $request->email ,
                        'phone' => $request->phone ,
                        'username' => $request->phone ,
                        'gender' => $request->gender ,
                        'printing_office' => $request->printing_office ,
                    ]);
                }
            }
            else
            {
                return response()->json("پسورد ها مطابق هم نیستند" , 400);
            }
        }
        // return a response
        return new JsonResponse($user);
    }

    public function login(Request $request)
    {
        //validation
        $validData = Validator::make($request->all() , [
            'password' => ['required', 'string', 'min:4'] ,
            'username' => 'required|exists:users'
        ]);

        if ($validData->fails())
        {
            return response()->json("اطلاعات وارد شده صحیح نیست",400);
        }

        //check login
        if (! auth()->attempt($request->only('username', 'password')))
        {
            return \response()->json('اطلاعات وارد شده صحیح نیست', 400);
        }


        //return a response
        return new JsonResponse(auth()->user());
    }

    public function getCode(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone' => 'required|exists:users'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors()->all() ,400);
        }
        $user = User::where('phone' , $request->phone)->first();
        if (is_null($user))
        {
            return response()->json('کاربر مورد نظر یافت نشد', 404);
        }
        $code = rand(100000, 999999);
        $client = new Client();
        $body = [
            'receptor' => $request->phone,
            'token' => $code,
            'template' => 'verify'
        ];
        $headers = [
            'Accept' => 'application/json',
//            'Content-Length' => 411
        ];


        $response = $client->post('https://api.kavenegar.com/v1/78645A53426B482B63316372637968556838724F2B712B4B5252587236434C31446A466C506A542F6D5A343D/verify/lookup.json', [
            'form_params' => $body,
            'headers' => $headers
        ]);

        $user->update([
            'code' => $code ,
        ]);

        if ($response->getStatusCode() == 200)
        {
            return response()->json('کد تایید برای شما ارسال شد', 200);

        }

        return response()->json([
            'message' => 'an error occurred' ,
            'status' => 'error' ,
        ] , $response->getStatusCode());
    }

    public function verificationTheCode(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'code' => 'required' ,
            'phone' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'data' => $validator->errors()->all()
            ] ,400);
        }
        $code = $request->code;
        $phone = $request->phone;
        $user = User::where('phone' , $phone)->first();

        if (is_null($user))
        {
            return response()->json('کاربر مورد نظر یافت نشد', 404);
        }

        if (($user->code == $code))
        {
            $user->update([
                'verification' => '1'
            ]);

            return response()->json('شماره شما تایید شد', 200);

        }

        return response()->json('کد وارد شده اشتباه است', 400);

    }

    public function changePassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'new' => ['required', 'string', 'min:4' , 'regex:#^[ -~£±§]*$#'],
            'confirm' => ['required', 'string', 'min:4' , 'regex:#^[ -~£±§]*$#'],
            'phone' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors()->all(), 400);
        }

        $user = User::where('phone' , $request->phone)->firstOrFail();
        if ($request->new == $request->confirm)
        {
            $user->update([
                'password' => bcrypt($request->new)
            ]);
        }
        else
        {
            return response()->json('پسوردها منطبق نیستند دوباره امتحان کنید', 422);
        }

        return response()->json('تغییرات با موفقیت اعمال شد', 200);

    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user->delete())
        {
            return 'the user is deleted successfully';
        }

        return 'This user could not be deleted';
    }

    public function deleteEverything($table , $id)
    {
        $item = DB::table($table)->where('id' , $id);

        if ($item->delete())
        {
            return 'this item is deleted successfully';
        }

        return 'This item could not be deleted';
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'first_name' => 'required' ,
            'last_name' => 'required' ,
            'phone' => 'required|iran_mobile' ,
            'printing_office_number' => 'required|numeric' ,
            'postal_code' => 'required|numeric|max:10' ,
            'address' => 'required' ,
            'delivery' => 'required' ,
        ]);

        if ($validator->fails())
        {
            return response()->json("لطفا اطلاعات را صحیح و کامل کنید" , 400);

        }

        $user = Auth::user();
        $user->update([
            'first_name' => $request->first_name ,
            'last_name' => $request->last_name ,
            'phone' => $request->phone ,
            'username' => $request->phone ,
            'printing_office_number' => $request->printing_office_number ,
            'postal_code' => $request->postal_code ,
            'address' => $request->address ,
            'delivery' => $request->delivery ,
        ]);

        return new JsonResponse($user);
    }

    public function search($table, $param , Request $request)
    {
        $res = DB::table($table);
        $res = $res->where($param , 'LIKE' , '%'.$request->q.'%')
            ->orderBy('id' , 'DESC')->get();
        if ($res->isEmpty())
        {
            return response()->json("نتیجه ای یافت نشد" , 404);
        }
        return response($res);
    }

    public function userInvoices()
    {
        $user = \auth()->user();
        $invoices = $user->finances()->orderBy('id' , 'DESC')->get();

        foreach ($invoices as $invoice)
        {
            $invoice['order'] = $invoice->order;
            $invoice['date'] = Jalalian::forge($invoice->updated_at)->format('Y-m-d H:i:s');
        }

        return response()->json([
            'credit' => $user->credit_limit ,
            'invoices' => $invoices
        ]);
    }
}

