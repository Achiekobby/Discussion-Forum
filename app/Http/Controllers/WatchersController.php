<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watcher;
use Auth;

class WatchersController extends Controller
{
    public function watch($id){
        Watcher::create([
            'discussion_id' =>$id,
            'user_id'       =>Auth::id()
        ]);

        return redirect()->back()->with('watch_success','You are watching this discussion');
    }

    public function unwatch($id){
        $discussion_watched = Watcher::where('discussion_id',$id)->where('user_id',Auth::id())->first();

        $discussion_watched->delete();

        return redirect()->back()->with('watch_success','You just unwatched this discussion');
    }
}
