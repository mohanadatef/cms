<?php

namespace Modules\CoreData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CoreData\Entities\Vacance;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceEditRequest;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceStatusEditRequest;
use Modules\CoreData\Repositories\VacanceRepository;

class VacanceController extends Controller
{
    private $vacanceRepository;
    public function __construct(VacanceRepository $vacanceRepository)
    {
        $this->vacanceRepository = $vacanceRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->vacanceRepository->Get_All_Data();
        return view('coredata::vacance.vacance_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('coredata::vacance.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(VacanceCreateRequest $request)
    {
        $this->vacanceRepository->Create_Data($request);
        return redirect('/admin/vacance/index')->with('message', 'Add Vacance Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('vacance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->vacanceRepository->Get_One_Data($slug);
        return view('coredata::vacance.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(VacanceEditRequest $request, $slug)
    {
        $this->vacanceRepository->Update_Data($request,$slug);
        return redirect('/admin/vacance/index')->with('message', 'Edit Vacance Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->vacanceRepository->Delete_Data($slug);
        return redirect('/admin/vacance/index')->with('message_fales', 'Delete Vacance Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->vacanceRepository->Get_All_Data_Delete();
        return view('coredata::vacance.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->vacanceRepository->Back_Data_Delete($slug);
        return redirect('/admin/vacance/index')->with('message', 'Restore Vacance Is Done!');
    }

    public function change_status($slug)
    {
        $this->vacanceRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(VacanceStatusEditRequest $request)
    {

        $this->vacanceRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
