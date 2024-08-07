    
    @php
        $theme_data = App\Models\Theme::find(1);
       $social = json_decode($theme_data  -> social, false);

    @endphp
       <!-- Page Preloder -->
        {{-- <div id="preloder">
            <div class="loader">

            </div>
        </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('home.page')}}">
            @if ($theme_data -> logo === 'logo.png')
                <img src="img/logo.png" alt="">
            @else
                <img src="{{ url('storage/logo/' . $theme_data -> logo)}}" alt="">
            @endif
            </a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>

        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home.page')}}">Home</a></li>
                <li><a href="{{ route('shop.page')}}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>{{ $theme_data -> email}}</li>
                <li>{{ $theme_data -> runnig_tag}}</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>{{ $theme_data -> email}}</li>
                                <li>{{ $theme_data -> running_tag}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                @if (!empty($social->fb))
                                <a href="{{ $social -> fb}}"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if (!empty($social->din))
                                <a href="{{ $social -> din}}"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if (!empty($social->ins))
                                <a href="{{ $social -> ins}}"><i class="fa fa-instagram"></i></a>   
                                @endif
                                @if (!empty($social->tw))
                                <a href="{{ $social -> tw}}"><i class="fa fa-twitter"></i></a> 
                                @endif
                                @if (!empty($social->wapp))
                                <a href="{{ $social -> wapp}}"><i class="fa fa-whatsapp"></i></a>
                                @endif
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype ===0))
                                        <div class="header__top__right__auth">
                                            <a href="{{ route('admin.index') }}"><i class="fa fa-user"></i> Dashboard</a>
                                        </div>
                                    @else
                                    <div class="header__top__right__language">
                                        <i class="fa fa-user"></i>
                                        <div>Profile</div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li>
                                                 <a href="{{ route('user.index') }}">My Account</a>
                                            </li>
                                            <li>
                                                <a class="" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                        {{-- <div class="header__top__right__auth">
                                            <a href="{{ route('user.index') }}"><i class="fa fa-user"></i>My Account</a>
                                        </div> --}}

                                    @endif
                                    {{-- <div class="header__top__right__auth">
                                       
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                    </div> --}}
                                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> --}}
                                @else
                                    <div class="header__top__right__auth">
                                        <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                    </div>
                                
                                    <div class="header__top__right__auth">

                                        <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
                                    </div>
                                @endauth

                                
                         
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home.page')}}">
                            @if ($theme_data -> logo === 'logo.png')
                                <img src="img/logo.png" alt="">
                            @else
                                <img src="{{ url('storage/logo/' . $theme_data -> logo)}}" alt="">
                            @endif
                            </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('home.page')}}">Home</a></li>
                            <li><a href="{{ route('shop.page')}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                               
                                    <li><a href="#">Shoping Cart</a></li>
                                    <li><a href="#">Check Out</a></li>
                                    <li><a href="#">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{route('wishlist.show')}}"><i class="fa fa-heart"></i> <span>{{Cart::instance('wishlist')->content()->count()}}</span></a></li>
                            <li><a href="{{route('cart.page.index')}}"><i class="fa fa-shopping-bag"></i> 
                                <span>{{Cart::instance('cart')->content()->count()}}</span>
                            </a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>${{Cart::instance('cart')->total()}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

