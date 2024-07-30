<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginShow()
    {
        return view("auth.login");
    }

    public function registerShow()
    {
        return view("auth.register");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email"=> "required|email",
            "password"=> "required",
        ]);

        if(Auth::attempt($validated)) {
            request()->session()->regenerate();
            
            if(Auth::user()->is_admin == 1) {
                return redirect()->intended("/admin/admin");
            }
            return redirect()->intended("/");

        } 

        return redirect()->back()->withErrors("E-posta Adresiniz Veya Şifrenizi Kontrol Ediniz.");
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            "name"=> $request->name,
            "city"=> $request->city,
            "country"=> $request->country,
            "school"=> $request->school,
            "phone"=> $request->phone,
            "is_admin" => '0',
            "status" => '0',
        ]);

        return redirect()->route("login.show")->withSuccess("Kayıt Olma İşlemi Başarılı Bir Şekilde Gerçekleşti.");
    }

    public function Userlogout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->withSuccess("Çıkış İşlemi Başarılı Bir Şekilde Gerçekleşti.");
    }
}
