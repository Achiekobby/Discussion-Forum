<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use Auth;
use App\Models\Reply;
use App\Models\Channel;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index(){
        // $discussions = Discussion::orderBy('created_at','DESC')->paginate(3);
        switch (request('filter')) {
            case 'me':
                $results = Discussion::where('user_id',Auth::id())->paginate(3);
                break;
            
            case 'solved':
                $answered = array();

                foreach (Discussion::all() as $discussion) {
                    if($discussion->hasBestAnswer()){
                        array_push($answered, $discussion);
                    }
                }

                $results = new Paginator($answered, 3);
                break;

            case 'unsolved':
                $unanswered = array();

                foreach (Discussion::all() as $discussion) {
                    if (!$discussion->hasBestAnswer()) {
                        array_push($unanswered, $discussion);
                    }
                }

                $results = new Paginator($unanswered, 3);
                break;
            default:
                $results = Discussion::orderBy('created_at', 'DESC')->paginate(3);
                break;
        }
        return view('forum',['discussions'=>$results]);
    }
    
    public function channel($slug){
        $channel = Channel::where('slug',$slug)->first();

        $title = $channel->title;

        return view('channel')->with('discussions',$channel->discussions()->paginate(5))
                              ->with('channel_title',$title);
    }
}
