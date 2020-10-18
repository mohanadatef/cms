<?php

namespace Modules\ACL\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Http\Requests\admin\Permission\PermissionCreateRequest;
use Modules\ACL\Http\Requests\admin\Permission\PermissionEditRequest;
use Modules\ACL\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    private $permissionRepository;
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->permissionRepository->Get_All_Datas();
        return view('acl::permission.permission_index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('acl::permission.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(PermissionCreateRequest $request)
    {
        $this->permissionRepository->Create_Data($request);
        return redirect('/admin/permission/index')->with('message', 'Add Permission Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
        $datas=$this->permissionRepository->Get_All_Data_Delete();
        return view('acl::permission.destroy_index',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->permissionRepository->Get_One_Data($slug);
        return view('acl::permission.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(PermissionEditRequest $request,$slug)
    {
        $this->permissionRepository->Update_Data($request, $slug);
        return redirect('/admin/permission/index')->with('message', 'Edit Permission Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->permissionRepository->Delete_Data($slug);
        return redirect('/admin/permission/index')->with('message_fales', 'Delete Permission Is Done!');
    }

    public function restore($slug)
    {
        $this->permissionRepository->Back_Data_Delete($slug);
        return redirect('/admin/permission/index')->with('message', 'Restore Permission Is Done!');
    }


}
