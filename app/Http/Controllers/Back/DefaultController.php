<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){
        
        return view('back.default.index');
    }
    public function login(){
        return view('back.default.login');
    }
    public function authenticate(Request $request)
    {
        $request->flash();
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route('manage.index'));
        }else {
                return back()->with('error','Hatalı Kullanıcı');
            }
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('manage.login'))->with('success','Güvenli çıkış yapıldı');
    }

    public function sw()
    {
        return view('back.default.switcher');
    }
}

