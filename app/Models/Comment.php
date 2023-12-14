<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "comments";
    protected $fillable = [
        'kelas_kategori',
        'kelas_sentimen',
        'id',
        'contents_id',
        'contents_sourcesId',
        'text',
        'author',
        'like_count',
        'published',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class, 'contents_id', 'id');
    }
}
