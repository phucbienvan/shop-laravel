
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
        @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Unit price</th>
                    <th>Promotion price</th>
                    <th>Image</th>
                    <th>Unit</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $item)
                <tr class="odd gradeX" align="center">
                    <td>{{$item->id}}</td>
                    <td>
                        <p>{{$item->name}}</p>
                    </td>
                    <td>{{$item->product_type->name}}</td>
                    <td>{{$item->unit_price}}</td>
                    <td>{{$item->promotion_price}}</td>
                    <td>
                        <img height="100px" src="source/image/product/{{$item->image}}">
                    </td>

                    <td>{{$item->unit}}</td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('product.delete', $item->id)}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('product.edit', $item->id)}}">Edit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
