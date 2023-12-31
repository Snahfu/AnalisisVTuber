<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "histories";

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function content()
    {
        return $this->belongsTo(Content::class, 'contents_id','contents_sourcesId');
    }
}
