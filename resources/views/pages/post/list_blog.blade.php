@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($post as $item)
                        <li class="clearfix">
                            <a href="{!! url('chi-tiet-bai-viet',[$item['id'],$item['alias']]) !!}" title="" class="thumb fl-left">
                                <img src="{{ asset('resources/upload/post/'.$item['image']) }}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">{!! $item['desc'] !!}</a>
                                <span class="create-date">{!! $item['created_at'] !!}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul class="list-item clearfix">
                        {{-- {{ $post->appends(Request::all())->links() }} --}}
                        @if($post->currentPage() != 1)
                            <li>
                                <a href="{!! $post->url($post->currentPage() - 1) !!}" title="">Trước</a>
                            </li>
                        @endif
                            @for($i = 1; $i <= $post->lastPage(); $i++)
                            <li class="{!! ($post->currentPage() == $i) ? 'active' :null !!}">
                                <a href="{!! $post->url($i) !!}" title="">{!! $i !!}</a>
                            </li>
                            @endfor
                        @if($post->currentPage() != $post->lastPage())
                            <li>
                                <a href="{!! $post->url($post->currentPage() + 1) !!}" title="">Sau</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @include('layout.sidebar_blog')
    </div>
</div>
@endsection