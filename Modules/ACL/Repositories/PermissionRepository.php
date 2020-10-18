<?php

namespace Modules\ACL\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Http\Requests\admin\Permission\PermissionCreateRequest;
use Modules\ACL\Http\Requests\admin\Permission\PermissionEditRequest;
use Modules\ACL\Interfaces\PermissionInterface;


class PermissionRepository implements PermissionInterface
{

    protected $permission;
    protected $permission_permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function Get_All_Datas()
    {
        if(Auth::user()->role()->first()->name == 'Develper')
        {
            return $this->permission->paginate(100);
        }
        else
        {
            return $this->permission->wherein('id','!=',[20,21,22,23,24,25])->get();
        }
    }

    public function Create_Data(PermissionCreateRequest $request)
    {
        $this->permission->create($request->all());
    }

    public function Get_One_Data($slug)
    {
        return $this->permission->where('slug',$slug)->first();
    }

    public function Update_Data(PermissionEditRequest $request, $slug)
    {
       $permission = $this->Get_One_Data($slug);
        $permission->update($request->all());
    }


    public function Delete_Data($slug)
    {
        $permission = $this->Get_One_Data($slug);
        $permission->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->permission->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->permission->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_List_Data()
    {
       if(Auth::user()->role()->first()->name == 'Develper')
        {
            return $this->permission->select('display_name', 'id')->get();
        }
        else
        {
            return $this->permission->select('display_name', 'id')->wherein('id','!=',[20,21,22,23,24,25])->get();
        }
    }

}
