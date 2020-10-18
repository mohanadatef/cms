<?php

namespace Modules\CoreData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CoreData\Entities\Category_Service;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceEditRequest;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceStatusEditRequest;
use Modules\CoreData\Repositories\Category_ServiceRepository;
use Modules\CoreData\Repositories\ServiceRepository;

class Category_ServiceController extends Controller
{
    private $category_serviceRepository;
    private $serviceRepository;
    public function __construct(Category_ServiceRepository $category_serviceRepository,ServiceRepository $serviceRepository)
    {
        $this->category_serviceRepository = $category_serviceRepository;
        $this->serviceRepository = $serviceRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->category_serviceRepository->Get_All_Data();

        return view('coredata::category_service.category_service_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $service = $this->serviceRepository->Get_List_Service();
        return view('coredata::category_service.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Category_ServiceCreateRequest $request)
    {
        $this->category_serviceRepository->Create_Data($request);
        return redirect('/admin/category_service/index')->with('message', 'Add Category Service Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('category_service::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->category_serviceRepository->Get_One_Data($slug);
        $service = $this->serviceRepository->Get_List_Service();

        return view('coredata::category_service.edit', compact('data','service'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Category_ServiceEditRequest $request, $slug)
    {
        $this->category_serviceRepository->Update_Data($request,$slug);
        return redirect('/admin/category_service/index')->with('message', 'Edit Category Service Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->category_serviceRepository->Delete_Data($slug);
        return redirect('/admin/category_service/index')->with('message_fales', 'Delete Category Service Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->category_serviceRepository->Get_All_Data_Delete();
        return view('coredata::category_service.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $category_service=$this->category_serviceRepository->Get_Data_Delete($slug);
        $service= $this->serviceRepository->Get_One_Delete($category_service->service_id);
        if($service != null)
        {
            $this->category_serviceRepository->Back_Data_Delete($slug);
            return redirect('/admin/category_service/index')->with('message', 'Restore Category Service Is Done!');
        }
        else
        {
            return redirect('/admin/category_service/index/delete')->with('message_fales', 'Restore Category Service Not Can Done!');
        }
    }

    public function change_status($slug)
    {
        $this->category_serviceRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(Category_ServiceStatusEditRequest $request)
    {

        $this->category_serviceRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
