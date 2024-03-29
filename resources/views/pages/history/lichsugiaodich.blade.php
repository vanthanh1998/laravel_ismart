<!DOCTYPE html>
<html>
<head>
    <title>ISMART STORE</title>
    <link rel="icon" href="{!! asset('images/iSmart.png') !!}"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link href="{!! url('reset.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/carousel/owl.carousel.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/carousel/owl.theme.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/blog.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/fonts.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/footer.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/global.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/header.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/category_product.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('css/import/login.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('responsive_history.css') !!}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <link rel="stylesheet" href="{!! url('js/sweetalert/sweetalert2.min.css') !!}">
    <script src="{!! url('js/sweetalert/sweetalert2.all.min.js') !!}"></script>

    <script src="{!! url('js/jquery-2.2.4.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('toastr/toastr.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('js/elevatezoom-master/jquery.elevatezoom.js') !!}" type="text/javascript"></script>
    {{--        <script src="{!! url('js/bootstrap/bootstrap.min.js') !!}" type="text/javascript"></script>--}}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{!! url('js/carousel/owl.carousel.js') !!}" type="text/javascript"></script>
    <script src="{!! url('js/validateEngine/jquery.validationEngine.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('js/validateEngine/jquery.validationEngine-en.min.js') !!}" type="text/javascript"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>

</head>
<body>
@include('layout.header')
<style>
    /* Style for table */
    .table-customize {
        margin: 0;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 0 0 1px #ccc inset;
    }
    .table-customize > thead > tr {
        background-color: #535353;
        border-radius: 3px 3px 0 0;
    }
    .table-customize > thead > tr > th {
        color: #fff;
        border-bottom: none;
        padding: 10px 14px;
        font-size: 14px;
        font-weight: 400;
        border: 1px solid rgba(0, 0, 0, 0.2);
    }
    .table-customize > thead > tr > th:first-child {
        border-radius: 3px 0 0 0;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
    }
    .table-customize > thead > tr > th:last-child {
        border-radius: 0 3px 0 0;
    }
    .table-customize > tbody > tr > td {
        vertical-align: middle;
        padding: 15px 14px;
        color: #ccc;
        font-size: 14px;
        color: #000;
        border: 1px solid #ccc;
    }
    .table-customize > tbody > tr > td a {
        text-decoration: none;
    }

    .table-order > tbody > tr:nth-child(-n + 3) > td:first-child {
        position: relative;
        font-size: 10px;
        font-weight: 700;
    }
    .table-order > tbody > tr:nth-child(-n + 3) > td:first-child span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        top: 14px;
    }
    .table-order > tbody > tr td:first-child, .table-order > tbody > tr th:first-child {
        text-align: center;
    }
</style>
<div id="main-content-wp" class="clearfix blog-page"style="background: #f7f7f7;padding-top: 25px;padding-bottom: 75px;">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{!! url('/') !!}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Lịch sử giao dịch</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                @if(count($bill) != 0)
                    <table class="table table-bordered table-customize table-responsive">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ngày lập</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt = 0; ?>
                        @foreach($bill as $item)
                            <?php $stt++ ;?>
                            <tr>
                                <td>{!! $stt !!}</td>
                                <td>{!! $item['fullname'] !!}</td>
                                <td>{!! $item['email'] !!}</td>
                                <td>{!! $item['phone'] !!}</td>
                                <td>{!! $item['address'] !!}</td>
                                <td>{!! $item['created_at'] !!}</td>
                                <td>
                                    @if($item['status']== 0)
                                        <span class="btn btn-xs btn-info">Chờ duyệt</span>
                                    @elseif($item['status']== 1)
                                        <span class="btn btn-xs btn-warning">Đang vận chuyển</span>
                                    @elseif($item['status']== 2)
                                        <span class="btn btn-xs btn-success">Đã thanh toán</span>
                                    @elseif($item['status'] == -1)
                                        <span class="btn btn-xs btn-danger">Đã hủy</span>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ url('chitiethoadonkh/'.$item['id']) }}" class="tbody-text btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    @if($item['status'] == 0)
                                        <a href="{{ url('huydonhang/'.$item['id']) }}" id="remove_bill" data_id="{{$item['id']}}" class="tbody-text btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    @else
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Không có lịch sử giao dịch nào!</p>
                @endif
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
</body>
</html>
<script>
    {{--$(document).ready(function(){--}}
    {{--     $('#remove_bill').click(function(e){--}}
    {{--         e.preventDefault();--}}

    {{--         var id = $(this).attr('data_id');--}}
    {{--         alert(id);--}}
    {{--         // swal({--}}
    {{--         //     title: 'Bạn muốn hủy đơn hàng này!',--}}
    {{--         //         type: "question",--}}
    {{--         //         showCancelButton: true,--}}
    {{--         //         confirmButtonColor: '#3085d6',--}}
    {{--         //         cancelButtonColor: '#d33',--}}
    {{--         //         confirmButtonText: 'Yes'--}}
    {{--         //     }).then(function (e) {--}}
    {{--         //     if(e.value === true){--}}
    {{--                 $.ajax({--}}
    {{--                     url:'{{ url('huydonhang/'.Auth::user()->id) }}',--}}
    {{--                     type:'get',--}}
    {{--                     // data: {id,id},--}}
    {{--                     success:function(data){--}}
    {{--                         // console.log(data);--}}
    {{--                         if(data.error == false){--}}
    {{--                             --}}{{--swal({--}}
    {{--                             --}}{{--    title: "Thành công",--}}
    {{--                             --}}{{--    text: data.message,--}}
    {{--                             --}}{{--    type: "success",--}}
    {{--                             --}}{{--    timer: 2000--}}
    {{--                             --}}{{--}).then(function(){--}}
    {{--                             --}}{{--    location.href = '{{ url('lichsugiaodich/'.Auth::user()->id) }}';--}}
    {{--                             --}}{{--});--}}
    {{--                         }--}}
    {{--                     },--}}
    {{--                 });--}}
    {{--             // }else{--}}
    {{--             //     e.dismiss;--}}
    {{--             // }--}}
    {{--     });--}}
    {{--});--}}
</script>

