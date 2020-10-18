<?php

namespace Modules\ACL\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role_user  extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id','role_id'
    ];
    protected $table = 'role_user';
    public $timestamps = true;


}