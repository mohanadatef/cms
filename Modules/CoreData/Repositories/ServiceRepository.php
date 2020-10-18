<?php

namespace Modules\CoreData\Repositories;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\CoreData\Entities\Service;
use Modules\CoreData\Http\Requests\admin\Service\ServiceCreateRequest;
use Modules\CoreData\Http\Requests\admin\Service\ServiceEditRequest;
use Modules\CoreData\Http\Requests\admin\Service\ServiceStatusEditRequest;
use Modules\CoreData\Interfaces\ServiceInterface;


class ServiceRepository implements ServiceInterface
{

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function Get_All_Data()
    {
        return $this->service->all();
    }

    public function Create_Data(ServiceCreateRequest $request)
    {
        $data['status']=1;
        $this->service->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->service->where('slug',$slug)->first();
    }

    public function Update_Data(ServiceEditRequest $request, $slug)
    {
        $service = $this->Get_One_Data($slug);
            $service->update($request->all());
    }


    public function Update_Status_One_Data($service,$category_service)
    {
        if ($service->status == 1) {
            $service->status = '0';

            if(!$category_service->isEmpty())
            {
                foreach($category_service as $category_services)
                {
                $category_services->status = '0';
                $category_services->update();
                }
            }
        } elseif ($service->status == 0) {
            $service->status = '1';
            if(!$category_service->isEmpty())
            {
                foreach($category_service as $category_services)
                {
                    $category_services->status = '1';
                    $category_services->update();
                }
            }
        }
        $service->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->service->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data($service,$category_service)
    {
        foreach($service as $services)
        {
            if ($services->status == 1) {
                $services->status = '0';
                if(!$category_service->isEmpty())
                {
                    foreach($category_service as $category_services)
                    {
                        $category_services->status = '0';
                        $category_services->update();
                    }
                }
            } elseif ($services->status == 0) {
                $services->status = '1';
                if(!$category_service->isEmpty())
                {
                    foreach($category_service as $category_services)
                    {
                        $category_services->status = '1';
                        $category_services->update();
                    }
                }
            }
            $services->update();
        }
    }

    public function Delete_Data($slug)
    {
        $service = $this->Get_One_Data($slug);
        $service->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->service->onlyTrashed()->get();
    }
    public function Get_One_Delete($id)
    {
        return $this->service->find($id);
    }
    public function Back_Data_Delete($slug)
    {
        $this->service->withTrashed()->where('slug', $slug)->restore();
    }

    public function Get_List_Service()
    {
        return  DB::table("services")->where('status',1)->pluck("title_en", "id");
    }

    public function Get_List_Service_Status(Request $request)
    {
        return  DB::table("services")->wherein('slug',$request->change_status)->pluck("id", "id");
    }
}
