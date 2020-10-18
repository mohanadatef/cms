<?php

namespace Modules\CoreData\Repositories;




use Illuminate\Http\Request;
use Modules\CoreData\Entities\Category_Service;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceEditRequest;
use Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceStatusEditRequest;
use Modules\CoreData\Interfaces\Category_ServiceInterface;


class Category_ServiceRepository implements Category_ServiceInterface
{

    protected $category_service;

    public function __construct(Category_Service $category_service)
    {
        $this->category_service = $category_service;
    }

    public function Get_All_Data()
    {
        return $this->category_service->all();
    }

    public function Create_Data(Category_ServiceCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/category_service'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->category_service->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->category_service->where('slug',$slug)->first();
    }

    public function Update_Data(Category_ServiceEditRequest $request, $slug)
    {
        $data[]=0;
        $category_service = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/category_service'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $category_service->update(array_merge($request->all(),$data));
        }
        else
        {
            $category_service->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $category_service = $this->Get_One_Data($slug);
        if ($category_service->status == 1) {
            $category_service->status = '0';
        } elseif ($category_service->status == 0) {
            $category_service->status = '1';
        }
        $category_service->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->category_service->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(Category_ServiceStatusEditRequest $request)
    {
        $category_service = $this->Get_Many_Data($request);
        foreach($category_service as $category_services)
        {
            if ($category_services->status == 1) {
                $category_services->status = '0';
            } elseif ($category_services->status == 0) {
                $category_services->status = '1';
            }
            $category_services->update();
        }
    }

    public function Delete_Data($slug)
    {
        $category_service = $this->Get_One_Data($slug);
        $category_service->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->category_service->onlyTrashed()->get();
    }
    public function Get_Data_Delete($slug)
    {

        return $this->category_service->withTrashed()->where('slug', $slug)->first();
    }
    public function Back_Data_Delete($slug)
    {
        $this->category_service->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_List_Category_Service_For_One_Service($id)
    {
        return $this->category_service->where('service_id',$id)->get();
    }

    public function Get_List_Category_Service_For_Many_Service($id)
    {
        return $this->category_service->wherein('service_id',$id)->get();
    }

}
