@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <div>
                <h3>Customer Name: {{$cart->customer->name}}</h3>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) >0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $item)
                            {{$item}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <form action="{{route('cart.edit', $cart->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Cart Status</label><br>
                        <label class="radio-inline">
                            <input name="status" value="1"
                                   @if($cart->status == 1)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Đã nhận
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0"
                                   @if($cart->status == 0)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Đang giao
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Cart Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
