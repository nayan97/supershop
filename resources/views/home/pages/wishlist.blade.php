

@extends('home.layouts.app')

@section('home-main')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
       
        
        <div class="container">
            @if ($items->count() > 0)

                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Abilitity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($items as $item)
                                    
                                        <tr>
                                            <td class="shoping__cart__item wislist">
                                                <img style="width:80px" src="{{$item->model->img}}" alt="{{$item->model->name}}">
                                                <h5>{{$item->model->name}}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                  ${{$item->model->sale_price}}
                                            </td>
                                            <td>
                                                @if ($item->model->stock_status == "inStock")
                                                    <h5>Instock</h5>
                                                @else
                                                    <h5>Out Of Stock</h5>
                                                    
                                                 @endif
                                            </td>
                                         
                                            <td class="shoping__cart__item__close">

                                                <a href="javascript:void(0)" class="wcarticon">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a href="javascript:void(0)" onclick="removeFromWishlist('{{$item->rowId}}')">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr> 
                                    @endforeach

                                </tbody>
                            </table>
                        </div> 
                    </div>
                  </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{route('shop.page')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <a href="javascript:void(0)" onclick="clearWishlist()" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                Clear Cart</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>${{Cart::instance('cart')->subtotal()}}</span></li>
                                <li>Total <span>${{Cart::instance('cart')->total()}}</span></li>
                            </ul>
                            <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
                    @else
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h1>No Product Found!</h1>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="shoping__cart__btns">
                                    <a href="{{route('shop.page')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        </div>
                            
                    @endif
            
        </div>
    </section>



<form id="deleteFromWishlist" action="{{route('wishlist.remove')}}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId_R" name="rowId" />
</form>

<form id="clearWishlist" action="{{route('wishlist.clear')}}" method="post">
    @csrf
    @method('delete') 
</form>

    <!-- Shoping Cart Section End -->




@endsection