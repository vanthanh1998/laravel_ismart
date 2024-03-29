@extends('layout.index')
@section('content')
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{!! url('/') !!}" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            @if(Cart::count())
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $item)
                                <tr id="delele_no_reload_{!! $item->rowId !!}">
                                    <td><a href="{!! url('ctsp',[$item->id,$item->name]) !!}" target="_blank">{!! $item->id !!}</a></td>
                                    <td>
                                        <a href="" title="" class="thumb" style="display: inline-block;width: 100px;min-height: 100px;overflow: hidden;border: 1px solid #ccc;">
                                            <img src="{{asset('upload/product/'.$item->options->img)}}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{!! url('ctsp',[$item->id,$item->name]) !!}" title="" target="_blank" class="name-product">{!! $item->name !!}</a>
                                    </td>
                                    <td>
                                        <span id="price" name="price">{!! number_format($item->price,0,",",".") !!} đ</span>
                                    </td>
                                    <td>
                                        <input style="width: 100px;" type="number" min="1" max="{!! $item->options->qty_product !!}" name="num-order" value="{!! $item->qty !!}" onchange="updateCart(this.value,'{{$item->rowId}}')" class="num-order">
                                    </td>
                                    <td>{{number_format(($item->qty)*($item->price),0,',','.')}} đ</td>
                                    <td>
                                        {{--                                    <a href="{!! url('pages/cart/delete/'.$item->rowId) !!}" title="" onclick="return confirm_delete('Bạn có chắc chắn muốn xóa sản phẩm này!')" class="del-product"><i class="fa fa-trash-o"></i></a>--}}
                                        <a href="javascript:void(0)" class="del_product" data-id="{{ $item->rowId }}" title=""><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>{{Cart::subtotal(0,',','.')}} đ</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        @if(Auth::check())
                                            <div class="fl-right">
                                                <a href="{!! route('get.checkout') !!}" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        @else
                                            <div class="fl-right">
                                                <a href="{!! url('dang-nhap') !!}" title="" id="checkout-cart">Đăng nhập để thanh toán</a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <a href="{!! url('/') !!}" title="" id="buy-more">Mua tiếp</a><br/>
                        <a href="javascript:void(0)" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            @else
                <p>Không có sản phẩm nào trong giỏ hàng, click <a href="{!! url('/') !!}">vào đây</a> để quay lại trang chủ !</p>
            @endif
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.del_product').click(function(){
                var id = $(this).data('id');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function (e) {
                    if(e.value == true){
                        $.ajax({
                            url:'delete/'+id,
                            type:'delete',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:{id:id},
                            success:function(data){
                                if(data.success == true){
                                    // console.log(data);
                                    $('#delele_no_reload_'+id).remove();
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "success",
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            }
                        });
                    }else{
                        e.dismiss;
                    }

                });
            });

            $('#delete-cart').click(function(){
                // alert(id);
                $.ajax({
                    url:'delete_all_cart',
                    type:'delete',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(){
                        // $('#delele_no_reload_'+id).remove();
                        location.reload();
                    }
                });
            });
            {{--$('.num_order').change(function(){--}}
            {{--    var id = $(this).data('product');--}}
            {{--    var price = $('#price').html();--}}
            {{--    var qty = $(this).val();--}}
            {{--    $.ajax({--}}
            {{--        url:'{{url('pages/cart/update')}}',--}}
            {{--        type:'post',--}}
            {{--        dataType:'json',--}}
            {{--        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
            {{--        data:{rowId:id,price:price,qty:qty} ,--}}
            {{--        success:function(data){--}}
            {{--            console.log(data);--}}
            {{--        },--}}
            {{--    });--}}

            {{--});--}}
        });

        function updateCart(qty,rowId){
            $.ajax({
                url:'{{url('pages/cart/update')}}',
                type:'get',
                data:{
                    qty:qty,
                    rowId:rowId
                },
                success:function(data){
                    location.reload(true);
                }
            });
        }
    </script>
@stop
