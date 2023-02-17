@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    @foreach($detail as $item)
                    <li>
                        <a href="" title="">{!! isset($item['cate_post']['name']) ? $item['cate_post']['name'] : '' !!}</a>
                    </li>
                    <li>
                        <a href="" title="">{!! $item['post_name'] !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            @foreach($detail as $item)
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">{!! $item['post_name'] !!}</h3>
                </div>
                <div class="section-detail">
                    <span class="create-date">{!! $item['created_at'] !!}</span>
                    <div class="detail">
                        <p><strong>{!! $item['desc'] !!}</strong></p>
                        <p>{!! $item['content'] !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
{{--                     <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
                    <div class="fb-comments" data-href="http://localhost:9000/ismart.com/ismart.com/?page=home" data-width="100%" data-numposts="5"></div> --}}
                </div>
            </div>
        </div>
        @include('layout.sidebar_blog')
    </div>
</div>
@endsection