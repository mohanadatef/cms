<?php

namespace Modules\Setting\Repositories;




use Illuminate\Http\Request;
use Modules\Setting\Entities\Home_Slider;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderCreateRequest;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderEditRequest;
use Modules\Setting\Http\Requests\admin\Home_Slider\Home_SliderStatusEditRequest;
use Modules\Setting\Interfaces\HomeSliderInterface;


class HomeSliderRepository implements HomeSliderInterface
{

    protected $home_slider;

    public function __construct(Home_Slider $home_slider)
    {
        $this->home_slider = $home_slider;
    }

    public function Get_All_Data()
    {
        return $this->home_slider->all();
    }

    public function Create_Data(Home_SliderCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/home_slider'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->home_slider->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->home_slider->where('slug',$slug)->first();
    }

    public function Update_Data(Home_SliderEditRequest $request, $slug)
    {
        $data[]=0;
        $home_slider = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/home_slider'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $home_slider->update(array_merge($request->all(),$data));
        }
        else
        {
            $home_slider->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $home_slider = $this->Get_One_Data($slug);
        if ($home_slider->status == 1) {
            $home_slider->status = '0';
        } elseif ($home_slider->status == 0) {
            $home_slider->status = '1';
        }
        $home_slider->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->home_slider->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(Home_SliderStatusEditRequest $request)
    {
        $home_slider = $this->Get_Many_Data($request);
        foreach($home_slider as $slider)
        {
            if ($slider->status == 1) {
                $slider->status = '0';
            } elseif ($slider->status == 0) {
                $slider->status = '1';
            }
            $slider->update();
        }
    }

    public function Delete_Data($slug)
    {
        $home_slider = $this->Get_One_Data($slug);
        $home_slider->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->home_slider->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->home_slider->withTrashed()->where('slug', $slug)->restore();
    }


}
