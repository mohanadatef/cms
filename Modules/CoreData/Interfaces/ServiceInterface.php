<?php

namespace Modules\CoreData\Interfaces;

use Illuminate\Http\Request;
use Modules\CoreData\Http\Requests\admin\Service\ServiceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Service\ServiceEditRequest;
use Modules\CoreData\Http\Requests\admin\Service\ServiceStatusEditRequest;

interface ServiceInterface{

    public function Get_All_Data();
    public function Create_Data(ServiceCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(ServiceEditRequest $request, $slug);
    public function Update_Status_One_Data($service,$category_service);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data($service,$category_service);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Service();
    public function Get_List_Service_Status(Request $request);
    public function Get_One_Delete($id);
}