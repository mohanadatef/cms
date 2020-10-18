@extends('includes.admin.master_admin')
@section('title')
    Index Role
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Role
            <small>All Role</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/role/index') }}"><i class="fa fa-roles"></i>Role</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
                <div class="box-header" align="right">
                    @permission('role-create')
                    <a href="{{  url('/admin/role/create') }}" class="btn btn-primary">Create</a>
                    @endpermission
                </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(count($datas) > 0)
                    <div align="center" class="col-md-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th align="center">Name</th>
                            <th align="center">Display Name</th>
                            <th align="center">Description</th>
                            <th align="center">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td align="center">{{ $data->name }}</td>
                                <td align="center">{{ $data->display_name }}</td>
                                <td align="center">{!! $data->description !!}</td>
                                <td align="center">
                                    @permission('role-edit')
                                    <a href="{{ url('/admin/role/edit/'.$data->slug)}}"><i
                                                class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                data-id=""> Edit</i></a>
                                    @endpermission
                                    @permission('role-delete')
                                    <button type="button" id="{{$data->slug}}" onclick="selectItem('{{$data->slug}}')" class="btn btn-sm btn-danger ace-icon fa fa-remove bigger-120  edit" data-toggle="modal" data-target="#modal-danger">
                                        Delete
                                    </button>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th align="center">Name</th>
                            <th align="center">Display Name</th>
                            <th align="center">Description</th>
                            <th align="center">Control</th>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                @else
                    <div align="center">There is no Data to show</div>
                @endif
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <form id="role_delete" action="" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <div class="modal-body">
                        <p>If you Delete it ,You will Delete Data in Permission & User</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Delete</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
    <script>
        function selectItem(slug) {
            $('#role_delete').attr('action', "destroy/"+slug);
        }
    </script>
@endsection