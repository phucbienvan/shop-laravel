@extends('layout.master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
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
        <form action="{{route('login.customer')}}" method="post" class="beta-form-checkout">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" name="password" id="phone" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
