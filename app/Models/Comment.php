<?php

namespace App\Models;

use App\Models\BlogPost;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['user_id', 'content'];

    protected $hidden = ['deleted_at', 'user_id'];

    public function blogPost()
    {
        //return $this->belongsTo('App\Models\BlogPost', 'post_id', 'blog_post_id');
        return $this->belongsTo('App\Models\BlogPost');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public function scopeLatest(Builder $query)
    // {
    //     return $query->orderBy(static::CREATED_AT, 'desc');
    // }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LatestScope);

    }
}
