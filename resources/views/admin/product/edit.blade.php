@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.product') }}"> Product</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="sltcate_detail">Loại sản phẩm</label>
                                    <select class="form-control" name="sltcate_detail" id="sltcate_detail">
                                        @foreach($cate_detail as $item)
                                            @if($product['cate_product_detail_id'] == $item['id'])
                                                <option value="{!! $item['id'] !!}" selected="selected">{!! $item['name'] !!}</option>
                                            @else
                                                <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product-name">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="{!! old('product_name'),isset($product) ? $product['product_name'] :null !!}" name="product_name" id="product-name">
                                    <span class="error">{!! $errors->first('product_name') !!}</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" name="fimage" id="exampleInputFile">
                                    <input type="hidden" name="img_current" value="{!! $product['image'] !!}">
                                    <span class="error">{!! $errors->first('fimage') !!}</span>
                                </div>
                                <div class="form-group">
                                    <img style="width: 100px;height: auto;" src="{{ asset('upload/product/'.$product['image']) }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Mô tả ngắn</label>
                                    <textarea name="desc" id="desc" class="ckeditor">{!! old('desc'),isset($product) ? $product['product_desc'] :null !!}</textarea>
                                    <span class="error">{!! $errors->first('desc') !!}</span>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="content" class="ckeditor">{!! old('content'),isset($product) ? $product['product_content'] :null !!}</textarea>
                                    <span class="error">{!! $errors->first('content') !!}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price_new">Giá mới</label>
                                    <input type="text" class="form-control" value="{!! old('price_new'),isset($product) ? $product['price_new'] :null !!}" name="price_new" id="price_new">
                                    <span class="error">{!! $errors->first('price_new') !!}</span>
                                </div>
                                <div class="form-group">
                                    <label for="price_old">Giá cũ</label>
                                    <input type="text" class="form-control" value="{!! old('price_old'),isset($product) ? $product['price_old'] :null !!}" name="price_old" id="price_old">
                                    <span class="error">{!! $errors->first('price_old') !!}</span>
                                </div>
                                <div class="form-group list_image">
                                    <label>Hình chi tiết</label>
                                    <div id="uploadFile">
                                        @foreach($list_image as $key => $item)
                                            <div class="form-group" id="{!! $key !!}">
                                                <img style="width: 100px; height: 100px;" src="{!! asset('upload/product_detail/'.$item['image']) !!}" idHinh = "{!! $item['id'] !!}" id="{!! $key !!}">
                                                <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                                            </div>
                                        @endforeach
                                            <input type="file" name="list_fImages[]" multiple>
{{--                                        <button style="margin-top:10px" type="button" id="addImages" class="btn btn-primary" >Add images</button>--}}
{{--                                        <div id="insert">--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="qty_product">Số lượng tồn kho</label>
                                    <input type="text" class="form-control" value="{!! old('qty_product'),isset($product) ? $product['qty_product'] :null !!}" name="qty_product" id="qty_product">
                                    <span class="error">{!! $errors->first('qty_product') !!}</span>
                                </div>
                                <div class="form-group">
                                    <label for="selling_product">Sản phẩm bán chạy</label>
                                    <select class="form-control" name="selling_product" id="selling_product">
                                        <option @if($product['selling_product']== 'Bình thường')
                                                {!! "selected = selected" !!} @endif
                                                value="Bình thường">Bình thường
                                        </option>
                                        <option @if($product['selling_product']== 'Bán chạy')
                                                {!! "selected = selected" !!} @endif
                                                value="Bán chạy">Bán chạy</option>
                                    </select>
                                    <span class="error">{!! $errors->first('selling_product') !!}</span>
                                </div>
                                <div class="form-group">
                                    <label for="featured_product">Sản phẩm nổi bật</label>
                                    <select class="form-control" name="featured_product" id="featured_product">
                                        <option @if($product['featured_product']== 'Bình thường')
                                                {!! "selected = selected" !!} @endif
                                                value="Bình thường">Bình thường
                                        </option>
                                        <option @if($product['featured_product']== 'Nổi bật')
                                                {!! "selected = selected" !!} @endif
                                                value="Nổi bật">Nổi bật</option>
                                    </select>
                                    <span class="error">{!! $errors->first('featured_product') !!}</span>
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button style="margin-left: 30px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
