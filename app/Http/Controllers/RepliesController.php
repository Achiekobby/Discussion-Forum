<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Like;
use Auth;

class RepliesController extends Controller
{
    public function like($id){

        Like::create([
            'reply_id'=> $id,
            'user_id'=>Auth::id()
        ]);

        return redirect()->back()->with("info_like","You Just Like a Reply in the Discussion");

    }

    public function unlike($id){
        $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();

        $like->delete();

        return redirect()->back()->with('info_unlike','You just Unliked a reply in the discussion');
    }

    public function best_answer($id){
        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->save();

        $reply->user->points += 100;

        $reply->user->save();

        return redirect()->back()->with('mark_success','Reply has been marked as Best Answer');
    }
}
