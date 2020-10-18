<?php

namespace Modules\CoreData\Interfaces;

use Illuminate\Http\Request;
use Modules\CoreData\Http\Requests\admin\Item\ItemCreateRequest;
use Modules\CoreData\Http\Requests\admin\Item\ItemEditRequest;
use Modules\CoreData\Http\Requests\admin\Item\ItemStatusEditRequest;

interface ItemInterface{

    public function Get_All_Data();
    public function Create_Data(ItemCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(ItemEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(ItemStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Item_For_One_Product($id);
    public function Get_List_Item_For_Many_Product($id);
    public function Get_Data_Delete($slug);
}