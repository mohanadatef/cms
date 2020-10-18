@extends('includes.admin.master_admin')
@section('title')
    Index User
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
            User
            <small>All User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/admin/user/index') }}"><i class="fa fa-users"></i> User</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/user/change_many_status')}}">
        <div class="box">
            <div class="box-header" align="right">
                @permission('user-create')
                <a href="{{  url('/admin/user/create') }}" class="btn btn-primary">Create</a>
                @endpermission
                @permission('user-many-status')
                <input type="submit" value="Change Status" class="btn btn-primary">
                @endpermission
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(count($datas) > 0)
                    <div align="center" class="col-md-12 table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        @permission('user-many-status')
                        <th align="center">#</th>
                        @endpermission
                        <th align="center">User Name</th>
                        <th align="center">Role</th>
                        <th align="center">Email</th>
                        @permission('user-status')
                        <th align="center">Status</th>
                        @endpermission
                        <th align="center">Control</th>
                        @permission('user-password')
                        <th align="center">Reset Password</th>
                        @endpermission
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                        <tr>
                            <td align="center">
                                @foreach($data->role as $user_role)
                                    @if($user_role->slug == 'Develper'  && Auth::user()->role->first()->Develper =='Develper')
                                        <input type="checkbox" name="change_status[]"
                                               id="{{$data->slug}}" value="{{$data->slug}}">
                                    @elseif( $user_role->slug == 'Develper'  &&  Auth::user()->role->first()->slug !='Develper')
                                    @elseif( $data->slug == 'Develper'  )
                                    @elseif(Auth::user()->slug != $data->slug)
                                        <input type="checkbox" name="change_status[]"
                                               id="{{$data->slug}}" value="{{$data->slug}}">
                                    @endif
                                @endforeach
                            </td>
                            <td align="center">{{ $data->username }}</td>
                            <td align="center">
                                @foreach($data->role as $user_role)
                                    [{{ $user_role->name }}],
                                @endforeach
                            </td>
                            <td align="center">{{ $data->email }}</td>
                            @permission('user-status')
                            <td align="center">
                                @if($user_role->slug == 'Develper'  && Auth::user()->role->first()->Develper =='Develper')
                                    @if($data->status ==1)
                                        <a href="{{ url('/admin/user/change_status/'.$data->slug)}}"><i
                                                    class="btn btn-danger ace-icon fa fa-close"> Dactive</i></a>
                                    @elseif($data->status ==0)
                                        <a href="{{ url('/admin/user/change_status/'.$data->slug)}}"><i
                                                    class="btn btn-primary ace-icon fa fa-check-circle"> Active</i></a>
                                    @endif
                                @elseif( $user_role->slug == 'Develper'  &&  Auth::user()->role->first()->slug !='Develper')
                                    on permission to do this
                                @elseif( $data->slug == 'Develper'  )
                                    on permission to do this
                                @elseif(Auth::user()->slug != $data->slug)
                                    @if($data->status ==1)
                                        <a href="{{ url('/admin/user/change_status/'.$data->slug)}}"><i
                                                    class="btn btn-danger ace-icon fa fa-close"> Dactive</i></a>
                                    @elseif($data->status ==0)
                                        <a href="{{ url('/admin/user/change_status/'.$data->slug)}}"><i
                                                    class="btn btn-primary ace-icon fa fa-check-circle"> Active</i></a>
                                    @endif
                                @endif
                            </td>
                            @endpermission
                            <td align="center">
                                @if($user_role->slug == 'Develper'  && Auth::user()->role->first()->Develper =='Develper')
                                    @permission('user-edit')
                                    <a href="{{ url('/admin/user/edit/'.$data->slug)}}"><i
                                                class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                data-id=""> Edit</i></a>
                                    @endpermission
                                    @permission('user-delete')
                                    <button type="button" id="{{$data->slug}}" onclick="selectItem('{{$data->slug}}')" class="btn btn-sm btn-danger ace-icon fa fa-remove bigger-120  edit" data-toggle="modal" data-target="#modal-danger">
                                        Delete
                                    </button>
                                    @endpermission

                                @elseif( $user_role->slug == 'Develper'  &&  Auth::user()->role->first()->slug !='Develper')
                                    on permission to do this
                                @elseif( $data->slug == 'Develper'  )
                                    on permission to do this
                                @elseif(Auth::user()->slug != $data->slug)
                                    @permission('user-edit')
                                    <a href="{{ url('/admin/user/edit/'.$data->slug)}}"><i
                                                class="btn btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                data-id=""> Edit</i></a>
                                    @endpermission
                                    @permission('user-delete')
                                    <button type="button" id="{{$data->slug}}" onclick="selectItem('{{$data->slug}}')" class="btn btn-sm btn-danger ace-icon fa fa-remove bigger-120  edit" data-toggle="modal" data-target="#modal-danger">
                                        Delete
                                    </button>
                                    @endpermission
                                @endif
                            </td>
                            @permission('user-password')
                            <td>
                                @if($user_role->slug == 'Develper'  && Auth::user()->role->first()->Develper =='Develper')
                                    <a href="{{url('admin/user/change_password/'.$data->slug)}}"
                                       class="btn btn-success">Reset Password</a>
                                @elseif( $user_role->slug == 'Develper'  &&  Auth::user()->role->first()->slug !='Develper')
                                    on permission to do this
                                @elseif( $data->slug == 'Develper'  )
                                    on permission to do this
                                @elseif(Auth::user()->slug != $data->slug)
                                    <a href="{{url('admin/user/change_password/'.$data->slug)}}"
                                       class="btn btn-success"> Reset Password</a>
                                @endif
                            </td>
                            @endpermission
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        @permission('user-many-status')
                        <th align="center">#</th>
                        @endpermission
                        <th align="center">User Name</th>
                        <th align="center">Role</th>
                        <th align="center">Email</th>
                        @permission('user-status')
                        <th align="center">Status</th>
                        @endpermission
                        <th align="center">Control</th>
                        @permission('user-password')
                        <th align="center">Reset Password</th>
                        @endpermission
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
        </form>
    </section>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <form id="user_delete" action="" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <div class="modal-body">
                        <p>If you Delete it ,You will Delete Data in Permission & Role</p>
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
    {!! JsValidator::formRequest('Modules\ACl\Http\Requests\admin\User\UserStatusEditRequest','#status') !!}
    <script>
        function selectItem(slug) {
            $('#user_delete').attr('action', "destroy/"+slug);
        }
    </script>
@endsection