<?php

namespace Modules\CoreData\Interfaces;

use Illuminate\Http\Request;
use Modules\CoreData\Http\Requests\admin\Product\ProductCreateRequest;
use Modules\CoreData\Http\Requests\admin\Product\ProductEditRequest;
use Modules\CoreData\Http\Requests\admin\Product\ProductStatusEditRequest;

interface ProductInterface{

    public function Get_All_Data();
    public function Create_Data(ProductCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(ProductEditRequest $request, $slug);
    public function Update_Status_One_Data($product,$item);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data($product,$item);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Product();
    public function Get_List_Product_Status(Request $request);
    public function Get_One_Delete($id);
}