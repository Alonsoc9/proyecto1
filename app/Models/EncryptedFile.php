<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncryptedFile extends Model
{
    protected $fillable = ['filename', 'path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
