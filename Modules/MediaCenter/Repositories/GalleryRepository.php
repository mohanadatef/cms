<?php

namespace Modules\MediaCenter\Repositories;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\MediaCenter\Entities\Gallery;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryStatusEditRequest;
use Modules\MediaCenter\Interfaces\GalleryInterface;


class GalleryRepository implements GalleryInterface
{

    protected $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function Get_All_Data()
    {
        return $this->gallery->all();
    }

    public function Create_Data(GalleryCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/gallery'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->gallery->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->gallery->where('slug',$slug)->first();
    }
    public function Get_One_Delete($id)
    {
        return $this->gallery->find($id);
    }
    public function Update_Data(GalleryEditRequest $request, $slug)
    {
        $data[]=0;
        $gallery = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/gallery'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $gallery->update(array_merge($request->all(),$data));
        }
        else
        {
            $gallery->update($request->all());
        }
    }


    public function Update_Status_One_Data($gallery,$album)
    {

        if ($gallery->status == 1) {
            $gallery->status = '0';

            if(!$album->isEmpty())
            {
                foreach($album as $albums)
                {
                    $albums->status = '0';
                    $albums->update();
                }
            }
        } elseif ($gallery->status == 0) {
            $gallery->status = '1';
            if(!$album->isEmpty())
            {
                foreach($album as $albums)
                {
                    $albums->status = '1';
                    $albums->update();
                }
            }
        }
        $gallery->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->gallery->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data($gallery,$album)
    {
        foreach($gallery as $gallerys)
        {
            if ($gallerys->status == 1) {
                $gallerys->status = '0';
                if(!$album->isEmpty())
                {
                    foreach($album as $albums)
                    {
                        $albums->status = '0';
                        $albums->update();
                    }
                }
            } elseif ($gallerys->status == 0) {
                $gallerys->status = '1';
                if(!$album->isEmpty())
                {
                    foreach($album as $albums)
                    {
                        $albums->status = '1';
                        $albums->update();
                    }
                }
            }
            $gallerys->update();
        }
    }

    public function Delete_Data($slug)
    {
        $gallery = $this->Get_One_Data($slug);
        $gallery->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->gallery->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->gallery->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_List_Gallery()
    {
        return  DB::table("galleries")->where('status',1)->pluck("title_en", "id");
    }

    public function Get_List_Gallery_Status(Request $request)
    {
        return  DB::table("galleries")->wherein('slug',$request->change_status)->pluck("id", "id");
    }
}
