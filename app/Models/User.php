<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function post(){

        return $this->hasOne('App\Models\Post');


    }

    public  function posts(){

        return $this->hasMany('App\Models\Post');


    }

    public  function roles(){

        //for customized table names and columns//
        //return $this->belongsToMany('App\Models\Role','users_role', 'user_id', 'role_id');

        return $this->belongsToMany('App\Models\Role')->withPivot('created_at');


    }

    public function photos(){

        return $this->morphMany('App\Models\Photo', 'imageable');

    }


    ///============ACCESSORS========access/gets the data==============

     public function getNameAttribute($value){

             return ucfirst($value);

         }


     public function getEmailAttribute($value){

               return ucfirst($value);

       }


    ///============MUTARORS========mutates the data==============

    public function setNameAttribute($value){

            return $this->attributes['name'] = ucfirst($value);

        }





}
