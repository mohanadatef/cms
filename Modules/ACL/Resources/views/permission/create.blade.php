@extends('includes.admin.master_admin')
@section('title')
    Create Permission
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Permission
            <small>Create Permission</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/permsission/index') }}"><i class="fa fa-permsissions"></i>Permission</a></li>
            <li><a href="{{ url('/admin/permsission/create') }}"><i class="fa fa-permsission"></i>Create Permission</a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Permission</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="permission_create" action="{{url('admin/permission/store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                        Name : <input type="text" value="{{Request::old('name')}}" class="form-control" name="name"
                                      placeholder="Enter You Name">
                    </div>
                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : "" }}">
                        Display Name : <input type="text" value="{{Request::old('display_name')}}" class="form-control"
                                              name="display_name" placeholder="Enter You Display Name">
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : "" }}">
                        Description : <textarea type="text" class="form-control" placeholder="Enter You Description"
                                                name="description">{{Request::old('description')}}</textarea>
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
    {!! JsValidator::formRequest('Modules\ACL\Http\Requests\admin\Permission\PermissionCreateRequest','#permission_create') !!}
@endsection