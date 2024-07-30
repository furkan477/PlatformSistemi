<?php

namespace App\Http\Controllers\InterFace;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function contact()
    {
        return view("interface.pages.contact");
    }

    public function about()
    {
        return view("interface.pages.about");
    }

    public function Profile($id)
    {
        $user = User::where('id',$id)->with('comments','platforms','contacts')->first();
        return view("interface.pages.profile",compact("user"));
    }

    public function ProfileUpdate(Request $request,User $user)
    {
        $user->name = $request->name;
        $user->school = $request->school;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->phone = $request->phone;

        $user->save();

        return back()->withSuccess("Profiliniz Başarılıyla Güncellenmiştir");
    }

    public function contactSubmit(ContactRequest $request){

        if(Auth::check()){

            Contact::create([
                "subject" => $request->subject,
                "message"=> $request->message,
                "status"=> '0',
                "user_id"=> Auth::id(),
            ]);

            return back()->withSuccess("İletişiminiz Başarılı Bir Şekilde Gönderildi");
        }

        return redirect('login');
    }

    public function contactsEdit(Contact $contacts){
        if(Auth::check()){

            return view('interface.pages.contact.contactUpdate',compact('contacts'));
        }
        return redirect('login');
    }

    public function contactsUpdate(ContactRequest $request,Contact $contacts){
        if(Auth::check()){
            $contacts->subject = $request->subject;
            $contacts->message = $request->message;
            $contacts->save();
            
            return redirect()->route('home');
        }
        return redirect('login');
    }
}
