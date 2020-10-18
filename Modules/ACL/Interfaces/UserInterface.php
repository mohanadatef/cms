<?php

namespace Modules\ACL\Interfaces;

use Illuminate\Http\Request;
use Modules\ACL\Http\Requests\admin\User\PasswordRequest;
use Modules\ACL\Http\Requests\admin\User\UserCreateRequest;
use Modules\ACL\Http\Requests\admin\User\UserEditRequest;
use Modules\ACL\Http\Requests\admin\User\UserStatusEditRequest;

interface UserInterface{

    public function Get_All_Datas();
    public function Create_Data(UserCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(UserEditRequest $request, $slug);
    public function Update_Password_Data(PasswordRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Datas(UserStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_Role_For_Data($id);

}