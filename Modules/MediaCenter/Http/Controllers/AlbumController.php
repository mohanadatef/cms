<?php

namespace Modules\MediaCenter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaCenter\Entities\Album;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Album\AlbumStatusEditRequest;
use Modules\MediaCenter\Repositories\AlbumRepository;
use Modules\MediaCenter\Repositories\GalleryRepository;

class AlbumController extends Controller
{
    private $albumRepository;
    private $galleryRepository;
    public function __construct(AlbumRepository $albumRepository,GalleryRepository $galleryRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->galleryRepository = $galleryRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->albumRepository->Get_All_Data();
        $gallery = $this->galleryRepository->Get_List_Gallery();
        return view('mediacenter::album.album_index', compact('datas','gallery'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $gallery = $this->galleryRepository->Get_List_Gallery();
        return view('mediacenter::album.create',compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AlbumCreateRequest $request)
    {
        $this->albumRepository->Create_Data($request);
        return redirect('/admin/album/index')->with('message', 'Add Album Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('album::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->albumRepository->Get_One_Data($slug);
        $gallery = $this->galleryRepository->Get_List_Gallery();
        return view('mediacenter::album.edit', compact('data','gallery'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(AlbumEditRequest $request, $slug)
    {
        $this->albumRepository->Update_Data($request,$slug);
        return redirect('/admin/album/index')->with('message', 'Edit Album Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->albumRepository->Delete_Data($slug);
        return redirect('/admin/album/index')->with('message_fales', 'Delete Album Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->albumRepository->Get_All_Data_Delete();
        return view('mediacenter::album.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $album=$this->albumRepository->Get_Data_Delete($slug);
        $gallery= $this->galleryRepository->Get_One_Delete($album->gallery_id);
        if($gallery != null)
        {
        $this->albumRepository->Back_Data_Delete($slug);
        return redirect('/admin/album/index')->with('message', 'Restore Album Is Done!');
        }
        else
        {
            return redirect('/admin/album/index/delete')->with('message_fales', 'Restore Album Not Can Done!');
        }
    }

    public function change_status($slug)
    {
        $this->albumRepository->Update_Status_One_Data($slug);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(AlbumStatusEditRequest $request)
    {

        $this->albumRepository->Update_Status_Data($request);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
