<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Repositories\SettingRepository;
use Modules\Setting\Http\Requests\admin\Setting\SettingCreateRequest;
use Modules\Setting\Http\Requests\admin\Setting\SettingEditRequest;

class SettingController extends Controller
{

    private $settingRepository;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(SettingRepository $SettingRepository)
    {
        $this->settingRepository = $SettingRepository;
    }

    public function index()
    {
        $datas = $this->settingRepository->Get_All_Data();
        return view('setting::setting.setting_index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::setting.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(SettingCreateRequest $request)
    {
        $this->settingRepository->Create_Data($request);
        return redirect('/admin/setting/index')->with('message', 'Add Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->settingRepository->Get_One_Data($slug);
        return view('setting::setting.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(SettingEditRequest $request, $slug)
    {
        $this->settingRepository->Update_Data($request, $slug);
        return redirect('/admin/setting/index')->with('message', 'Edit Is Done!');
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
