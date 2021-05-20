<header id="header"><!--header-->
    <nav>
        <div class="container">
            <div class="row">
                <ul class="navbar-nav pull-left">
                    <li ><a href="" class="nav-link"><i class="fa fa-phone"></i> +0 95 01 88 821</a></li>
                    <li ><a href="" class="nav-link"><i class="fa fa-envelope"></i> info@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <ul class="navbar-nav pull-right">
                <li class="nav-item active"><i class="fa fa-user"></i> <a href="http://127.0.0.1:8000/home" class="nav-link"> Home </a> </li>
                <li class="nav-item"><i class="fa fa-star"></i> <a href="{{route('account',Auth::user()->id)}}" class="nav-link"> Account </a> </li>
                <li class="nav-item"><i class="fa fa-crosshairs"></i> <a href="{{route('register')}}" class="nav-link"> Register </a> </li>
                <li class="nav-item"><i class="fa fa-shopping-cart"></i> <a href="{{route('cart')}}" class="nav-link notification"><span class="badge shopping-cart">0</span> <span>Cart</span> </a>  </li>
                <li class="nav-item dropdown">
                    <i class="fa fa-lock"></i>
                    <a href="{{route('login')}}" class="nav-link"> Login </a>

                </li>
            </ul>

        </div>
    </nav>
    <div class="alert alert-success alert-highlighted"
         style="position: fixed; top: 0; right: 0; display: none; " data-delay="5000">
        <i class="fa fa-check"></i>

        <span></span>

    </div>
</header>

