<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('category.list')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('category.list')}}">List Category</a>
                    </li>
                    <li>
                        <a href="{{route('category.add')}}">Add Category</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i>Product<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('product.list')}}">List Product</a>
                    </li>
                    <li>
                        <a href="{{route('product.add')}}">Add Product</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i>Slide<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('slide.list')}}">List Slide</a>
                    </li>
                    <li>
                        <a href="{{route('slide.add')}}">Add Slide</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('user.list')}}">List User</a>
                    </li>
                    <li>
                        <a href="{{route('user.add')}}">Add User</a>
                    </li>
                </ul>
                <a href="#"><i class="fa fa-users fa-fw"></i> Cart<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('cart.list')}}">List Cart</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
