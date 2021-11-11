<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class Reply extends Model
{
    use HasFactory;

    protected $table = "replies";
    protected $fillable = ['content','user_id', 'discussion_id'];

    public function discussion(){
        return $this->belongsTo(Discussion::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function is_liked_by_auth_user(){
        $id = Auth::id();

        $likers = array();

        foreach ($this->likes as $like):
            array_push($likers, $like->user_id);
        endforeach;

        if (in_array($id, $likers)) {
            return true;
        }
        else {
            return false;
        }
    }
}
