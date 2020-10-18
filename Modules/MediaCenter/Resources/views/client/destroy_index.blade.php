@extends('includes.admin.master_admin')
@section('title')
    Index Client Delete
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
            Client
            <small>All Client Delete</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/client/index/delete') }}"><i class="fa fa-permissions"></i>Client Delete</a></li>
        </ol>
    </section>
    <section class="content">
            <div class="box">
                <div class="box-header" align="right">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th align="center">Title</th>
                                    <th align="center">Number</th>
                                    <th align="center">Image</th>
                                    <th align="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">{{ $datas->title_en }}</td>
                                        <td align="center">{!! $datas->number !!}</td>
                                        <td align="center"><img src="{{ asset('public/images/client/' . $datas->image ) }}" style="width:100px;height: 100px"></td>
                                        @permission('client-restore')
                                        <td align="center">
                                            <button type="button" id="{{$data->slug}}" onclick="selectItem('{{$data->slug}}')" class="btn btn-sm btn-success ace-icon fa fa-refresh bigger-120  edit" data-toggle="modal" data-target="#modal-warning">
                                                Restore
                                            </button>
                                        </td>
                                        @endpermission
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">Title</th>
                                    <th align="center">Number</th>
                                    <th align="center">Image</th>
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
    <div class="modal modal-warning fade" id="modal-warning">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Restore</h4>
                </div>
                <form id="client_restore" action="" >
                    <div class="modal-body">
                        <p>You Restore it</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Restore</button>
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
            $('#client_restore').attr('action', "../restore/"+slug);
        }
    </script>
@endsection