@extends('includes.admin.master_admin')
@section('title')
    Index Setting
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Setting
            <small>All Setting</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/setting/index') }}"><i class="fa fa-permissions"></i>Setting</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/setting/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @permission('setting-create')
                    @if($datas->count() == 0)
                        <a href="{{  url('/admin/setting/create') }}" class="btn btn-primary">Create</a>
                    @endif
                    @endpermission
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if(count($datas) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="center">Title</th>
                                    <th class="center">Facebook</th>
                                    <th class="center">Youtube</th>
                                    <th class="center">Twitter</th>
                                    <th class="center">Image</th>
                                    <th class="center">Logo</th>
                                    <th class="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="center">{{ $data->title_en }}</td>
                                        <td class="center">{{ $data->facebook }}</td>
                                        <td class="center">{{ $data->youtube }}</td>
                                        <td class="center">{{ $data->twitter }}</td>
                                        <td class="center"><img src="{{ asset('public/images/setting/' . $data->image ) }}" style="width:100px;height: 100px"></td>
                                        <td class="center"><img src="{{ asset('public/images/setting/' . $data->logo ) }}" style="width:100px;height: 100px"></td>
                                        <td class="center">
                                            @permission('setting-edit')
                                            <a href="{{ url('/admin/setting/edit/'.$data->slug)}}"><i class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit" data-id=""> Edit</i></a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="center">Title</th>
                                    <th class="center">Facebook</th>
                                    <th class="center">Youtube</th>
                                    <th class="center">Twitter</th>
                                    <th class="center">Image</th>
                                    <th class="center">Logo</th>
                                    <th class="center">Control</th>
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
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
@endsection