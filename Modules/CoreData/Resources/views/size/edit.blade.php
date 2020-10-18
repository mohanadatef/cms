@extends('includes.admin.master_admin')
@section('title')
    Edit Size
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Size
            <small>Edit Size</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/size/index') }}"><i class="fa fa-permsissions"></i>Size</a></li>
            <li><a href="{{ url('/admin/size/edit/'.$data->slug) }}"><i class="fa fa-permsission"></i>Edit
                    Size: {{$data->title_en }} / {{$data->title_ar}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Size: {{$data->title_en }} / {{$data->title_ar}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="size_edit" action="{{url('admin/size/update/'.$data->slug)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : "" }}">
                                Title English : <input type="text" id="title_en" value="{{$data->title_en}}"
                                                       class="form-control" name="title_en"
                                                       placeholder="Enter You Title English">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title_ar') ? ' has-error' : "" }}">
                                Title Arabic : <input type="text" id="title_ar" value="{{$data->title_ar}}"
                                                      class="form-control" name="title_ar"
                                                      placeholder="Enter You Title Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        Order : <input type="text" value="{{$data->order}}" class="form-control" name="order" id="order"
                                       placeholder="Enter You Order">
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Size\SizeEditRequest','#size_create') !!}
@endsection