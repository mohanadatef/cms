<?php

namespace Modules\ACL\Interfaces;


use Modules\ACL\Http\Requests\admin\Role\RoleCreateRequest;
use Modules\ACL\Http\Requests\admin\Role\RoleEditRequest;


interface RoleInterface{

    public function Get_All_Datas();
    public function Create_Data(RoleCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(RoleEditRequest $request, $slug);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Data();
    public function Get_Permission_For_Data($id);
}