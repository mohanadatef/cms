@extends('includes.admin.master_admin')
@section('title')
    Edit Setting
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Setting
            <small>Edit Setting</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/setting/index') }}"><i class="fa fa-permsissions"></i>Setting</a></li>
            <li><a href="{{ url('/admin/setting/edit/'.$data->slug) }}"><i class="fa fa-permsission"></i>Edit
                    Setting: {{$data->title_en }} / {{$data->title_ar}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Setting: {{$data->title_en }} / {{$data->title_ar}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="setting_edit" action="{{url('admin/setting/update/'.$data->slug)}}"
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
                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : "" }}">
                        Facebook : <input type="text" value="{{$data->facebook}}" class="form-control" name="facebook"
                                          placeholder="enter you Facebook">
                    </div>
                    <div class="form-group{{ $errors->has('youtube') ? ' has-error' : "" }}">
                        Youtube : <input type="text" value="{{$data->youtube}}" class="form-control" name="youtube"
                                         placeholder="Enter You Youtube">
                    </div>
                    <div class="form-group{{ $errors->has('twitter') ? ' has-error' : "" }}">
                        Twitter : <input type="text" value="{{$data->twitter}}" class="form-control" name="twitter"
                                         placeholder="Enter You Twitter">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{url('public/images/setting').'/'.$data->image}}">
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>Select File for Upload</label></td>
                                        <td width="30"><input type="file" value="{{Request::old('image')}}"
                                                              name="image"/></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img src="{{url('public/images/setting').'/'.$data->logo}}">
                            <div class="form-group{{ $errors->has('logo') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>Select File for Upload</label></td>
                                        <td width="30"><input type="file" value="{{Request::old('logo')}}" name="logo"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                    </tr>
                                </table>
                            </div>
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
    {!! JsValidator::formRequest('Modules\Setting\Http\Requests\admin\Setting\SettingEditRequest','#setting_create') !!}
@endsection