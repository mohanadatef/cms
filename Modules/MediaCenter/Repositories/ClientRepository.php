<?php

namespace Modules\MediaCenter\Repositories;




use Illuminate\Http\Request;
use Modules\MediaCenter\Entities\Client;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientStatusEditRequest;
use Modules\MediaCenter\Interfaces\ClientInterface;


class ClientRepository implements ClientInterface
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function Get_All_Data()
    {
        return $this->client->all();
    }

    public function Create_Data(ClientCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/client'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        if($request->number == null)
        {
            $data['number']=0;
        }
        $this->client->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->client->where('slug',$slug)->first();
    }

    public function Update_Data(ClientEditRequest $request, $slug)
    {
        $data[]=0;
        $client = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/client'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $client->update(array_merge($request->all(),$data));
        }
        else
        {
            $client->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $client = $this->Get_One_Data($slug);
        if ($client->status == 1) {
            $client->status = '0';
        } elseif ($client->status == 0) {
            $client->status = '1';
        }
        $client->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->client->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(ClientStatusEditRequest $request)
    {
        $client = $this->Get_Many_Data($request);
        foreach($client as $new)
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
        $client = $this->Get_One_Data($slug);
        $client->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->client->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->client->withTrashed()->where('slug', $slug)->restore();
    }


}
