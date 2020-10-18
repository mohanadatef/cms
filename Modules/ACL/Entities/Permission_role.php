<?php

namespace Modules\ACL\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission_role  extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'permission_id','role_id'
    ];

    protected $table = 'permission_role';
    public $timestamps = true;

}