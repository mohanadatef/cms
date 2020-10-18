@extends('includes.admin.master_admin')
@section('title')
   Edit Role
@endsection
@section('head_style')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/admin/multi-select.css')}}">
    <style>

        .ms-container {
            width: 50%;
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
            Role
            <small>Edit Role</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/role/index') }}"><i class="fa fa-roles"></i>Role</a></li>
            <li><a href="{{ url('/admin/role/edit/'.$data->slug) }}"><i class="fa fa-role"></i>Edit Role: {{$data->name}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Role : {{$data->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id='role_edit' action="{{url('admin/role/update/'.$data->slug)}}"  method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                        Name : <input type="text" value="{{$data->name}}" class="form-control" name="name" placeholder="Enter You Name">
                    </div>
                    <div class="form-group{{ $errors->has('display_name') ? ' has-error' : "" }}">
                        Name display : <input type="text" value="{{$data->display_name}}" class="form-control" name="display_name" placeholder="Enter You name display">
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : "" }}">
                        Description : <textarea type="text" id="description" class="form-control" name="description" placeholder="Enter You Description">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group{{ $errors->has('permission_id') ? ' has-error' : "" }}">
                        choose Rermission :
                        <select  id="permission_id"  multiple='multiple' name="permission[]">
                            @foreach($permission as  $mypermission)
                                <option value="{{$mypermission->id}}" @foreach($permission_role as  $mypermission_role) @if($mypermission_role->permission_id ==$mypermission->id)){ selected  } @else{   }@endif @endforeach > {{$mypermission->display_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{url('public/js/admin/jquery.multi-select.js')}}"></script>
    <script>
        $('#permission_id').multiSelect();
    </script>
    {!! JsValidator::formRequest('Modules\ACL\Http\Requests\admin\Role\RoleEditRequest','#role_edit') !!}
@endsection