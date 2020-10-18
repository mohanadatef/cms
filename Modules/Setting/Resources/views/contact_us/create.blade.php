@extends('includes.admin.master_admin')
@section('title')
    Create Contact US
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Contact US
            <small>Create Contact US</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/contact_us/index') }}"><i class="fa fa-permsissions"></i>Contact US</a></li>
            <li><a href="{{ url('/admin/contact_us/create') }}"><i class="fa fa-permsission"></i>Create Contact US</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Contact US</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  id ='contact_us_create'  action="{{url('admin/contact_us/store')}}"  method="POST" >
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                                Email : <input type="text" value="{{Request::old('email')}}" class="form-control"
                                               name="email" placeholder="Enter You Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                                Phone : <input type="text" value="{{Request::old('phone')}}"
                                               class="form-control" name="phone" placeholder="Enter You Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address_en') ? ' has-error' : "" }}">
                                Address English : <input type="text" value="{{Request::old('address_en')}}"
                                                         class="form-control" name="address_en" placeholder="Enter You Address English">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address_ar') ? ' has-error' : "" }}">
                                Address Arabic : <input type="text" value="{{Request::old('address_ar')}}"
                                                        class="form-control" name="address_ar" placeholder="Enter You Address Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_work_en') ? ' has-error' : "" }}">
                                Time Work English : <input type="text" value="{{Request::old('time_work_en')}}"
                                                           class="form-control" name="time_work_en" placeholder="Enter You Time Work English">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('time_work_ar') ? ' has-error' : "" }}">
                                Time Work Arabic : <input type="text" value="{{Request::old('time_work_ar')}}"
                                                          class="form-control" name="time_work_ar" placeholder="Enter You Time Work Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('latitude') ? ' has-error' : "" }}">
                                Latitude : <input type="text" value="{{Request::old('latitude')}}"
                                                  class="form-control" name="latitude" placeholder="Enter You Latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('longitude') ? ' has-error' : "" }}">
                                Longitude : <input type="text" value="{{Request::old('longitude')}}"
                                                   class="form-control" name="longitude" placeholder="Enter You Longitude">
                            </div>
                        </div>
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
    {!! JsValidator::formRequest('Modules\Setting\Http\Requests\admin\Contact_Us\Contact_UsCreateRequest','#contact_us_create') !!}
@endsection