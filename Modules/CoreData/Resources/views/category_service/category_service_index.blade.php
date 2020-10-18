@extends('includes.admin.master_admin')
@section('title')
    Index Category Service
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
            Category Service
            <small>All Category Service</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/category_service/index') }}"><i class="fa fa-permissions"></i>Category Service</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/category_service/change_many_status')}}">
        <div class="box">
            <div class="box-header" align="right">
                @permission('category-service-create')
                <a href="{{  url('/admin/category_service/create') }}" class="btn btn-primary">Create</a>
                @endpermission
                @permission('category-service-many-status')
                <input type="submit"  value="Change Status" class="btn btn-primary" >
                @endpermission
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(count($datas) > 0)
                    <div align="center" class="col-md-12 table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th align="center">#</th>
                            <th align="center">Title</th>
                            <th align="center">Service</th>
                            @permission('category-service-status')
                            <th align="center">Status</th>
                            @endpermission
                            <th align="center">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td align="center">
                                    <input type="checkbox"  name="change_status[]" id="{{$data->slug}}" value="{{$data->slug}}">
                                </td>
                                <td align="center">{{ $data->title_en }}</td>
                                <td align="center">{{ $data->service->title_en }}</td>
                                @permission('category-service-status')
                                <td align="center">
                                    @if($data->status ==1)
                                        <a href="{{ url('/admin/category_service/change_status/'.$data->slug)}}"><i
                                                    class="btn btn-danger ace-icon fa fa-close"> Dactive</i></a>
                                    @elseif($data->status ==0)
                                        <a href="{{ url('/admin/category_service/change_status/'.$data->slug)}}"><i
                                                    class="btn btn-primary ace-icon fa fa-check-circle"> Active</i></a>
                                    @endif
                                </td>
                                @endpermission
                                <td align="center">
                                    @permission('category-service-edit')
                                    <a href="{{ url('/admin/category_service/edit/'.$data->slug)}}"><i class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit" data-id=""> Edit</i></a>
                                    @endpermission
                                    @permission('category-service-delete')
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
                            <th align="center">#</th>
                            <th align="center">Title</th>
                            <th align="center">Service</th>
                            @permission('category-service-status')
                            <th align="center">Status</th>
                            @endpermission
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
                <form id="category_service_delete" action="" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <div class="modal-body">
                        <p>If you Delete it ,You will Delete Data in Service</p>
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
            $('#category_service_delete').attr('action', "destroy/"+slug);
        }
    </script>
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Category_Service\Category_ServiceStatusEditRequest','#status') !!}
@endsection