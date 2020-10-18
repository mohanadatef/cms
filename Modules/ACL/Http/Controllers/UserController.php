<?php

namespace Modules\ACL\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ACL\Http\Requests\admin\User\PasswordRequest;
use Modules\ACL\Http\Requests\admin\User\UserCreateRequest;
use Modules\ACL\Http\Requests\admin\User\UserEditRequest;
use Modules\ACL\Http\Requests\admin\User\UserStatusEditRequest;
use Modules\ACL\Repositories\RoleRepository;
use Modules\ACL\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $userRepository;
    private $roleRepository;
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }


    public function index()
    {
        $datas = $this->userRepository->Get_All_Datas();
        return view('acl::user.user_index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $role = $this->roleRepository->Get_List_Data();
        return view('acl::user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        $this->userRepository->Create_Data($request);
        return redirect('/admin/user/index')->with('message', 'Create User Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->userRepository->Get_One_Data($slug);
        $role = $this->roleRepository->Get_List_Data();
        $role_user = $this->userRepository->Get_Role_For_Data($data->id);
        return view('acl::user.edit',compact('data','role','role_user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UserEditRequest $request, $slug)
    {
        $this->userRepository->Update_Data($request, $slug);
        return redirect('/admin/user/index')->with('message', 'Edit User Is Done!');
    }

    public function show_password($slug)
    {
        $data = $this->userRepository->Get_One_Data($slug);
        return view('acl::user.show_password',compact('data'));
    }

    public function change_password(PasswordRequest $request, $slug)
    {
        $this->userRepository->Update_Password_Data($request, $slug);
        return redirect('/admin/user/index')->with('message', 'Reset Password Is Done!');
    }

    public function change_status($slug)
    {
        $this->userRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(UserStatusEditRequest $request)
    {
        $this->userRepository->Update_Status_Datas($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->userRepository->Delete_Data($slug);
        return redirect('/admin/user/index')->with('message_fales', 'Delete User Is Done!');
    }

    public function destroy_index()
    {
        $datas =  $this->userRepository->Get_All_Data_Delete();
        return view('acl::user.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->userRepository->Back_Data_Delete($slug);
        return redirect('/admin/user/index')->with('message', 'Restore User Is Done!');
    }
}
