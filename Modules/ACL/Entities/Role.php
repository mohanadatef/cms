<?php

namespace Modules\ACL\Entities;

use Modules\ACL\Entities\Permission;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;


class Role extends EntrustRole
{
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [
        'name','display_name','description','slug'
    ];
    public function user()
    {
        return $this->belongsToMany('App\User', 'role_user', 'user_id','role_id')->paginate();
    }
    public function permission()
    {
        return $this->belongsToMany('Modules\ACL\Entities\Permission', 'permission_role')->withTimestamps('created_at','updated_at');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $table = 'roles';
    public $timestamps = true;

}