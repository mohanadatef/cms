<?php

namespace Modules\CoreData\Repositories;




use Illuminate\Http\Request;
use Modules\CoreData\Entities\Vacance;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceEditRequest;
use Modules\CoreData\Http\Requests\admin\Vacance\VacanceStatusEditRequest;
use Modules\CoreData\Interfaces\VacanceInterface;


class VacanceRepository implements VacanceInterface
{

    protected $vacance;

    public function __construct(Vacance $vacance)
    {
        $this->vacance = $vacance;
    }

    public function Get_All_Data()
    {
        return $this->vacance->all();
    }

    public function Create_Data(VacanceCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/vacance'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->vacance->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->vacance->where('slug',$slug)->first();
    }

    public function Update_Data(VacanceEditRequest $request, $slug)
    {
        $data[]=0;
        $vacance = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/vacance'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $vacance->update(array_merge($request->all(),$data));
        }
        else
        {
            $vacance->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $vacance = $this->Get_One_Data($slug);
        if ($vacance->status == 1) {
            $vacance->status = '0';
        } elseif ($vacance->status == 0) {
            $vacance->status = '1';
        }
        $vacance->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->vacance->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(VacanceStatusEditRequest $request)
    {
        $vacance = $this->Get_Many_Data($request);
        foreach($vacance as $vacances)
        {
            if ($vacances->status == 1) {
                $vacances->status = '0';
            } elseif ($vacances->status == 0) {
                $vacances->status = '1';
            }
            $vacances->update();
        }
    }

    public function Delete_Data($slug)
    {
        $vacance = $this->Get_One_Data($slug);
        $vacance->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->vacance->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->vacance->withTrashed()->where('slug', $slug)->restore();
    }


}
