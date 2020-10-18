@extends('includes.admin.master_admin')
@section('title')
    Edit Client
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Client
            <small>Edit Client</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/client/index') }}"><i class="fa fa-permsissions"></i>Client</a></li>
            <li><a href="{{ url('/admin/client/edit/'.$data->slug) }}"><i class="fa fa-permsission"></i>Edit Client
                    : {{$data->title_en }} / {{$data->title_ar}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Client : {{$data->title_en }} / {{$data->title_ar}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="client_edit" action="{{url('admin/client/update/'.$data->slug)}}"
                      enctype="multipart/form-data" method="POST">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('number') ? ' has-error' : "" }}">
                                Number : <input type="text" id="number" value="{{$data->number}}"
                                                class="form-control" name="number" placeholder="Enter You Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                                Order : <input type="text" value="{{$data->order}}" class="form-control" name="order"
                                               id="order" placeholder="Enter You Order">
                            </div>
                        </div>
                    </div>

                    <div align="center">
                        <img src="{{url('public/images/client').'/'.$data->image}}" style="width:300px;height:300px;">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                            <table class="table">
                                <tr>
                                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                                    <td width="30"><input type="file" value="{{Request::old('image')}}" name="image"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%" align="right"></td>
                                    <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                </tr>
                            </table>
                        </div>
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
    {!! JsValidator::formRequest('Modules\MediaCenter\Http\Requests\admin\Client\ClientEditRequest','#client_edit') !!}
@endsection