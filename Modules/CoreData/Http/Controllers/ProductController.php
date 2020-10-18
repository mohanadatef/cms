<?php

namespace Modules\CoreData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CoreData\Entities\Product;
use Modules\CoreData\Http\Requests\admin\Product\ProductCreateRequest;
use Modules\CoreData\Http\Requests\admin\Product\ProductEditRequest;
use Modules\CoreData\Http\Requests\admin\Product\ProductStatusEditRequest;
use Modules\CoreData\Repositories\ItemRepository;
use Modules\CoreData\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;
    private $itemRepository;
    public function __construct(ProductRepository $productRepository,ItemRepository $itemRepository)
    {
        $this->productRepository = $productRepository;
        $this->itemRepository = $itemRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->productRepository->Get_All_Data();
        return view('coredata::product.product_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('coredata::product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductCreateRequest $request)
    {
        $this->productRepository->Create_Data($request);
        return redirect('/admin/product/index')->with('message', 'Add Product Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->productRepository->Get_One_Data($slug);
        return view('coredata::product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProductEditRequest $request, $slug)
    {
        $this->productRepository->Update_Data($request,$slug);
        return redirect('/admin/product/index')->with('message', 'Edit Product Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->productRepository->Delete_Data($slug);
        return redirect('/admin/product/index')->with('message_fales', 'Delete Product Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->productRepository->Get_All_Data_Delete();
        return view('coredata::product.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->productRepository->Back_Data_Delete($slug);
        return redirect('/admin/product/index')->with('message', 'Restore Product Is Done!');
    }

    public function change_status($slug)
    {
        $product = $this->productRepository->Get_One_Data($slug);
        $item = $this->itemRepository->Get_List_Item_For_One_Product($product->id);
        $this->productRepository->Update_Status_One_Data($product,$item);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(ProductStatusEditRequest $request)
    {

        $product = $this->productRepository->Get_List_Product_Status($request);
        $item = $this->itemRepository->Get_List_Item_For_Many_Product($product);
        $product = $this->productRepository->Get_Many_Data($request);
        $this->productRepository->Update_Status_Data($product,$item);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
