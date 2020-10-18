<?php

namespace Modules\Setting\Repositories;



use Modules\Setting\Interfaces\SettingInterface;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\admin\Setting\SettingCreateRequest;
use Modules\Setting\Http\Requests\admin\Setting\SettingEditRequest;


class SettingRepository implements SettingInterface
{

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function Get_All_Data()
    {
        return $this->setting->all();
    }

    public function Create_Data(SettingCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/setting'), $imageName);
        $data['image'] = $imageName;
        $logoName = $request->logo->getClientOriginalname().'-'.time().'-logo.'.Request()->logo->getClientOriginalExtension();
        Request()->logo->move(public_path('images/setting'), $logoName);
        $data['logo'] = $logoName;
        $this->setting->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->setting->where('slug',$slug)->first();
    }

    public function Update_Data(SettingEditRequest $request, $slug)
    {
        $data[]=0;
        $setting = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/setting'), $imageName);
            $data['image'] = $imageName;
        }
        if ($request->logo != null) {
            $logoName = $request->logo->getClientOriginalname().'-'.time().'-logo.'.Request()->logo->getClientOriginalExtension();
            Request()->logo->move(public_path('images/setting'), $logoName);
            $data['loge'] = $logoName;
        }
        if($data != null)
        {
            $setting->update(array_merge($request->all(),$data));
        }
        else
        {
            $setting->update($request->all());
        }
    }
}
