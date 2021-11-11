<?php

namespace App\Models;

use Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $table = "discussions";

    protected $fillable = ['user_id', 'channel_id','slug','title','content'];

    public function channel(){
        return $this->belongsTo(Channel::class); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function watchers(){
        return $this->hasMany(Watcher::class);
    }

    public function watched_by_auth_user(){
        $id = Auth::id();

        $watchers_ids = array();

        foreach ($this->watchers as $watcher) {
            array_push($watchers_ids, $watcher->user_id);
        }

        if(in_array($id, $watchers_ids)){
            return true;
        }
        else {
            return false;
        }
    }
}
