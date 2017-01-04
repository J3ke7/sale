<header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" 
                    data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! route('home') !!}"><span>Ẩm thực Việt</span></a>
            </div>

            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('home') !!}">Trang chủ</a></li>
                    <li><a href="{!! route('product.index') !!}">Đặc sản</a></li>
                    @if (Auth::guest())
                        <li><a href="{!! route('login') !!}">Đăng nhập</a></li>
                    @else
                        <li><a href="{!! route('user.cart.index') !!}">Giỏ hàng</a></li>
                        <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a></li>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
