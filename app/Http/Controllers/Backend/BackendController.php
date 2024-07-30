<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->is_admin == 1){

            return view("admin.pages.index");

        }
        return redirect("/login");
    }
    
    public function userList(){

        if(Auth::check() && Auth::user()->is_admin == 1){

            $users = User::all();

            return view("admin.pages.userList",compact("users"));
        }
        return redirect("/login");
    }

    public function userAbout(User $users){

        if(Auth::check() && Auth::user()->is_admin == 1){

            return view("admin.pages.userAbout",compact("users"));
        }
        return redirect("/login");
    }






    public function platformsAbout(Platform $platforms){

        if(Auth::check() && Auth::user()->is_admin == 1){

            return view("admin.pages.platformsDetail",compact("platforms"));
        }
        return redirect("/login");
    }

    public function platformList(){
        if(Auth::check() && Auth::user()->is_admin == 1){
            $platforms = Platform::all();

            return view("admin.pages.platformsList",compact("platforms"));
        }
        return redirect("/login");
    }

    public function platformsEdit(Platform $platforms){
        if(Auth::check() && Auth::user()->is_admin == 1){

            return view("admin.pages.platformsUpdate",compact("platforms"));
        }
        return redirect("/login");
    }

    public function platformsUpdate(Request $request, Platform $platforms){
        if(Auth::check() && Auth::user()->is_admin == 1){

            $platforms->subject = $request->subject;
            $platforms->description = $request->description; 
            $platforms->save();
            
            return back();
        }
        return redirect("/login");
    }







    public function commentsList(){
        if(Auth::check() && Auth::user()->is_admin == 1){
            $comments = Comment::all();

            return view("admin.pages.commentsList",compact("comments"));
        }
        return redirect("/login");
    }

    public function commentsEdit(Comment $comments){
        if(Auth::check() && Auth::user()->is_admin == 1){

            return view("admin.pages.commentUpdate",compact("comments"));
        }
        return redirect("/login");
    }

    public function commentsUpdate(Request $request, Comment $comments){
        if(Auth::check() && Auth::user()->is_admin == 1){   

            $comments->message = $request->message;
            $comments->save();

            return back();
        }
        return redirect("/login");
    }






    public function categoriesList(){
        if(Auth::check() && Auth::user()->is_admin == 1){
            $categories = Category::all();

            return view("admin.pages.categoriesList",compact("categories"));
        }
        return redirect("/login");
    }

    public function categoriesAdd(){
        if(Auth::check() && Auth::user()->is_admin == 1){
            $categories = Category::where('cat_ust',0)->with('underCategory')->get();

            return view("admin.pages.categoriesAdd",compact("categories"));
        }
        return redirect("/login");
    }

    public function categoriesCreate(Request $request){
        if(Auth::check() && Auth::user()->is_admin == 1){
            Category::create([
                "name"=> $request->name,
                "status"=> $request->status,
                "cat_ust" => $request->cat_ust,
            ]);

            return redirect()->route('admin.categorieslist');
        }
        return redirect("/login");
    }

    public function categoriesEdit(Category $kategori){
        if(Auth::check() && Auth::user()->is_admin == 1){
            $categories = Category::where("cat_ust",0)->with('underCategory')->get();

            return view('admin.pages.categoriesUpdate',compact('categories','kategori'));
        }
        return redirect("/login");
    }

    public function categoriesUpdate(Request $request,Category $kategori){
        if(Auth::check() && Auth::user()->is_admin == 1){

            $kategori->name = $request->name;
            $kategori->status = $request->status;
            $kategori->cat_ust = $request->cat_ust;
            $kategori->save();

            return redirect()->route('admin.categorieslist');
        }
        return redirect("/login");
    }

    public function categoriesDelete(Category $kategori){
        if(Auth::check() && Auth::user()->is_admin == 1){
            Category::where("cat_ust",$kategori->id)->with('platforms')->delete();
            $kategori->delete();

            return redirect()->route("admin.categorieslist");
        }
        return redirect("/login");
    }

    




    public function contactList(){
        if(Auth::check() && Auth::user()->is_admin == 1){
            $contacts = Contact::with('user')->get();
            return view("admin.pages.contactList",compact("contacts"));
        }
        return redirect("/login");
    } 
    
    public function contactDelete(Contact $contact){
        if(Auth::check() && ($contact->user->id == Auth::id() || Auth::user()->is_admin == 1 )){

            $contact->delete();

            return back();
        }
        return redirect("/login");
    }

    public function contactEdit(Contact $contact){
        if(Auth::check() && Auth::user()->is_admin == 1){
            return view("admin.pages.contactUpdate",compact("contact"));
        }
        return redirect("/login");
    } 

    public function contactUpdate(Request $request, Contact $contact){  
        if(Auth::check() && Auth::user()->is_admin == 1){
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();

            return back();
        }
        return redirect("/login");
    } 
    
}