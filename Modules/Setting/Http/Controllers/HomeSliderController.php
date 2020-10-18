<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Home_Slider;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderCreateRequest;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderEditRequest;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderStatusEditRequest;
use Modules\Setting\Repositories\HomeSliderRepository;

class HomeSliderController extends Controller
{
    private $homesliderRepository;
    public function __construct(HomeSliderRepository $homesliderRepository)
    {
        $this->homesliderRepository = $homesliderRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->homesliderRepository->Get_All_Data();
        return view('setting::home_slider.home_slider_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::home_slider.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Home_SliderCreateRequest $request)
    {
        $this->homesliderRepository->Create_Data($request);
        return redirect('/admin/home_slider/index')->with('message', 'Add Home Slider Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('home_slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->homesliderRepository->Get_One_Data($slug);
        return view('setting::home_slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Home_SliderEditRequest $request, $slug)
    {
        $this->homesliderRepository->Update_Data($request,$slug);
        return redirect('/admin/home_slider/index')->with('message', 'Edit Home Slider Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->homesliderRepository->Delete_Data($slug);
        return redirect('/admin/home_slider/index')->with('message_fales', 'Delete Home Slider Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->homesliderRepository->Get_All_Data_Delete();
        return view('setting::home_slider.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->homesliderRepository->Back_Data_Delete($slug);
        return redirect('/admin/home_slider/index')->with('message', 'Restore Home Slider Is Done!');
    }

    public function change_status($slug)
    {
        $this->homesliderRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(Home_SliderStatusEditRequest $request)
    {

        $this->homesliderRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
