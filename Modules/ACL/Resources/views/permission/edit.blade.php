@extends('includes.admin.master_admin')
@section('title')
    Edit Permission
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Permission
            <small>Edit Permission</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/permission/index') }}"><i class="fa fa-permissions"></i>Permission</a></li>
            <li><a href="{{ url('/admin/permission/edit/'.$data->slug) }}"><i class="fa fa-permission"></i>Edit
                    Permission: {{$data->name}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Permission : {{$data->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="permission_edit" action="{{url('admin/permission/update/'.$data->slug)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                                Name : <input type="text" disabled value="{{$data->name}}" class="form-control"
                                              name="name" placeholder="Enter You Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : "" }}">
                                Name display : <input type="text" value="{{$data->display_name}}" class="form-control"
                                                      name="display_name" placeholder="Enter You name display">
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : "" }}">
                        Description : <textarea type="text" id="description" class="form-control" name="description"
                                                placeholder="Enter You Description">{{$data->description}}</textarea>
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
    {!! JsValidator::formRequest('Modules\ACL\Http\Requests\admin\Permission\PermissionEditRequest','#permission_edit') !!}
@endsection