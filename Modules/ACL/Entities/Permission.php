<?php

namespace Modules\ACL\Entities;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Permission  extends EntrustPermission
{
    use SoftDeletes;
    use Sluggable;
    protected $fillable = [
        'name','display_name','description','slug'
    ];
    public function role()
    {
        return $this->belongsToMany('Modules\Acl\Entities\Role', 'permissions_role', 'role_id','permission_id')->paginate();
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $table = 'permissions';
    public $timestamps = true;

}