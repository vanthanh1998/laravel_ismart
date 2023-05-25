<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">ISMART</h3>
                <p class="desc">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">Thông tin cửa hàng</h3>
                <ul class="list-item">
                    <li>
                        <p>187 - Nguyễn Xí - Q.Bình Thạnh - HCM</p>
                    </li>
                    <li>
                        <p>0972.545.449 - 034.685.6565</p>
                    </li>
                    <li>
                        <p>thanhchonthanh@gmail.com</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">Chính sách mua hàng</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">Quy định - chính sách</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách bảo hành - đổi trả</a>
                    </li>
                    <li>
                        <a href="" title="">Chính sách hội viện</a>
                    </li>
                    <li>
                        <a href="" title="">Giao hàng - lắp đặt</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">Bảng tin</h3>
                <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                <div id="form-reg">
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">© Tống Văn Thanh | Trường Cao Đẳng Kỹ Thuật Cao Thắng</p>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    @if(Auth::check())
        <span class="logo">Hello! <strong>{{Auth::User()->fullname}}</strong></span>
    @else
        <span class="logo">ISMART</span>
    @endif
    <div id="menu-respon-wp">
        <?php
            $cate_product = DB::table('cate_product')->select('*')->get()->toArray();
        ?>
        <ul class="" id="main-menu-respon">
            @foreach($cate_product as $item)
            <li>
                <a href="#" title>{!! $item->name !!}</a>
                <ul class="sub-menu">
                    <?php
                        $cate_product_detail = DB::table('cate_product_detail')->where('parent_id',$item->id)->where('status',1)->get()->toArray();
                    ?>
                    @foreach($cate_product_detail as $product_detail)
                    <li>
                        <a href="{!! url('loaisanpham',[$product_detail->id,$product_detail->alias]) !!}" title="">{!! $product_detail->name !!}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            <li>
                <a href="{!! route('get.blog') !!}" title="">Blog</a>
            </li>
            <li>
                <a href="{!! route('get.gioithieu') !!}" title="">Giới thiệu</a>
            </li>
            <li>
                <a href="{!! url('lien-he-mobile') !!}" title="">Liên hệ</a>
            </li>
            @if(Auth::check())
                <li>
                    <a href="{!! url('thong-tin-ca-nhan/'.Auth::user()['id']) !!}" title="Thông tin cá nhân">Thông tin tài khoản</a>
                </li>
                <li>
                    <a href="{{url('lichsugiaodich/'.Auth::user()['id'])}}">Lịch sử giao dịch</a>
                </li>
                <li>
                    <a class="logout" href="{{ url('dang-xuat') }}" title="">Đăng xuất</a>
                </li>
            </div>
            @else
            <li>
                <a href="{{ url('dang-nhap') }}" title="">Đăng nhập</a>
            </li>
            <li>
                <a href="{{ url('dang-ky') }}" title="">Đăng ký</a>
            </li>
            @endif
        </ul>
    </div>
</div>
<div id="btn-top"><img src="{!! url('images/icon-top-page.png') !!}" alt=""/></div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    $(document).ready(function(){
        $('#contact_form_modal').click(function(e){
            e.preventDefault();
            $('#form-contact-modal').modal('show');
            $('#form_contact').click(function(){
                $.ajax({
                    url:'{{route('post.lien-he')}}',
                    type:'post',
                    dataType:'json',
                    data: $(this).serialize(),
                    success:function(data){
                        console.log(data);
                        if(data.error == true){
                            $('.error').hide();
                            if(data.message.name_contact != undefined){
                                $('.name_contact_error').show().html(data.message.name_contact);
                            }
                            if(data.message.email_contact != undefined){
                                $('.email_contact_error').show().html(data.message.email_contact);
                            }
                            if(data.message.message != undefined){
                                $('.email_message').show().html(data.message.message);
                            }
                        }else{
                            swal({
                                title: "Thành công",
                                text: data.message,
                                type: "success",
                                timer: 2000
                            }).then(function() {
                                window.location = "/";
                            });
                            // alert('Liên hệ thành công vui lòng chờ phản hồi !');
                            // window.location.href = "trang-chu";
                        }
                    }
                });
            });
        });

        // $('.logout_header').click(function(e){
        //     e.preventDefault();
        //     swal({
        //         title: 'Bạn muốn đăng xuất?',
        //         type: "question",
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes'
        //     }).then(function (e) {
        //         if(e.value === true){
        //             $.ajax({
        //                 url:'dang-xuat',
        //                 type:'get',
        //                 data:$(this).serialize(),
        //                 success:function(data){
        //                     if(data.success == true){
        //                         swal({
        //                             title: "Thành công",
        //                             text: data.message,
        //                             type: "success",
        //                             timer: 2000
        //                         }).then(function(){
        //                             location.href = 'dang-nhap';
        //                         });
        //                     }
        //                 },
        //             });
        //         }else{
        //             e.dismiss;
        //         }
        //     });
        // });

    });
</script>

{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        $('#s').keyup(function(e){--}}
{{--            e.preventDefault();--}}
{{--            // alert('oke');--}}
{{--            var keyword = $(this).val();--}}
{{--            if(keyword != ''){--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--                $.ajax({--}}
{{--                    url:'{{ url('search') }}',--}}
{{--                    type:'get',--}}
{{--                    data:{--}}
{{--                        keyword:keyword,--}}
{{--                    },--}}
{{--                    success:function (data) {--}}
{{--                        console.log(data);--}}
{{--                        // $('#list-search').fadeIn();--}}
{{--                        // $('#list-search').html(data);--}}

{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
