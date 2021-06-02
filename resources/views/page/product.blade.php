@extends('layout.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h2 class="inner-title">Product {{$product['name']}}</h2>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('home')}}">Home</a> / <span>Product</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="source/image/product/{{$product['image']}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <h3 class="single-item-title">{{$product['name']}}</h3>
                                <p class="single-item-price">
                                <p class="single-item-price">
                                    @if($product['unit_price']== $product['promotion_price'])
                                        <span class="flash-sale">{{number_format($product['promotion_price'])}} vnđ</span>
                                    @else
                                        <span class="flash-del">{{number_format($product['unit_price'])}} vnđ</span>
                                        <span class="flash-sale">{{number_format($product['promotion_price'])}} vnđ</span>
                                    @endif
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{$product['description']}}</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Options:</p>
                            <div class="single-item-options">
                                <select class="wc-select" name="color">
                                    <option>Quantity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Description</a></li>
                            <li><a href="#tab-reviews">Reviews (0)</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                            <p>{{$product['description']}}</p>
                        </div>
                        <div class="panel" id="tab-reviews">
                            <p>No Reviews</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Related Products</h4>

                        <div class="row">
                                @foreach($product_other as $item)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            @if($item['promotion_price'] != $item['unit-price'])
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="product.html"><img src="source/image/product/{{$item['image']}}" alt="" height="150px"></a>
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
                                                <a class="add-to-cart pull-left" href="{{route('add-to-cart', $item->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('product', $item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{$product_similar->links()}}</div>
                        </div> <!-- .beta-products-list -->
                    </div>
                    <div class="col-sm-3 aside">
                        <div class="widget">
                            <h3 class="widget-title">Similar Product</h3>
                            <div class="widget-body">
                                <div class="beta-sales beta-lists">
                                    @foreach($product_similar as $item)
                                    <div class="media beta-sales-item">
                                        <a class="pull-left" href="{{route('product', $item->id)}}"><img src="source/image/product/{{$item['image']}}" alt=""></a>
                                        <div class="media-body">
                                            <p>{{$item->name}}</p>
                                            <span class="beta-sales-price">{{number_format($item->promotion_price)}} vnd</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- best sellers widget -->
                    </div>
                </div>
            </div> <!-- #content -->
        </div> <!-- .container -->
@endsection
