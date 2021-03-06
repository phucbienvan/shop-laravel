@extends('layout.master')
@section('content')
<div class="inner-header">
    <div class="container">

        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        @if(Session::has('message'))
            <h6 style="color: red">{{session('message')}}</h6>
        @endif

        @if(Auth::user())
        <form action="{{route('checkout')}}" method="post" class="beta-form-checkout">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" value=" {{Auth::user()->name}}" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" value=" {{Auth::user()->email}}" name="email" required placeholder="">
                    </div>
                    <div class="form-block">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" id="address" value=" {{Auth::user()->address}}" name="address" placeholder=" Address" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text"name="phone_number" value=" {{Auth::user()->phone}}" id="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="note">Ghi chú</label>
                        <input id="note" type="text" name="note">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    <!--  one item	 -->
                                    @if(Session::has('cart'))
                                        @foreach($product_cart as $product)
                                    <div class="media">
                                        <img width="25%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$product['item']['name']}}</p>
                                            <span class="color-gray your-order-info">Đơn giá: {{number_format($product['item']['promotion_price'])}}</span>
                                            <span class="color-gray your-order-info">Số lượng: {{$product['qty']}}</span>

                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                    <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đồng</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>
                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>

                            </ul>
                        </div>
                        @if(Session::has('cart') && $totalPrice != 0)
                        <div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng<i class="fa fa-chevron-right"></i></button></div>
                        @endif
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
            @else
            <div class="text-center"><a href="{{route('login.customer')}}" class="beta-btn primary">Đăng nhập</a></div>
            @endif
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
