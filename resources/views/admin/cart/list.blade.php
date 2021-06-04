
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name Customer</th>
                    <th>Date order</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill as $item)
                <tr class="odd gradeX" align="center">
                    <td>{{$item->id}}</td>
                    <td>{{$item->customer->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->total}}</td>
                    <td>{{$item->payment}}</td>
                    <td>
                        @if($item->status == 0)
                            {{"Đang giao"}}
                        @else
                            {{"Đã nhận"}}
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('cart.edit', $item->id)}}">Edit</a></td>
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
