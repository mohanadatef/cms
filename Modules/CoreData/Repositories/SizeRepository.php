<?php

namespace Modules\CoreData\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\CoreData\Entities\Size;
use Modules\CoreData\Http\Requests\admin\Size\SizeCreateRequest;
use Modules\CoreData\Http\Requests\admin\Size\SizeEditRequest;
use Modules\CoreData\Http\Requests\admin\Size\SizeStatusEditRequest;
use Modules\CoreData\Interfaces\SizeInterface;


class SizeRepository implements SizeInterface
{

    protected $size;

    public function __construct(Size $size)
    {
        $this->size = $size;
    }

    public function Get_All_Data()
    {
        return $this->size->all();
    }

    public function Create_Data(SizeCreateRequest $request)
    {
        $data['status']=1;
        $this->size->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->size->where('slug',$slug)->first();
    }

    public function Update_Data(SizeEditRequest $request, $slug)
    {
        $size = $this->Get_One_Data($slug);
            $size->update($request->all());
    }


    public function Update_Status_One_Data($slug)
    {
        $size = $this->Get_One_Data($slug);
        if ($size->status == 1) {
            $size->status = '0';
        } elseif ($size->status == 0) {
            $size->status = '1';
        }
        $size->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->size->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(SizeStatusEditRequest $request)
    {
        $size = $this->Get_Many_Data($request);
        foreach($size as $sizes)
        {
            if ($sizes->status == 1) {
                $sizes->status = '0';
            } elseif ($sizes->status == 0) {
                $sizes->status = '1';
            }
            $sizes->update();
        }
    }

    public function Delete_Data($slug)
    {
        $size = $this->Get_One_Data($slug);
        $size->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->size->onlyTrashed()->get();
    }
    public function Get_One_Delete($id)
    {
        return $this->size->find($id);
    }
    public function Back_Data_Delete($slug)
    {
        $this->size->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_List_Size()
    {
        return  DB::table("sizes")->where('status',1)->pluck("title_en", "id");
    }

}
