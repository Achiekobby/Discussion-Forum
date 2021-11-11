<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use Auth;
use App\Models\Reply;
use App\Models\Channel;

class ForumsController extends Controller
{
    public function index(){
        $discussions = Discussion::orderBy('created_at','DESC')->paginate(3);
        return view('forum',compact('discussions',$discussions));
    }
    
    public function channel($slug){
        $channel = Channel::where('slug',$slug)->first();

        $title = $channel->title;

        return view('channel')->with('discussions',$channel->discussions()->paginate(5))
                              ->with('channel_title',$title);
    }
}
