<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(User::where('email',$request->email)->count() > 0){
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect('/')->with('messageSuccess','تم التسجيل  بنجاح   ');;
            }else{
                return back()->with('messageError','عفوا البريد الالكتروني  او كلمة المرور خطا ');

            }
        }elseif(Instructor::where('email',$request->email)->count() > 0){
            if (Auth::guard('instructor')->attempt(['email' => $request->email, 'password' => $request->password])) {

                return redirect('/')->with('messageSuccess','تم التسجيل  بنجاح   ');;
            }else{
                return back()->with('messageError','عفوا البريد الالكتروني  او كلمة المرور خطا ');

            }
        }
        else{
            return back()->with('messageError','عفوا البريد الالكتروني  او كلمة المرور خطا ');

        }

    }

    public function RegisterStudent(Request $request){
        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required|confirmed',
            'phone' => 'required|unique:users',
            'code' => 'required',
            'faculty_id'=>'nullable|exists:faculties,id'
        ]);

        $data = new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->code=$request->code;
        $data->phone=$request->phone;
        $data->birth_date=$request->birth_date;
        if($request->faculty_id != 0){
        $data->faculty_id=$request->faculty_id;
        }
        $data->password=Hash::make($request->password);
        $data->save();

        Auth::login($data);

        return back()->with('messageSuccess','success');
    }

    public function RegisterInstructor(Request $request){
        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:instructors',
            'password' => 'min:6|required',
            'phone' => 'required|unique:instructors',
//            'code' => 'required',
        ]);

        $data = new Instructor();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->code=$request->code;
        $data->about=$request->about;
        $data->phone=$request->phone;
        $data->password=Hash::make($request->password);
        $data->save();

        Auth::guard('instructor')->login($data);

        return back()->with('message','success');
    }
}
