<?php

namespace App\Http\Controllers;

use App\File;
use App\Setting;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function getLogo()
    {
        $setting = Setting::orderBy('id' , 'DESC')->first();
        if ($setting)
        {
            return response($setting->logo);
        }
        return response('setting not found (fileController)' , 404);
    }

    public function logo(Request $request)
    {
        if ($request->has('logo') || $request->logo != null || $request->logo != '')
        {
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/files/logo') , $name);
            $setting = Setting::orderBy('id' , 'DESC')->first();
            if ($setting)
            {
                $setting->update([
                    'logo' => $name
                ]);
                return response($setting);
            }
            return response('setting not found (fileController)' , 404);
        }

        return response('your file is empty' , 400);
    }

    public function upload(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        $valid = Validator::make($request->all() , [
            'pages' => 'required|mimes:pdf|max:40960' ,
            'cover' => 'required|max:20480' ,
            'title' => 'required' ,
        ]);

        if ($valid->fails())
        {
            return new JsonResponse($valid->errors()->all() , 400);
        }

        $image = $request->file('pages');
        $name = $image->getClientOriginalName();
        $image->move(public_path('/files/'.$id.'/pages') , $name);
        $image1 = $request->file('cover');
        $name1 = $image1->getClientOriginalName();
        $image1->move(public_path('/files/'.$id.'/covers') , $name1);
        if ($request->has('license') || $request->license != null || $request->license != '')
        {
            $image2 = $request->file('license');
            $name2 = $image2->getClientOriginalName();
            $image2->move(public_path('/files/'.$id.'/licenses') , $name2);
            $files = File::create([
                'user_id' => $id,
                'title' => $request->title,
                'pages_file' => $name ,
                'cover_file' => $name1 ,
                'license_file' => $name2
            ]);
        }
        else
        {
            $files = File::create([
                'user_id' => $id,
                'title' => $request->title,
                'pages_file' => $name ,
                'cover_file' => $name1 ,
            ]);
        }

        return $files;
    }

    public function download($id ,$type, $name)
    {
        $file = public_path('/files/'.$id.'/'.$type.'/'.$name.'');

        return \response()->download($file , $name);
    }

    public function filesForOrder($id)
    {
        $files = File::find($id);
        return response($files);
    }
}
