<?php

namespace Modules\MediaCenter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaCenter\Entities\Gallery;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryCreateRequest;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryEditRequest;
use Modules\MediaCenter\Http\Requests\admin\Gallery\GalleryStatusEditRequest;
use Modules\MediaCenter\Repositories\AlbumRepository;
use Modules\MediaCenter\Repositories\GalleryRepository;

class GalleryController extends Controller
{
    private $galleryRepository;
    private $albumRepository;
    public function __construct(GalleryRepository $galleryRepository,AlbumRepository $albumRepository)
    {
        $this->galleryRepository = $galleryRepository;
        $this->albumRepository = $albumRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $datas = $this->galleryRepository->Get_All_Data();
        return view('mediacenter::gallery.gallery_index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mediacenter::gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(GalleryCreateRequest $request)
    {
        $this->galleryRepository->Create_Data($request);
        return redirect('/admin/gallery/index')->with('message', 'Add Gallery Is Done!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($slug)
    {
        return view('gallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($slug)
    {
        $data = $this->galleryRepository->Get_One_Data($slug);
        return view('mediacenter::gallery.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(GalleryEditRequest $request, $slug)
    {
        $this->galleryRepository->Update_Data($request,$slug);
        return redirect('/admin/gallery/index')->with('message', 'Edit Gallery Is Done!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($slug)
    {
        $this->galleryRepository->Delete_Data($slug);
        return redirect('/admin/gallery/index')->with('message_fales', 'Delete Gallery Is Done!');
    }

    public function destroy_index()
    {
        $datas=$this->galleryRepository->Get_All_Data_Delete();
        return view('mediacenter::gallery.destroy_index',compact('datas'));
    }

    public function restore($slug)
    {
        $this->galleryRepository->Back_Data_Delete($slug);
        return redirect('/admin/gallery/index')->with('message', 'Restore Gallery Is Done!');
    }

    public function change_status($slug)
    {
        $gallery = $this->galleryRepository->Get_One_Data($slug);
        $album = $this->albumRepository->Get_List_Album_For_One_Gallery($gallery->id);
        $this->galleryRepository->Update_Status_One_Data($gallery,$album);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

    public function change_many_status(GalleryStatusEditRequest $request)
    {

        $gallery = $this->galleryRepository->Get_List_Gallery_Status($request);
        $album = $this->albumRepository->Get_List_Album_For_Many_Gallery($gallery);
        $gallery = $this->galleryRepository->Get_Many_Data($request);
        $this->galleryRepository->Update_Status_Data($gallery,$album);
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }

}
