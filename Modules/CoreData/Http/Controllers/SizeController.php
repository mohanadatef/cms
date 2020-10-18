<?php

namespace Modules\CoreData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CoreData\Http\Requests\admin\Size\SizeCreateRequest;
use Modules\CoreData\Http\Requests\admin\Size\SizeEditRequest;
use Modules\CoreData\Http\Requests\admin\Size\SizeStatusEditRequest;
use Modules\CoreData\Repositories\SizeRepository;

class SizeController extends Controller
{
    private $sizeRepository;
    public function __construct(SizeRepository $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->sizeRepository->Get_All_Data();
        return view('coredata::size.size_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('coredata::size.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(SizeCreateRequest $request)
    {
        $this->sizeRepository->Create_Data($request);
        return redirect('/admin/size/index')->with('message', 'Add Size Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('size::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->sizeRepository->Get_One_Data($slug);
        return view('coredata::size.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(SizeEditRequest $request, $slug)
    {
        $this->sizeRepository->Update_Data($request,$slug);
        return redirect('/admin/size/index')->with('message', 'Edit Size Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->sizeRepository->Delete_Data($slug);
        return redirect('/admin/size/index')->with('message_fales', 'Delete Size Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->sizeRepository->Get_All_Data_Delete();
        return view('coredata::size.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->sizeRepository->Back_Data_Delete($slug);
        return redirect('/admin/size/index')->with('message', 'Restore Size Is Done!');
    }

    public function change_status($slug)
    {
        $this->sizeRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(SizeStatusEditRequest $request)
    {

        $this->sizeRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
