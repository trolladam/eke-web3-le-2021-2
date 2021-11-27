<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
        'topic_id', 'content',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getMinutesToReadAttribute()
    {
        $avgWordPerMinute = 200;
        $noOfWords = count(explode(" ", strip_tags($this->content)));

        return ceil($noOfWords / $avgWordPerMinute);
    }

    public function getHasCoverAttribute()
    {
        return $this->cover != null;
    }

    public function getCoverImageAttribute()
    {
        if (!$this->hasCover) {
            return "https://via.placeholder.com/300";
        }
        return asset("uploads/{$this->cover}");
    }
}
