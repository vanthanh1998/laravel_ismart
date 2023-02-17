<div class="sidebar fl-left">
        <style type="text/css">
        a.active{
            color:red;
        }
    </style>
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail" style="text-transform: capitalize;">
                    <?php
                        $cate_product = DB::table('cate_product')->select('*')->where('status',1)->get()->toArray();
                    ?>
                    @foreach($cate_product as $item)
                    <ul class="list-item">
                        <li>
                            <a href="#" title="">{!! $item->name !!}</a>
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
                    </ul>
                    @endforeach
                    {{-- @endif --}}
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <tbody>
                                <ul class="price-filter-link">
                                    <li><strong>Chọn mức giá: </strong></li>
                                    <li><a class="{{Request::get('price') == 1 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '1'])}}">Dưới 5.000.000&nbsp;₫</a></li>
                                    <li><a class="{{Request::get('price') == 2 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '2'])}}">Từ 5 triệu - 10 triệu</a></li>
                                    <li><a class="{{Request::get('price') == 3 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '3'])}}">Từ 10 triệu - 15 triệu</a></li>
                                    <li><a class="{{Request::get('price') == 4 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '4'])}}">Từ 15 triệu - 20 triệu</a></li>
                                    <li><a class="{{Request::get('price') == 5 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '5'])}}">Trên 20.000.000&nbsp;₫</a></li>
                                </ul>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>