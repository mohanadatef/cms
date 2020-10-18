<?php

namespace Modules\MediaCenter\Repositories;




use Illuminate\Http\Request;
use Modules\MediaCenter\Entities\Album;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumStatusEditRequest;
use Modules\MediaCenter\Interfaces\AlbumInterface;


class AlbumRepository implements AlbumInterface
{

    protected $album;

    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    public function Get_All_Data()
    {
        return $this->album->all();
    }

    public function Create_Data(AlbumCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/album'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->album->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->album->where('slug',$slug)->first();
    }

    public function Update_Data(AlbumEditRequest $request, $slug)
    {
        $data[]=0;
        $album = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/album'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $album->update(array_merge($request->all(),$data));
        }
        else
        {
            $album->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $album = $this->Get_One_Data($slug);
        if ($album->status == 1) {
            $album->status = '0';
        } elseif ($album->status == 0) {
            $album->status = '1';
        }
        $album->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->album->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(AlbumStatusEditRequest $request)
    {
        $album = $this->Get_Many_Data($request);
        foreach($album as $new)
        {
            if ($new->status == 1) {
                $new->status = '0';
            } elseif ($new->status == 0) {
                $new->status = '1';
            }
            $new->update();
        }
    }

    public function Delete_Data($slug)
    {
        $album = $this->Get_One_Data($slug);
        $album->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->album->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {

        $this->album->withTrashed()->where('slug', $slug)->restore();
    }
    public function Get_Data_Delete($slug)
    {

        return $this->album->withTrashed()->where('slug', $slug)->first();
    }

    public function Get_List_Album_For_One_Gallery($id)
    {
        return $this->album->where('gallery_id',$id)->get();
    }

    public function Get_List_Album_For_Many_Gallery($id)
    {
        return $this->album->wherein('gallery_id',$id)->get();
    }
}
