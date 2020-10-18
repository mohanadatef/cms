@extends('includes.admin.master_admin')
@section('title')
    Create Client
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Client
            <small>Create Client</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/client/index') }}"><i class="fa fa-permsissions"></i>Client</a></li>
            <li><a href="{{ url('/admin/client/create') }}"><i class="fa fa-permsission"></i>Create Client</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Client</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id='client_create' action="{{url('admin/client/store')}}" enctype="multipart/form-data"
                      method="POST">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('number') ? ' has-error' : "" }}">
                                Number : <input type="text" value="{{Request::old('number')}}" class="form-control"
                                                name="number" placeholder="Enter You Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                                Order : <input type="text" value="{{Request::old('order')}}" class="form-control"
                                               id="order" name="order" placeholder="Enter You Order">
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>Select File for Upload</label></td>
                                <td width="30"><input type="file" value="{{Request::old('image')}}" name="image"/></td>
                            </tr>
                            <tr>
                                <td width="40%" align="right"></td>
                                <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                            </tr>
                        </table>
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
    {!! JsValidator::formRequest('Modules\MediaCenter\Http\Requests\admin\Client\ClientCreateRequest','#client_create') !!}
@endsection