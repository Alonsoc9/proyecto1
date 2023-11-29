<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class FacebookUser extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password', // Si estás utilizando un campo de contraseña
        'facebook_id',
        'profile_image',
    ];

    // Resto de las propiedades y métodos del modelo...

    public function encryptedFiles()
{
   return $this->hasMany(EncryptedFile::class);
}

}
