<?php

namespace Modules\Setting\Interfaces;

use Illuminate\Http\Request;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderCreateRequest;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderEditRequest;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderStatusEditRequest;

interface HomeSliderInterface{

    public function Get_All_Data();
    public function Create_Data(Home_SliderCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(Home_SliderEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(Home_SliderStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
}