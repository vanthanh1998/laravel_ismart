<div>
	<h3>Thông tin khách hàng</h3>
	 <p>
		<strong class="info">Khách hàng: </strong>
		{{$data['fullname']}}
	</p>
	<p>
		<strong class="info">Email: </strong>
		{{$data['email']}}
	</p>
	<p>
		<strong class="info">Điện Thoại</strong>
		{{$data['phone']}}
	</p>
	<p>
		<strong class="info">Địa chỉ</strong>
		{{$data['address']}}
	</p>
	<p>
		<strong class="info">Ghi chú</strong>
		{{$data['note']}}
	</p>

</div>
    <div class="form-group">
       <table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="#ffcccc" style="text-align:center;">
       	<thead>
       		<tr>
                <th></th>
			    <th>Tên sản phẩm</th>
			    <th>Đơn giá</th>
			    <th>Số lượng</th>
			    <th>Thành tiền</th>
			</tr>
       	</thead>
       	@if(!empty(Cart::content()))
       		<?php
               $cart = Cart::content();
               $i = 1;
             ?>

	        @foreach($cart as $item)
	        <tbody>
	            <tr>
                    <td>{{$i++}}</td>
	                <td>{{$item->name}}</td>
	                <td>{{number_format($item->price)}} đ</td>
	                <td>{{$item->qty}}</td>
	                <td>{{number_format($item->qty * $item->price) }} đ</td>
	            </tr>
	        </tbody>
	        @endforeach
        @endif
            <td><strong>Tổng tiền: </strong></td>
            <td colspan="4" class="text-right"><strong>{{Cart::subtotal(0,',','.')}} đ</strong></td>
        </tr>
    </table>
</div>
