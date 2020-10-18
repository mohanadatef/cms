@extends('includes.admin.master_admin')
@section('title')
    Index Contact US
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Contact US
            <small>All Contact US</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/contact_us/index') }}"><i class="fa fa-permissions"></i>Contact US</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/contact_us/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @permission('contact-us-create')
                    @if($datas->count() == 0)
                        <a href="{{  url('/admin/contact_us/create') }}" class="btn btn-primary">Create</a>
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
                                    <th align="center">Email</th>
                                    <th align="center">Address</th>
                                    <th align="center">Time Work</th>
                                    <th align="center">Phone </th>
                                    <th align="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">{{ $data->email }}</td>
                                        <td align="center">{{ $data->address_en }}</td>
                                        <td align="center">{{ $data->time_work_en }}</td>
                                        <td align="center">{{ $data->phone }}</td>
                                        <td align="center">
                                            @permission('contact-us-edit')
                                            <a href="{{ url('/admin/contact_us/edit/'.$data->slug)}}"><i class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit" data-id=""> Edit</i></a>
                                            @endpermission

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">Email</th>
                                    <th align="center">Address</th>
                                    <th align="center">Time Work</th>
                                    <th align="center">Phone </th>
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
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
@endsection