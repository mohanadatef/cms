<?php

namespace Modules\MediaCenter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaCenter\Entities\News;
use Modules\MediaCenter\Http\Requests\admin\News\NewsCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\News\NewsEditRequest;
use Modules\MediaCenter\Http\Requests\admin\News\NewsStatusEditRequest;
use Modules\MediaCenter\Repositories\NewsRepository;

class NewsController extends Controller
{
    private $newsRepository;
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->newsRepository->Get_All_Data();
        return view('mediacenter::news.news_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mediacenter::news.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(NewsCreateRequest $request)
    {
        $this->newsRepository->Create_Data($request);
        return redirect('/admin/news/index')->with('message', 'Add News Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('news::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->newsRepository->Get_One_Data($slug);
        return view('mediacenter::news.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(NewsEditRequest $request, $slug)
    {
        $this->newsRepository->Update_Data($request,$slug);
        return redirect('/admin/news/index')->with('message', 'Edit News Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->newsRepository->Delete_Data($slug);
        return redirect('/admin/news/index')->with('message_fales', 'Delete News Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->newsRepository->Get_All_Data_Delete();
        return view('mediacenter::news.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->newsRepository->Back_Data_Delete($slug);
        return redirect('/admin/news/index')->with('message', 'Restore News Is Done!');
    }

    public function change_status($slug)
    {
        $this->newsRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(NewsStatusEditRequest $request)
    {

        $this->newsRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
