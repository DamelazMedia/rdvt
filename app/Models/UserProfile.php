<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dj_name',
        'birtday',
        'bio',
        'city',
        'avatar_slug',
        'cover_slug',
        'genries',
        'intrests',
        'slug',
        
    ];
    
    public function userprofile(){
        return $this->belongsTo(User::class, 'id', 'user_id' );
    }
}
