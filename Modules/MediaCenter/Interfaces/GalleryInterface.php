<?php

namespace Modules\MediaCenter\Interfaces;

use Illuminate\Http\Request;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryStatusEditRequest;

interface GalleryInterface{

    public function Get_All_Data();
    public function Create_Data(GalleryCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(GalleryEditRequest $request, $slug);
    public function Update_Status_One_Data($gallery,$album);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data($gallery,$album);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Gallery();
    public function Get_List_Gallery_Status(Request $request);
    public function Get_One_Delete($id);
}