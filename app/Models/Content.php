<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "contents";
    protected $fillable = [
        'title',
        'creator',
        'like_count',
        'sourcesId',
        'sources',
        'id',
        'date',
        'caption',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'contents_id','contents_sourcesId');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'contents_id','contents_sourcesId');
    }
}
