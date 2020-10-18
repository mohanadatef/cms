<?php

namespace Modules\Setting\Repositories;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Setting\Interfaces\AboutUsInterface;
use Modules\Setting\Entities\About_Us;
use Modules\Setting\Http\Requests\admin\About_us\About_UsCreateRequest;
use Modules\Setting\Http\Requests\admin\About_us\About_UsEditRequest;


class AboutUsRepository implements AboutUsInterface
{

    protected $about_us;

    public function __construct(About_Us $about_us)
    {
        $this->about_us = $about_us;
    }

    public function Get_All_Data()
    {
        return $this->about_us->all();
    }

    public function Create_Data(About_UsCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/about_us'), $imageName);
        $data['image'] = $imageName;
        $this->about_us->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->about_us->where('slug',$slug)->first();
    }

    public function Update_Data(About_UsEditRequest $request, $slug)
    {
        $data[]=0;
        $about_us = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/about_us'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $about_us->update(array_merge($request->all(),$data));
        }
        else
        {
            $about_us->update($request->all());
        }
    }
}
