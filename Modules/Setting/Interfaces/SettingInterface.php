<?php

namespace Modules\Setting\Interfaces;


use Modules\Setting\Http\Requests\admin\Setting\SettingCreateRequest;
use Modules\Setting\Http\Requests\admin\Setting\SettingEditRequest;

interface SettingInterface{

    public function Get_All_Data();
    public function Create_Data(SettingCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(SettingEditRequest  $request, $slug);
}