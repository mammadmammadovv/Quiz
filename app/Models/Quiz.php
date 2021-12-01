<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','description','status','finished_date','slug'];

    protected $appends = ['details','my_rank'];

    public function getMyRankAttribute()
    {
        $rank = 0;
        foreach ($this->results()->orderByDesc('point')->get() as $item) {
            $rank ++;
            if(auth()->user()->id == $item->user_id){
                return $rank;
            }
        }
    }

    public function getDetailsAttribute()
    {
        if($this->results()->count()>0){
            return[
                'average'=>round($this->results()->avg('point')),
                'join_count'=>$this->results()->count()
            ];
        }
        return null;
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }

    public function myResult()
    {
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }

    public function topTen()
    {
        return $this->results()->orderByDesc('point')->take(10);
    }

    public function getFinishedDateAttribute($date)
    {
        return $date ? Carbon::parse($date) :null;
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
