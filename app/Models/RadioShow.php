<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadioShow extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'genry',
        'website',
    ];
    public function users(){
        return $this->belongstomany(UserProfile::class)->using(RadioShowUser::class , 'radio_show_id', 'user_profile_id');
    }

    public function timetables(){
        return $this->BelongstoMany(RadioTimeTable::class)->using(RadioTimeTableRadioShow::class , 'radio_time_table_id', 'radio_show_id');
    }
}
