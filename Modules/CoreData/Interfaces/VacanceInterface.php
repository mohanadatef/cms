<?php

namespace Modules\CoreData\Interfaces;

use Illuminate\Http\Request;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceEditRequest;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceStatusEditRequest;

interface VacanceInterface{

    public function Get_All_Data();
    public function Create_Data(VacanceCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(VacanceEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(VacanceStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
}