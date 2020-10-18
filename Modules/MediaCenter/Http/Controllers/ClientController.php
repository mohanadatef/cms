<?php

namespace Modules\MediaCenter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaCenter\Entities\Client;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Client\ClientStatusEditRequest;
use Modules\MediaCenter\Repositories\ClientRepository;

class ClientController extends Controller
{
    private $clientRepository;
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->clientRepository->Get_All_Data();
        return view('mediacenter::client.client_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mediacenter::client.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ClientCreateRequest $request)
    {
        $this->clientRepository->Create_Data($request);
        return redirect('/admin/client/index')->with('message', 'Add Client Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->clientRepository->Get_One_Data($slug);
        return view('mediacenter::client.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ClientEditRequest $request, $slug)
    {
        $this->clientRepository->Update_Data($request,$slug);
        return redirect('/admin/client/index')->with('message', 'Edit Client Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->clientRepository->Delete_Data($slug);
        return redirect('/admin/client/index')->with('message_fales', 'Delete Client Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->clientRepository->Get_All_Data_Delete();
        return view('mediacenter::client.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->clientRepository->Back_Data_Delete($slug);
        return redirect('/admin/client/index')->with('message', 'Restore Client Is Done!');
    }

    public function change_status($slug)
    {
        $this->clientRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(ClientStatusEditRequest $request)
    {

        $this->clientRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
