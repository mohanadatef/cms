<?php

namespace Modules\CoreData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CoreData\Entities\Item;
use Modules\CoreData\Http\Requests\admin\Item\ItemCreateRequest;
use Modules\CoreData\Http\Requests\admin\Item\ItemEditRequest;
use Modules\CoreData\Http\Requests\admin\Item\ItemStatusEditRequest;
use Modules\CoreData\Repositories\ItemRepository;
use Modules\CoreData\Repositories\ProductRepository;

class ItemController extends Controller
{
    private $itemRepository;
    private $productRepository;
    public function __construct(ItemRepository $itemRepository,ProductRepository $productRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->itemRepository->Get_All_Data();
        return view('coredata::item.item_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $product = $this->productRepository->Get_List_Product();
        return view('coredata::item.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ItemCreateRequest $request)
    {
        $this->itemRepository->Create_Data($request);
        return redirect('/admin/item/index')->with('message', 'Add Category Product Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('item::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->itemRepository->Get_One_Data($slug);
        $product = $this->productRepository->Get_List_Product();
        return view('coredata::item.edit', compact('data','product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ItemEditRequest $request, $slug)
    {
        $this->itemRepository->Update_Data($request,$slug);
        return redirect('/admin/item/index')->with('message', 'Edit Category Product Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->itemRepository->Delete_Data($slug);
        return redirect('/admin/item/index')->with('message_fales', 'Delete Category Product Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->itemRepository->Get_All_Data_Delete();
        return view('coredata::item.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $item=$this->itemRepository->Get_Data_Delete($slug);
        $service= $this->productRepository->Get_One_Delete($item->product_id);
        if($service != null)
        {
            $this->itemRepository->Back_Data_Delete($slug);
            return redirect('/admin/item/index')->with('message', 'Restore Category Product Is Done!');
        }
        else
        {
            return redirect('/admin/item/index/delete')->with('message_fales', 'Restore Item Not Can Done!');
        }

    }

    public function change_status($slug)
    {
        $this->itemRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(ItemStatusEditRequest $request)
    {

        $this->itemRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
