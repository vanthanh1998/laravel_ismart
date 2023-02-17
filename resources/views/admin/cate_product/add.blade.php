@extends('admin.layouts.master')
@section('content')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.layouts.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        @csrf
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="txtcatename" value="{!! old('txtcatename') !!}" id="title">
                        <p class="error">{!! $errors->first('txtcatename') !!}</p>
                        <label for="desc">Keyword</label>
                        <input type="text" value="{!! old('txtkeyword') !!}" name="txtkeyword">
                        <button type="submit"  name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection