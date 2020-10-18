<?php

namespace Modules\Setting\Interfaces;

use Illuminate\Http\Request;
use Modules\Setting\Http\Requests\admin\Contact_us\Contact_UsCreateRequest;
use Modules\Setting\Http\Requests\admin\Contact_us\Contact_UsEditRequest;

interface ContactUsInterface{

    public function Get_All_Data();
    public function Create_Data(Contact_UsCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(Contact_UsEditRequest $request, $slug);
}