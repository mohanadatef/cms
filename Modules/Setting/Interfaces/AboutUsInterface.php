<?php

namespace Modules\Setting\Interfaces;

use Illuminate\Http\Request;
use Modules\Setting\Http\Requests\admin\About_us\About_UsCreateRequest;
use Modules\Setting\Http\Requests\admin\About_us\About_UsEditRequest;

interface AboutUsInterface{

    public function Get_All_Data();
    public function Create_Data(About_UsCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(About_UsEditRequest $request, $slug);
}