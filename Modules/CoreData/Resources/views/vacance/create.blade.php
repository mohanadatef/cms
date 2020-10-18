@extends('includes.admin.master_admin')
@section('title')
    Create Vacance
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Vacance
            <small>Create Vacance</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/vacance/index') }}"><i class="fa fa-permsissions"></i>Vacance</a></li>
            <li><a href="{{ url('/admin/vacance/create') }}"><i class="fa fa-permsission"></i>Create Vacance</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Vacance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form  id ='vacance_create'  action="{{url('admin/vacance/store')}}" enctype="multipart/form-data"  method="POST" >
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
                    <div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('description_en') ? ' has-error' : "" }}">
            Description English : <textarea type="text"  class="form-control" placeholder="Enter You Description Arabic" name="description_en">{{Request::old('description_en')}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('description_ar') ? ' has-error' : "" }}">
            Description Arabic : <textarea type="text"  class="form-control" placeholder="Enter You Description Arabic" name="description_ar">{{Request::old('description_ar')}}</textarea>
        </div>
    </div>
</div>
                  <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
    Order : <input type="text" value="{{Request::old('order')}}" class="form-control" id="order" name="order" placeholder="Enter You Order">
</div>
                 <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
    <table class="table">
        <tr>
            <td width="40%" align="right"><label>Select File for Upload</label></td>
            <td width="30"><input type="file" value="{{Request::old('image')}}" name="image" /></td>
        </tr>
        <tr>
            <td width="40%" align="right"></td>
            <td width="30"><span class="text-muted">jpg, png, gif</span></td>
        </tr>
    </table>
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
  <script>
    CKEDITOR.replace( 'description_en');
</script>
<script>
    CKEDITOR.replace( 'description_ar');
</script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 200,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample styleselect fontselect fontsizeselect',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>
@yield('script_description_language')
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Vacance\VacanceCreateRequest','#vacance_create') !!}
@endsection