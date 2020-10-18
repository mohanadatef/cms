@extends('includes.admin.master_admin')
@section('title')
    Index About US
@endsection
@section('head_style')
    @include('includes.admin.header_datatable')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            About US
            <small>All About US</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/about_us/index') }}"><i class="fa fa-permissions"></i>About US</a></li>
        </ol>
    </section>
    <section class="content">
        <form method="get" action="{{ url('/admin/about_us/change_many_status')}}">
            <div class="box">
                <div class="box-header" align="right">
                    @permission('about-us-create')
                    @if($datas->count() == 0)
                    <a href="{{  url('/admin/about_us/create') }}" class="btn btn-primary">Create</a>
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
                                    <th align="center">Title</th>
                                    <th align="center">Description</th>
                                    <th align="center">Image</th>
                                    <th align="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td align="center">{{ $data->title_en }}</td>
                                        <td align="center">{!! $data->description_en !!}</td>
                                        <td align="center"><img src="{{ asset('public/images/about_us/' . $data->image ) }}" style="width:100px;height: 100px"></td>
                                        <td align="center">
                                            @permission('about-us-edit')
                                            <a href="{{ url('/admin/about_us/edit/'.$data->slug)}}"><i class="btn btn-sm btn-primary ace-icon fa fa-edit bigger-120  edit" data-id=""> Edit</i></a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th align="center">Title</th>
                                    <th align="center">Description</th>
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
        </form>
    </section>
@endsection
@section('script_style')
    @include('includes.admin.scripts_datatable')
@endsection