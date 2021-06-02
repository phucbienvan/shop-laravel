@extends('layout.master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
            <div class="banner" >
                <ul>
                    <!-- THE FIRST SLIDE -->
                    @foreach($slide as $item)
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$item['image']}}" data-src="source/image/slide/{{$item['image']}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$item['image']}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>

                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
{{--</div>--}}
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($new_product)}} Product</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($new_product as $item)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($item['unit_price'] != $item['promotion_price'])
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('product', $item['id'])}}"><img src="source/image/product/{{$item['image']}}" height="250px" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item['name']}}</p>

                                        <p class="single-item-price">
                                            @if($item['unit_price']== $item['promotion_price'])
                                            <span class="flash-sale">{{number_format($item['promotion_price'])}} vnđ</span>
                                            @else
                                                <span class="flash-del">{{number_format($item['unit_price'])}} vnđ</span>
                                                <span class="flash-sale">{{number_format($item['promotion_price'])}} vnđ </span>
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
                        <div class="row">{{$new_product->links()}}
                        </div>
                    </div> <!-- .beta-products-list -->



                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>All Product</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{count($product)}} Product</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product as $item)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if($item['unit_price'] != $item['promotion_price'])
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('product', $item['id'])}}"><img src="source/image/product/{{$item['image']}}" height="250px" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$item['name']}}</p>

                                            <p class="single-item-price">
                                                @if($item['unit_price']== $item['promotion_price'])
                                                    <span class="flash-sale">{{number_format($item['promotion_price'])}} vnđ</span>
                                                @else
                                                    <span class="flash-del">{{number_format($item['unit_price'])}} vnđ</span>
                                                    <span class="flash-sale">{{number_format($item['promotion_price'])}} vnđ</span>
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
                            <div class="row">{{$product->links()}}</div>

                            </div>
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>

            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->

@endsection
