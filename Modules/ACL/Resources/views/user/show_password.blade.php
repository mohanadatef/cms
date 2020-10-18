@extends('includes.admin.master_admin')
@section('title')
    Reset Password User
@endsection
@section('head_style')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            User
            <small>Reset Password User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-users"></i>User</a></li>
            <li><a href="{{ url('/admin/user/change_password/'.$data->slug) }}"><i class="fa fa-user"></i>Reset Password User</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Reset Password User : {{$data->username}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="password" action="{{url('admin/user/change_password/'.$data->slug)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        Password : <input type="password" value="{{Request::old('password')}}" class="form-control"
                                          name="password" placeholder="Enter You Password">
                    </div>
                    <div class="form-group">
                        Password Confirmation : <input type="password" value="{{Request::old('password')}}"
                                                       class="form-control" name="password_confirmation"
                                                       placeholder="Enter You Password">
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
    {!! JsValidator::formRequest('Modules\ACL\Http\Requests\admin\User\PasswordRequest','#password') !!}
@endsection