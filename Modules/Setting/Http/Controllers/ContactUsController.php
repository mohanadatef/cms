<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Http\Requests\admin\Contact_us\Contact_usCreateRequest;
use Modules\Setting\Http\Requests\admin\Contact_us\Contact_usEditRequest;
use Modules\Setting\Repositories\ContactUsRepository;

class ContactusController extends Controller
{
    private $contactusRepository;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct(ContactUsRepository $contactUsRepository)
    {
        $this->contactusRepository = $contactUsRepository;
    }

    public function index()
    {
        $datas = $this->contactusRepository->Get_All_Data();
        return view('setting::contact_us.contact_us_index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Contact_usCreateRequest $request)
    {
        $this->contactusRepository->Create_Data($request);
        return redirect('/admin/contact_us/index')->with('message', 'Add Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('contact_us::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->contactusRepository->Get_One_Data($slug);
        return view('setting::contact_us.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Contact_usEditRequest $request, $slug)
    {

        $this->contactusRepository->Update_Data($request, $slug);
        return redirect('/admin/contact_us/index')->with('message', 'Edit Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {

    }
}
