@extends('layout.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">{{$category_name['name']}}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('home')}}">Home</a> / <span>Category</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($category as $item)
                            <li><a href={{route('category', $item['id'])}}">{{$item['name']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($cate_pro)}} Product</p>
                                <div class="clearfix"></div>
                            </div>


                            <div class="row">
                                @foreach($cate_pro as $item)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($item['promotion_price'] != $item['unit-price'])
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product', $item['id'])}}"><img src="source/image/product/{{$item['image']}}" alt=""height="250px"></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$item['name']}}</p>
                                            <p class="single-item-price">
                                                @if($item['promotion_price'] != $item['unit-price'])
                                                    <span class="flash-del">{{number_format($item['unit_price'])}} vnđ</span>
                                                    <span class="flash-sale">{{number_format($item['promotion_price'])}} vnđ</span>
                                                @else
                                                    <span>{{number_format($item['unit_price'])}} vnđ</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('add-to-cart', $item['id'])}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('product', $item['id'])}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="space50">&nbsp;</div>

                            <div class="beta-products-list">
                                <h4>Other Product</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left">Tìm thấy {{count($product_other)}} Product</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    @foreach($product_other as $item)
                                        <div class="col-sm-4">
                                            <div class="single-item">
                                                @if($item['promotion_price'] != $item['unit-price'])
                                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                @endif
                                                <div class="single-item-header">
                                                    <a href="product.html"><img src="source/image/product/{{$item['image']}}" alt="" height="250px"></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$item['name']}}</p>
                                                    <p class="single-item-price" style="font-size: 18px">
                                                        @if($item['promotion_price'] != $item['unit-price'])
                                                            <span class="flash-del">{{number_format($item['unit_price'])}} vnđ</span>
                                                            <span class="flash-sale">{{number_format($item['promotion_price'])}} vnđ</span>
                                                        @else
                                                            <span>{{number_format($item['unit_price'])}} vnđ</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">{{$product_other->links()}}</div>
                                <div class="space40">&nbsp;</div>


                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
