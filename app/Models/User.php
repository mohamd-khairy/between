<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;  //add the namespace

class User extends Authenticatable implements TranslatableContract
{
    use HasFactory, Notifiable;
    use Translatable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'type',
        'phone',
        'weight',
        'height',
        'gender',
        'birth_date',
        'code',
        'email_verified_at'
    ];

    public $translatedAttributes = ['name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',
        'email_verified_at' => 'datetime',
    ];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? date('Y-m-d', strtotime($value)) : null;
    }
}
