@extends('includes.admin.master_admin')
@section('title')
    Create Product
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Product
            <small>Create Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/product/index') }}"><i class="fa fa-permsissions"></i>Product</a></li>
            <li><a href="{{ url('/admin/product/create') }}"><i class="fa fa-permsission"></i>Create Product</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  id ='product_create'  action="{{url('admin/product/store')}}"  method="POST" >
                    {{csrf_field()}}
                    <div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('title_en') ? ' has-error' : "" }}">
            Title English : <input type="text" value="{{Request::old('title_en')}}"  class="form-control"
                                   name="title_en"  placeholder="Enter You Title English">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('title_ar') ? ' has-error' : "" }}">
            Title Arabic : <input type="text" value="{{Request::old('title_ar')}}"  class="form-control"
                                  name="title_ar"  placeholder="Enter You Title Arabic">
        </div>
    </div>
</div>
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
    Order : <input type="text" value="{{Request::old('order')}}" class="form-control" id="order" name="order" placeholder="Enter You Order">
</div>
                  <div align="center">
    <input type="submit" class="btn btn-primary" value="Create">
</div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script_style')
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Product\ProductCreateRequest','#product_create') !!}
@endsection