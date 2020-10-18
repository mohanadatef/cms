<?php

namespace Modules\ACL\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\ACL\Entities\Permission_role;
use Modules\ACL\Entities\Role;
use Modules\ACL\Http\Requests\admin\Role\RoleCreateRequest;
use Modules\ACL\Http\Requests\admin\Role\RoleEditRequest;
use Modules\ACL\Interfaces\RoleInterface;


class RoleRepository implements RoleInterface
{

    protected $role;
    protected $permission_role;

    public function __construct(Role $role,Permission_role $permission_role)
    {
        $this->role = $role;
        $this->permission_role = $permission_role;
    }

    public function Get_All_Datas()
    {
        if(Auth::user()->role()->first()->name == 'Develper')
        {
            return $this->role->all();
        }
        else
        {
            return $this->role->where('id','!=',1)->get();
        }
    }

    public function Create_Data(RoleCreateRequest $request)
    {
        $this->role->permission()->sync((array)$request->input('permission_id'));
        $this->role->create($request->all());
    }

    public function Get_One_Data($slug)
    {
        return $this->role->where('slug',$slug)->first();
    }

    public function Update_Data(RoleEditRequest $request, $slug)
    {
       $role = $this->Get_One_Data($slug);
        $role->update($request->all());
        $role->permission()->sync((array)$request->input('permission'));
        $role->update();
    }


    public function Delete_Data($slug)
    {
        $role = $this->Get_One_Data($slug);
        $role->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->role->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->role->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_List_Data()
    {

        if(Auth::user()->role()->first()->name == 'Develper')
        {
            return $this->role->select('display_name', 'id')->get();
        }
        else
        {
            return $this->role->select('display_name', 'id')->where('id','!=',1)->get();
        }
    }

    public function Get_Permission_For_Data($id)
    {
        return $this->permission_role->where('role_id',$id)->get();
    }
}
