@extends('includes.admin.master_admin')
@section('title')
    Edit Service
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Service
            <small>Edit Service</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/service/index') }}"><i class="fa fa-permsissions"></i>Service</a></li>
            <li><a href="{{ url('/admin/service/edit/'.$data->slug) }}"><i class="fa fa-permsission"></i>Edit Service: {{$data->title_en }} / {{$data->title_ar}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Service: {{$data->title_en }} / {{$data->title_ar}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="service_edit" action="{{url('admin/service/update/'.$data->slug)}}"  method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('title_en') ? ' has-error' : "" }}">
            Title English : <input type="text" id="title_en" value="{{$data->title_en}}"
                                   class="form-control" name="title_en" placeholder="Enter You Title English">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('title_ar') ? ' has-error' : "" }}">
            Title Arabic : <input type="text" id="title_ar" value="{{$data->title_ar}}"
                                  class="form-control" name="title_ar" placeholder="Enter You Title Arabic">
        </div>
    </div>
</div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
    Order : <input type="text" value="{{$data->order}}" class="form-control" name="order" id="order" placeholder="Enter You Order">
</div>
        <div align="center">
    <input type="submit" class="btn btn-primary" value="Edit">
</div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Service\ServiceEditRequest','#service_create') !!}
@endsection