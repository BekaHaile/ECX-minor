<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class user extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use AuthenticableTrait;
    use Notifiable;

    protected $fillable = ['username','password','fname','lname','sex','zone',
        'woreda','kebele','phoneNumber','userType','city','dateOfBirth','email',];
    protected $table = 'users';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $hidden = ['password','remember_token'];
}
