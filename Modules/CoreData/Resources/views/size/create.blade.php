@extends('includes.admin.master_admin')
@section('title')
    Create Size
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Size
            <small>Create Size</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/size/index') }}"><i class="fa fa-permsissions"></i>Size</a></li>
            <li><a href="{{ url('/admin/size/create') }}"><i class="fa fa-permsission"></i>Create Size</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Size</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id='size_create' action="{{url('admin/size/store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title_en') ? ' has-error' : "" }}">
                                Title English : <input type="text" value="{{Request::old('title_en')}}"
                                                       class="form-control"
                                                       name="title_en" placeholder="Enter You Title English">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('title_ar') ? ' has-error' : "" }}">
                                Title Arabic : <input type="text" value="{{Request::old('title_ar')}}"
                                                      class="form-control"
                                                      name="title_ar" placeholder="Enter You Title Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                        Order : <input type="text" value="{{Request::old('order')}}" class="form-control" id="order"
                                       name="order" placeholder="Enter You Order">
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Size\SizeCreateRequest','#size_create') !!}
@endsection