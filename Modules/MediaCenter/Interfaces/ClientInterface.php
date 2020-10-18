<?php

namespace Modules\MediaCenter\Interfaces;

use Illuminate\Http\Request;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientStatusEditRequest;

interface ClientInterface{

    public function Get_All_Data();
    public function Create_Data(ClientCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(ClientEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(ClientStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
}