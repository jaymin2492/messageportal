<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    protected $appends = ['is_current_user_message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getIsCurrentUserMessageAttribute()
    {
        if (Auth::check()) {
            if(Auth::id() == $this->user_id){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }
}
