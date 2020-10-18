<?php

namespace Modules\ACL\Interfaces;


use Modules\ACL\Http\Requests\admin\Permission\PermissionCreateRequest;
use Modules\ACL\Http\Requests\admin\Permission\PermissionEditRequest;


interface PermissionInterface{

    public function Get_All_Datas();
    public function Create_Data(PermissionCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(PermissionEditRequest $request, $slug);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Data();
}