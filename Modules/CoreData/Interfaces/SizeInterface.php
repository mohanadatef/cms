<?php

namespace Modules\CoreData\Interfaces;

use Illuminate\Http\Request;
use Modules\CoreData\Http\Requests\admin\Size\SizeCreateRequest;
use Modules\CoreData\Http\Requests\admin\Size\SizeEditRequest;
use Modules\CoreData\Http\Requests\admin\Size\SizeStatusEditRequest;

interface SizeInterface{

    public function Get_All_Data();
    public function Create_Data(SizeCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(SizeEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(SizeStatusEditRequest $slug);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Size();
}