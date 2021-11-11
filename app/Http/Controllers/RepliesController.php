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
}
