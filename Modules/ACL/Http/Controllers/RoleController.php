<?php

namespace Modules\ACL\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Entities\Permission_role;
use Modules\ACL\Entities\Role;
use Modules\ACL\Http\Requests\admin\Role\RoleCreateRequest;
use Modules\ACL\Http\Requests\admin\Role\RoleEditRequest;
use Modules\ACL\Repositories\PermissionRepository;
use Modules\ACL\Repositories\RoleRepository;

class RoleController extends Controller
{

    private $permissionRepository;
    private $roleRepository;
    public function __construct(PermissionRepository $permissionRepository,RoleRepository $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->roleRepository->Get_All_Datas();
        return view('acl::role.role_index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $permission = $this->permissionRepository->Get_List_Data();
        return view('acl::role.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RoleCreateRequest $request)
    {
        $this->roleRepository->Create_Data($request);
        return redirect('/admin/role/index')->with('message', 'Create Roles Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
        $datas=$this->roleRepository->Get_All_Data_Delete();
        return view('acl::role.destroy_index',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->roleRepository->Get_One_Data($slug);
        $permission = $this->permissionRepository->Get_List_Data();
        $permission_role = $this->roleRepository->Get_Permission_For_Data($data->id);
        return view('acl::role.edit',compact('data','permission','permission_role'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(RoleEditRequest $request, $slug)
    {
        $this->roleRepository->Update_Data($request, $slug);
        return redirect('/admin/role/index')->with('message', 'Edit Roles Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->roleRepository->Delete_Data($slug);
        return redirect('/admin/role/index')->with('message_fales', 'Delete Roles Is Done!');
    }

    public function restore($slug)
    {
        $this->roleRepository->Back_Data_Delete($slug);
    }
}
