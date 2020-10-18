<?php

namespace Modules\MediaCenter\Repositories;




use Illuminate\Http\Request;
use Modules\MediaCenter\Entities\News;
use Modules\MediaCenter\Http\Requests\admin\News\NewsCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\News\NewsEditRequest;
use Modules\MediaCenter\Http\Requests\admin\News\NewsStatusEditRequest;
use Modules\MediaCenter\Interfaces\NewsInterface;


class NewsRepository implements NewsInterface
{

    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function Get_All_Data()
    {
        return $this->news->all();
    }

    public function Create_Data(NewsCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/news'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->news->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->news->where('slug',$slug)->first();
    }

    public function Update_Data(NewsEditRequest $request, $slug)
    {
        $data[]=0;
        $news = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/news'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $news->update(array_merge($request->all(),$data));
        }
        else
        {
            $news->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $news = $this->Get_One_Data($slug);
        if ($news->status == 1) {
            $news->status = '0';
        } elseif ($news->status == 0) {
            $news->status = '1';
        }
        $news->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->news->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(NewsStatusEditRequest $request)
    {
        $news = $this->Get_Many_Data($request);
        foreach($news as $new)
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
        $news = $this->Get_One_Data($slug);
        $news->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->news->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->news->withTrashed()->where('slug', $slug)->restore();
    }


}
