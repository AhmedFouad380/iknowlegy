<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $data = Setting::find(1);
        return view('Admin.Setting',compact('data'));
    }

    public function  update(Request $request){

        $data = Setting::find(1);
        $data->name=$request->name;
        $data->logo=$request->logo;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->linkedin=$request->linkedin;
        $data->instagram=$request->instagram;
        $data->save();

        return back()->with('message','Success');
    }
}
