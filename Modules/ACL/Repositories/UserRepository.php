<?php

namespace Modules\ACL\Repositories;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\ACL\Entities\Role_user;
use Modules\ACL\Http\Requests\admin\User\PasswordRequest;
use Modules\ACL\Http\Requests\admin\User\UserCreateRequest;
use Modules\ACL\Http\Requests\admin\User\UserEditRequest;
use Modules\ACL\Http\Requests\admin\User\UserStatusEditRequest;
use Modules\ACL\Interfaces\UserInterface;


class UserRepository implements UserInterface
{

    protected $user;
    protected $role_user;

    public function __construct(User $user,Role_user $role_user)
    {
        $this->user = $user;
        $this->role_user = $role_user;
    }

    public function Get_All_Datas()
    {

        if(Auth::user()->role()->first()->name == 'Develper')
        {
        return $this->user->all();
        }
        else
        {
            return $this->user->where('id','!=',1)->get();
        }
    }

    public function Create_Data(UserCreateRequest $request)
    {
        $data['status'] = 1;
        $data['password'] = Hash::make($request->password);
        $this->user->create(array_merge($request->all(),$data))->role()->sync((array)$request->role_id);
    }

    public function Get_One_Data($slug)
    {
        return $this->user->where('slug',$slug)->first();
    }

    public function Update_Data(UserEditRequest $request, $slug)
    {
       $user = $this->Get_One_Data($slug);
        $user->role()->sync((array)$request->role_id);
        $user->update($request->all());
    }

    public function Update_Password_Data(PasswordRequest $request, $slug)
    {
        $user = $this->Get_One_Data($slug);
        $user->password=Hash::make($request->password);
        $user->update();
    }

    public function Update_Status_One_Data($slug)
    {
        $user = $this->Get_One_Data($slug);
        if ($user->status == 1) {
            $user->status = '0';
        } elseif ($user->status == 0) {
            $user->status = '1';
        }
        $user->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->user->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Datas(UserStatusEditRequest $request)
    {
        $users = $this->Get_Many_Data($request);
        foreach($users as $user)
        {
            if ($user->status == 1) {
                $user->status = '0';
            } elseif ($user->status == 0) {
                $user->status = '1';
            }
            $user->update();
        }
    }

    public function Delete_Data($slug)
    {
        $user = $this->Get_One_Data($slug);
        $user->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->user->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->user->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_Role_For_Data($id)
    {
       return $this->role_user->where('user_id',$id)->get();
    }
}
