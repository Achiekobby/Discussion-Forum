<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Auth;
use App\Models\Reply;
use App\Models\User;
use Notification;
use App\Notifications\NewReplyAdded;

class DiscussionController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('discussions.discuss');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "title"     => "required",
            "channel_id" => "required",
            "content"   => "required"
        ]);

        $discussion = Discussion::create([
            "title"     => $request->title,
            "content"   => $request->content,
            "channel_id" => $request->channel_id,
            "user_id"   => Auth::id(),
            'slug'      => Str::slug($request->title)
        ]);

        return redirect()->route('discussion.show', ['slug' => $discussion->slug])->with('success_create', 'Your Question has been posted');
    }

    public function reply(Request $request, $id)
    {
        $discussion = Discussion::find($id);
        $this->validate($request, [
            'reply' => "required"
        ]);

        Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => $request->reply
        ]);

        $watchers = array();

        foreach ($discussion->watchers  as $watcher) {
            array_push($watchers, User::find($watcher->user_id));
        }

        Notification::send($watchers, new NewReplyAdded($discussion));

        return redirect()->back()->with('reply', "Successfully Replied to the question");
    }


    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();

        return view('discussions.show', compact('discussion',));
    }
}
