<?php

namespace Modules\CoreData\Repositories;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\CoreData\Entities\Product;
use Modules\CoreData\Http\Requests\admin\Product\ProductCreateRequest;
use Modules\CoreData\Http\Requests\admin\Product\ProductEditRequest;
use Modules\CoreData\Http\Requests\admin\Product\ProductStatusEditRequest;
use Modules\CoreData\Interfaces\ProductInterface;


class ProductRepository implements ProductInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function Get_All_Data()
    {
        return $this->product->all();
    }

    public function Create_Data(ProductCreateRequest $request)
    {
        $data['status']=1;
        $this->product->create(array_merge($request->all(),$data));
    }

    public function Get_One_Data($slug)
    {
        return $this->product->where('slug',$slug)->first();
    }

    public function Update_Data(ProductEditRequest $request, $slug)
    {
        $product = $this->Get_One_Data($slug);
            $product->update($request->all());
    }


    public function Update_Status_One_Data($product,$item)
    {
        if ($product->status == 1) {
            $product->status = '0';

            if(!$item->isEmpty())
            {
                foreach($item as $items)
                {
                $items->status = '0';
                $items->update();
                }
            }
        } elseif ($product->status == 0) {
            $product->status = '1';
            if(!$item->isEmpty())
            {
                foreach($item as $items)
                {
                    $items->status = '1';
                    $items->update();
                }
            }
        }
        $product->update();
    }

    public function Get_Many_Data(Request $request)
    {
      return  $this->product->wherein('slug',$request->change_status)->get();
    }

    public function Update_Status_Data($product,$item)
    {
        foreach($product as $products)
        {
            if ($products->status == 1) {
                $products->status = '0';
                if(!$item->isEmpty())
                {
                    foreach($item as $items)
                    {
                        $items->status = '0';
                        $items->update();
                    }
                }
            } elseif ($products->status == 0) {
                $products->status = '1';
                if(!$item->isEmpty())
                {
                    foreach($item as $items)
                    {
                        $items->status = '1';
                        $items->update();
                    }
                }
            }
            $products->update();
        }
    }

    public function Delete_Data($slug)
    {
        $product = $this->Get_One_Data($slug);
        $product->delete();
    }

    public function Get_All_Data_Delete()
    {
        return $this->product->onlyTrashed()->get();
    }

    public function Back_Data_Delete($slug)
    {
        $this->product->withTrashed()->where('slug', $slug)->restore();
    }
    public function Get_One_Delete($id)
    {
        return $this->product->find($id);
    }
    public function Get_List_Product()
    {
        return  DB::table("products")->where('status',1)->pluck("title_en", "id");
    }

    public function Get_List_Product_Status(Request $request)
    {
        return  DB::table("products")->wherein('slug',$request->change_status)->pluck("id", "id");
    }
}
