<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{
    public function update(Request $request)
    {
        $setting = Setting::orderBy('id' , 'DESC')->first();
        if (!$setting)
        {

            $setting = Setting::create([ 'title' => $request->title ,
                'keywords' => $request->keywords ,
                'description' => $request->description ,
                'footer_text' => $request->footer_text ,
                'address' => $request->address ,
                'consultant_mobile' => $request->consultant_mobile ,
                'consultant_number' => $request->consultant_number ,
                'telegram' => $request->telegram ,
                'email' => $request->email ,
                'email_info' => $request->email_info ,
                'instagram' => $request->instagram ,
                'account_number' => $request->account_number ,
                'card_number' => $request->card_number ,
                'account_owner' => $request->account_owner ,
                ]);
        }
//        title: '' ,
//                    description: '' ,
//                    keywords: '' ,
//                    address: '' ,
//                    consultant_mobile: '' ,
//                    consultant_number: '' ,
//                    telegram: '',
//                    email: '' ,
//                    email_info: '' ,
//                    instagram: '' ,
//                    account_number: '' ,
//                    card_number: '' ,
//                    account_owner: '' ,
//                    logo: '' ,
        else
        {
            $setting->update([
                 'title' => $request->title ,
                 'keywords' => $request->keywords ,
                 'description' => $request->description ,
                 'footer_text' => $request->footer_text ,
                 'address' => $request->address ,
                 'consultant_mobile' => $request->consultant_mobile ,
                 'consultant_number' => $request->consultant_number ,
                 'telegram' => $request->telegram ,
                 'email' => $request->email ,
                 'email_info' => $request->email_info ,
                 'instagram' => $request->instagram ,
                 'account_number' => $request->account_number ,
                 'card_number' => $request->card_number ,
                 'account_owner' => $request->account_owner ,
            ]);
        }

        return response()->json($setting);
    }

    public function index()
    {
        $set = Setting::all();
        if ($set->isEmpty())
        {
            $set = Setting::create([
                'title' => 'برو چاپ' ,
                'footer_text' => 'برو چاپ یکی از بزرگترین و معتبرترین مراکز چاپ انلاین کشور می باشد. که با اتکا به محصولات با کیفیت و قیمت رقابتی پا به عرصه فروش آنلاین در ایران گذاشته است و فعالیت خود را در زمینه  چاپ از سال 1397 آغاز کرد'
            ]);
        }
        return response($set);
    }
}

