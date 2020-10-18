<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Repositories\AboutUsRepository;
use Modules\Setting\Http\Requests\admin\About_us\About_usCreateRequest;
use Modules\Setting\Http\Requests\admin\About_us\About_usEditRequest;

class AboutusController extends Controller
{
    private $aboutusRepository;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(AboutUsRepository $AboutUsRepository)
    {
        $this->aboutusRepository = $AboutUsRepository;
    }

    public function index()
    {
        $datas = $this->aboutusRepository->Get_All_Data();
        return view('setting::about_us.about_us_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(About_usCreateRequest $request)
    {
        $this->aboutusRepository->Create_Data($request);
        return redirect('/admin/about_us/index')->with('message', 'Add Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('about_us::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->aboutusRepository->Get_One_Data($slug);
        return view('setting::about_us.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(About_usEditRequest $request, $slug)
    {
        $this->aboutusRepository->Update_Data($request, $slug);
        return redirect('/admin/about_us/index')->with('message', 'Edit Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {

    }
}
