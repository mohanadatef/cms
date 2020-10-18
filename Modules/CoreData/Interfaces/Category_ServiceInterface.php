<?php

namespace Modules\CoreData\Interfaces;

use Illuminate\Http\Request;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceEditRequest;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceStatusEditRequest;

interface Category_ServiceInterface{

    public function Get_All_Data();
    public function Create_Data(Category_ServiceCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(Category_ServiceEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(Category_ServiceStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Category_Service_For_One_Service($id);
    public function Get_List_Category_Service_For_Many_Service($id);
    public function Get_Data_Delete($slug);
}