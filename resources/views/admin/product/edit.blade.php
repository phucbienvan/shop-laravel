@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit News
                    <small>{{$product->name}}</small>
                </h1>
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
                <form action="{{route('product.edit', $product->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="product_type">
                            @foreach($category as $item)
                                <option
                                    @if($product->product_type->id == $item->id)
                                        {{"selected"}}
                                        @endif
                                    value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" name="name" value="{{$product->name}}" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label> Description</label>
                        <input class="form-control" value="{{$product->description}}" name="description" rows="3">
                    </div>
                    <div class="form-group">
                        <label>Unit Price</label>
                        <input class="form-control"value="{{$product->unit_price}}" name="unit_price" placeholder="Please Enter " />
                    </div>
                    <div class="form-group">
                        <label>Promotion Price</label>
                        <input class="form-control"value="{{$product->promotion_price}}" name="promotion_price" placeholder="Please Enter " />
                    </div>
                    <div class="form-group">
                        <label> Image</label>
                        <img height="100px" src="source/image/product/{{$product->image}}">
                        <input type="file" class="form-control" name="image" placeholder="Please Enter image" />
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input class="form-control" value="{{$product->unit}}" name="unit" rows="3">
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
