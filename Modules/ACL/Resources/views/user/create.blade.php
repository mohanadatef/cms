@extends('includes.admin.master_admin')
@section('title')
    Create User
@endsection
@section('head_style')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/admin/multi-select.css')}}">
    <style>
        .ms-container {
            width: 25%;
        }

        li.ms-elem-selectable, .ms-selected {
            padding: 5px !important;
        }

        .ms-list {
            height: 150px !important;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            User
            <small>Create User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-users"></i>User</a></li>
            <li><a href="{{ url('/admin/user/create') }}"><i class="fa fa-user"></i>Create User</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="user_create" action="{{url('admin/user/store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : "" }}">
                        User Name : <input type="text" value="{{Request::old('username')}}" class="form-control"
                                           name="username"
                                           placeholder="Enter You User Name">
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                        Email : <input type="text" value="{{Request::old('email')}}" class="form-control"
                                       name="email" placeholder="Enter You Email">
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        Password : <input type="password" value="{{Request::old('password')}}" class="form-control"
                                          name="password" placeholder="Enter You Password">
                    </div>
                    <div class="form-group">
                        Password Confirmation : <input type="password" value="{{Request::old('password')}}"
                                                       class="form-control" name="password_confirmation"
                                                       placeholder="Enter You Password">
                    </div>
                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : "" }}">
                        Choose Roles :
                        <select id="role_id" multiple='multiple' name="role_id[]">
                            @foreach($role as  $myrole)
                                <option value="{{$myrole->id}}"> {{$myrole->display_name}}</option>
                            @endforeach
                        </select>
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
    <script src="{{url('public/js/admin/jquery.multi-select.js')}}"></script>
    <script>
        $('#role_id').multiSelect();
    </script>
    {!! JsValidator::formRequest('Modules\ACL\Http\Requests\admin\User\UserCreateRequest','#user_create') !!}
@endsection