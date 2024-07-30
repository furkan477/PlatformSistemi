<?php

namespace App\Http\Controllers\InterFace;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlatformRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Platform;
use App\Models\User;
use App\Notifications\CreatePlatformNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    public function index()
    {
        $categories = Category::where('cat_ust',0)->with('underCategory')->get();
        $platforms = Platform::with(['user','Category'])->latest()->get();
        $endplatforms = Platform::with(['user','Category'])->latest()->take('3')->get();

        return view("interface.pages.index", compact("platforms","categories","endplatforms"));
    }
    
    public function userPlatform()
    {
        if(Auth::check()){

            $user = Auth::user();
            $platform = $user->platforms()->with("Category")->latest()->get();

            return view("interface.pages.platform.userPlatform", compact("platform"));
        }

        return redirect("/login");
    }

    public function createPlatform()
    {   
        if(Auth::check()){
            $user = Auth::user();
            $categories = Category::where("cat_ust",0)->with("underCategory")->get();
            Categories();

            return view("interface.pages.platform.createPlatform",compact('categories','user'));
        }

        return redirect("/login");
    }

    public function storePlatform(PlatformRequest $request){

        if(Auth::check() ){
    
            $platform = Platform::create([
                "category_id"=> $request->category_id,
                "subject"=> $request->subject,
                "description"=> $request->description,
                "status" => '0',
                "user_id" => Auth::user()->id,
            ]);

            $platform->user->notify(new CreatePlatformNotification($platform->id));

            return redirect()->route('user.platform')->withSuccess('Platformunu Başarılı Bir Şekilde Oluşturuldu.');
        }
        return redirect("login");
    }

    public function editPlatform(Platform $platform){
        if(Auth::check()){
            $user = Auth::user();
            $categories = Category::where("cat_ust",0)->with("underCategory")->get();
            Categories();
            $platforms = $platform->first();
            return view("interface.pages.platform.updatePlatform", compact("categories","platforms",'user'));
        }
        return redirect('/login');
    }

    public function updatePlatform(Request $request, Platform $platform){
        if(Auth::check()){
            $platform->subject = $request->subject;
            $platform->description = $request->description;
            $platform->save();

            return back()->withSuccess('Platformunuz Başarılı Bir Şekilde Güncellenmiştir');
        }
        return redirect('/login');
    }

    public function deletePlatform(Platform $platform){
        if(Auth::check() && Auth::id() == $platform->user_id){
            Comment::where('platform_id', $platform->id)->delete();
            $platform->delete();
            return back()->withSuccess('Platformu Silme Başarıyla Gerçekleştirildi');
        }
        return redirect('/login');
    }

    private function getAllSubcategories($category)
    {
        $categories = collect([$category]);
        foreach ($category->underCategory as $altcat) {
            $categories = $categories->merge($this->getAllSubcategories($altcat));
        }
        return $categories;
    }

    public function categoryFilter(Request $request){
        if(Auth::check()){
            $categories = Category::where('cat_ust',0)->with('underCategory')->get();
            $selectcategory = Category::where('id',$request->category_id)->first();
            $selectcategories = $this->getAllSubcategories($selectcategory);

            $platforms = Platform::whereIn('category_id',$selectcategories->pluck('id'))->get();
            return view("interface.pages.index", compact("platforms","categories"));
        }

        return redirect('/login');
    }

    public function UsersPlatformComment(User $user){
        if(Auth::check()){
            return view('interface.pages.platform.platformandcomment', compact('user'));
        }
        return redirect('/login');
    }
}
