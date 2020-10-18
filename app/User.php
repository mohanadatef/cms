<?php

namespace App;
use Modules\ACL\Entities\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{

    use SoftDeletes, EntrustUserTrait {

        SoftDeletes::restore insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;

    }
    use Notifiable;
    use Sluggable;

    protected $fillable = [
        'username', 'email', 'password','status','slug'
    ];


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id','role_id')->withTimestamps('created_at','updated_at');
    }
        public function role_iformation()
    {
        return $this->belongsToMany('Modules\ACL\Entities\Role_user');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }
    protected $table = 'users';
    public $timestamps = true;



}
