<?php

namespace App\Http\Controllers\InterFace;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Platform;
use App\Notifications\PlatformCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function CommentCreate(Request $request, Platform $platform)
    {
        if (Auth::check()) {
            $request->validate(['message' => 'required|min:6']);

            Comment::create([
                'message' => $request->message,
                'user_id' => Auth::id(),
                'platform_id' => $platform->id,
                'status' => 0,
            ]);

            $platform->user->notify(new PlatformCommentNotification($platform->id));

            return back()->withSuccess('Yorum Başarılı Bir Şekilde Gönderildi');
        }
        return redirect('/login');
    }

    public function CommentShow($id)
    {
        if (Auth::check()) {
            $platform = Platform::where('id', $id)->with(['user', 'Category','comments'])->first();

            $comment = $platform->comments()->with(['user','platforms'])->get();

            return view('interface.pages.platform.platformComment', compact('platform','comment'));
        }
        return redirect('/login');
    }

    public function CommentEdit(Request $request, $id){
        if (Auth::check()) {
            $commentEdit = Comment::where('id', $id)->with('user')->first();

            return view('interface.pages.comment.commandUpdate', compact('commentEdit'));
        }
    }

    public function CommentUpdate(Request $request, $id){
        if (Auth::check()) {
            $comment = Comment::where('id', $id)->first();
            $comment->message = $request->message;
            $comment->save();

            return back()->withSuccess('Mesajınız Başarılı Şekilde Güncellendi');

        }
        return redirect('/login');
    }

    public function CommentDelete(Comment $comment){
        if (Auth::check() && Auth::id() == $comment->user_id) {
            $comment->delete();
            return back()->withSuccess('Yorumunuz Başarılı Bir Şekiklde Silinmiştir.');
        }
        return redirect('/login');
    }
}
