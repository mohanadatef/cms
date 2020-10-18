<?php

namespace Modules\CoreData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CoreData\Entities\Service;
use Modules\CoreData\Http\Requests\admin\Service\ServiceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Service\ServiceEditRequest;
use Modules\CoreData\Http\Requests\admin\Service\ServiceStatusEditRequest;
use Modules\CoreData\Repositories\Category_ServiceRepository;
use Modules\CoreData\Repositories\ServiceRepository;

class ServiceController extends Controller
{
    private $serviceRepository;
    private $category_serviceRepository;
    public function __construct(ServiceRepository $serviceRepository,Category_ServiceRepository $category_serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->category_serviceRepository = $category_serviceRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->serviceRepository->Get_All_Data();
        return view('coredata::service.service_index', compact('datas','data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('coredata::service.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ServiceCreateRequest $request)
    {
        $this->serviceRepository->Create_Data($request);
        return redirect('/admin/service/index')->with('message', 'Add Service Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('service::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->serviceRepository->Get_One_Data($slug);
        return view('coredata::service.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ServiceEditRequest $request, $slug)
    {
        $this->serviceRepository->Update_Data($request,$slug);
        return redirect('/admin/service/index')->with('message', 'Edit Service Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->serviceRepository->Delete_Data($slug);
        return redirect('/admin/service/index')->with('message_fales', 'Delete Service Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->serviceRepository->Get_All_Data_Delete();
        return view('coredata::service.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->serviceRepository->Back_Data_Delete($slug);
        return redirect('/admin/service/index')->with('message', 'Restore Service Is Done!');
    }

    public function change_status($slug)
    {
        $service = $this->serviceRepository->Get_One_Data($slug);
        $category_service = $this->category_serviceRepository->Get_List_Category_Service_For_One_Service($service->id);
        $this->serviceRepository->Update_Status_One_Data($service,$category_service);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(ServiceStatusEditRequest $request)
    {

        $service = $this->serviceRepository->Get_List_Service_Status($request);
        $category_service = $this->category_serviceRepository->Get_List_Category_Service_For_Many_Service($service);
        $service = $this->serviceRepository->Get_Many_Data($request);
        $this->serviceRepository->Update_Status_Data($service,$category_service);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
