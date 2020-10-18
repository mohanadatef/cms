<?php

namespace Modules\MediaCenter\Interfaces;

use Illuminate\Http\Request;
use Modules\MediaCenter\Http\Requests\admin\News\NewsCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\News\NewsEditRequest;
use Modules\MediaCenter\Http\Requests\admin\News\NewsStatusEditRequest;

interface NewsInterface{

    public function Get_All_Data();
    public function Create_Data(NewsCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(NewsEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(NewsStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
}