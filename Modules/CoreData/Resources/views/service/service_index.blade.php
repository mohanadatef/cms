@extends('includes.admin.master_admin')
@section('title')
    Index Service
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
            Service
            <small>All Service</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/service/index') }}"><i class="fa fa-permissions"></i>Service</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/service/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @permission('service-create')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                        Create
                    </button>
                    @endpermission
                    @permission('service-many-status')
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
                                    <th align="center">#</th>
                                    <th align="center">Title</th>
                                    @permission('service-status')
                                    <th align="center">Status</th>
                                    @endpermission
                                    <th align="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">
                                            <input type="checkbox" name="change_status[]" id="{{$data->slug}}"
                                                   value="{{$data->slug}}">
                                        </td>
                                        <td align="center">{{ $data->title_en }}</td>
                                        @permission('service-status')
                                        <td align="center">
                                            @if($data->status ==1)
                                                <a href="{{ url('/admin/service/change_status/'.$data->slug)}}"><i
                                                            class="btn btn-danger ace-icon fa fa-close"> Dactive</i></a>
                                            @elseif($data->status ==0)
                                                <a href="{{ url('/admin/service/change_status/'.$data->slug)}}"><i
                                                            class="btn btn-primary ace-icon fa fa-check-circle">
                                                        Active</i></a>
                                            @endif
                                        </td>
                                        @endpermission
                                        <td align="center">
                                            @permission('service-edit')
                                            <button type="button" id="{{$data->slug}}"
                                                    onclick="selectItem('{{$data->slug}}','{{$data->title_en}}','{{$data->title_ar}}','{{$data->order}}')"
                                                    class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit"
                                                    data-toggle="modal"
                                                    data-target="#modal-edit">
                                                Edit
                                            </button>
                                            @endpermission
                                            @permission('service-delete')
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
                                    @permission('service-status')
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
    <div class="modal modal-info fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <section class="content-header">
                        <h1>
                          Service Create
                        </h1>
                    </section>
                </div>
                <form id='service_create' action="" method="POST">
                    <div class="modal-body">

                        <h3 align="center">Service Create</h3>
                        <section class="content">
                            {{csrf_field()}}

                                    <div class="form-group{{ $errors->has('title_en') ? ' has-error' : "" }}">
                                        Title English : <input type="text" value="{{Request::old('title_en')}}"  class="form-control"
                                                               name="title_en"  placeholder="Enter You Title English">
                                    </div>

                                    <div class="form-group{{ $errors->has('title_ar') ? ' has-error' : "" }}">
                                        Title Arabic : <input type="text" value="{{Request::old('title_ar')}}"  class="form-control"
                                                              name="title_ar"  placeholder="Enter You Title Arabic">
                                    </div>

                            <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                                Order : <input type="text" value="{{Request::old('order')}}" class="form-control"  name="order" placeholder="Enter You Order">
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Create</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @if(count($datas) != null)
    <div class="modal modal-info fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                    <section class="content-header">
                        <h1>
                            Service Edit
                        </h1>
                    </section>
                </div>
                <form id="service_edit" action="" method="POST">
                    <div class="modal-body">
                        <h3 align="center">Service Edit</h3>
                        <section class="content">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                                    <div class="form-group{{ $errors->has('title_en') ? ' has-error' : "" }}">
                                        Title English : <input type="text" id="title_en" value="{{$data->title_en}}"
                                                               class="form-control" name="title_en" placeholder="Enter You Title English">
                                    </div>
                                    <div class="form-group{{ $errors->has('title_ar') ? ' has-error' : "" }}">
                                        Title Arabic : <input type="text" id="title_ar" value="{{$data->title_ar}}"
                                                              class="form-control" name="title_ar" placeholder="Enter You Title Arabic">
                                    </div>

                            <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                                Order : <input type="text" value="{{$data->order}}" class="form-control" name="order" id="order" placeholder="Enter You Order">
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Edit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endif
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <form id="service_delete" action="" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                <div class="modal-body">
                    <p>If you Delete it ,You will Delete Data in Category service</p>
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
    <!-- /.modal -->
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
    <script>
        $('#service_create').attr('action', "store");
        function selectItem(slug, title_en, title_ar, order) {
            $('#service_edit').attr('action', "update/" + slug);
            $('#title_en').val(title_en);
            $('#title_ar').val(title_ar);
            $('#order').val(order);
            $('#service_delete').attr('action', "destroy/"+slug);
        }
    </script>
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Service\ServiceCreateRequest','#service_create') !!}
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Service\ServiceEditRequest','#service_edit') !!}
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Service\ServiceStatusEditRequest','#status') !!}
@endsection