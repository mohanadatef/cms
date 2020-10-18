@extends('includes.admin.master_admin')
@section('title')
   Edit Item
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Item
            <small>Edit Item</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ url('/admin/item/index') }}"><i class="fa fa-permsissions"></i>Item</a></li>
            <li><a href="{{ url('/admin/item/edit/'.$data->slug) }}"><i class="fa fa-permsission"></i>Edit Item : {{$data->title_en }} / {{$data->title_ar}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit Item : {{$data->title_en }} / {{$data->title_ar}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="item_edit" action="{{url('admin/item/update/'.$data->slug)}}" enctype="multipart/form-data"  method="POST" >
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('product_id') ? ' has-error' : "" }}">
                        Product :  <select id="product_id" type="product_id" class="form-control{{ $errors->has('product_id') ? ' has-error' : "" }}" name="product_id"  >
                            @foreach($product as $key => $myproduct)
                                <option value="{{$key}}"  @if($data->product_id == $key)){ selected  } @else{   }@endif  > {{$myproduct}}</option>

                            @endforeach
                        </select>
                    </div>
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
                   <div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('description_en') ? ' has-error' : "" }}">
            Description English : <textarea type="text" id="description_en" class="form-control" name="description_en" placeholder="Enter You Description English">{{$data->description_en}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('description_ar') ? ' has-error' : "" }}">
            Description Arabic : <textarea type="text" id="description_ar" class="form-control" name="description_ar" placeholder="Enter You Description Arabic">{{$data->description_ar}}</textarea>
        </div>
    </div>
</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                                Price : <input type="text" id="price" value="{{$data->price}}"
                                               class="form-control" name="price" placeholder="Enter You Price">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
    Order : <input type="text" value="{{$data->order}}" class="form-control" name="order" id="order" placeholder="Enter You Order">
</div>
                        </div>
                    </div>

                    <div align="center">
                        <img src="{{url('public/images/item').'/'.$data->image}}" style="width:300px;height:300px;">
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
    {!! JsValidator::formRequest('Modules\CoreData\Http\Requests\admin\Item\ItemEditRequest','#item_edit') !!}
@endsection