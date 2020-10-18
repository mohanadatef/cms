<?php

namespace Modules\MediaCenter\Interfaces;

use Illuminate\Http\Request;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumStatusEditRequest;

interface AlbumInterface{

    public function Get_All_Data();
    public function Create_Data(AlbumCreateRequest $request);
    public function Get_One_Data($slug);
    public function Update_Data(AlbumEditRequest $request, $slug);
    public function Update_Status_One_Data($slug);
    public function Get_Many_Data(Request $request);
    public function Update_Status_Data(AlbumStatusEditRequest $request);
    public function Delete_Data($slug);
    public function Get_All_Data_Delete();
    public function Back_Data_Delete($slug);
    public function Get_List_Album_For_One_Gallery($id);
    public function Get_List_Album_For_Many_Gallery($id);
    public function Get_Data_Delete($slug);
}