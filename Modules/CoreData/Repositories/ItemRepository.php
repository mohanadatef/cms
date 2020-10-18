<?php

namespace Modules\CoreData\Repositories;




use Illuminate\Http\Request;
use Modules\CoreData\Entities\Item;
use Modules\CoreData\Http\Requests\admin\Item\ItemCreateRequest;
use Modules\CoreData\Http\Requests\admin\Item\ItemEditRequest;
use Modules\CoreData\Http\Requests\admin\Item\ItemStatusEditRequest;
use Modules\CoreData\Interfaces\ItemInterface;


class ItemRepository implements ItemInterface
{

    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function Get_All_Data()
    {
        return $this->item->all();
    }

    public function Create_Data(ItemCreateRequest $request)
    {
        $imageName = $request->image->getClientOriginalname().'-'.time() .'.'.Request()->image->getClientOriginalExtension();
        Request()->image->move(public_path('images/item'), $imageName);
        $data['image'] = $imageName;
        $data['status']=1;
        $this->item->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->item->where('slug',$slug)->first();
    }

    public function Update_Data(ItemEditRequest $request, $slug)
    {
        $data[]=0;
        $item = $this->Get_One_Data($slug);
        if ($request->image != null) {
            $imageName = $request->image->getClientOriginalname().'-'.time().'.'.Request()->image->getClientOriginalExtension();
            Request()->image->move(public_path('images/item'), $imageName);
            $data['image'] = $imageName;
        }
        if($data != null)
        {
            $item->update(array_merge($request->all(),$data));
        }
        else
        {
            $item->update($request->all());
        }
    }


    public function Update_Status_One_Data($slug)
    {
        $item = $this->Get_One_Data($slug);
        if ($item->status == 1) {
            $item->status = '0';
        } elseif ($item->status == 0) {
            $item->status = '1';
        }
        $item->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->item->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data(ItemStatusEditRequest $request)
    {
        $item = $this->Get_Many_Data($request);
        foreach($item as $items)
        {
            if ($items->status == 1) {
                $items->status = '0';
            } elseif ($items->status == 0) {
                $items->status = '1';
            }
            $items->update();
        }
    }

    public function Delete_Data($slug)
    {
        $item = $this->Get_One_Data($slug);
        $item->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->item->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->item->withTrashed()->where('slug', $slug)->restore();
    }
    public function Get_Data_Delete($slug)
    {

        return $this->item->withTrashed()->where('slug', $slug)->first();
    }
    public function Get_List_Item_For_One_Product($id)
    {
        return $this->item->where('product_id',$id)->get();
    }

    public function Get_List_Item_For_Many_Product($id)
    {
        return $this->item->wherein('product_id',$id)->get();
    }

}
