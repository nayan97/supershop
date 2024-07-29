


@extends('home.layouts.app')

@section('home-main')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shipping</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>Shipping</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="container">
        <div class="checkout__form">
            <br>
            <h4>Billing Details</h4>
            <form action="{{ route('addshippingaddress')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input name="fname" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input name="lname"  type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="cell"  type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name="email"  type="text">
                                </div>
                            </div>
                        </div>
                     
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input name="address" type="text" placeholder="Street Address" class="checkout__input__add">
                            <input name="opaddress"  type="text" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input name="city"  type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input name="state"  type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input name="zip"  type="text">
                        </div>
             
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            @foreach (Cart::instance('cart') as $item)
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <li>{{$item-> name}}<span>${{$item->sale_price}}</span></li>
                            </ul>
                            @endforeach
                            <div class="checkout__order__subtotal">Subtotal <span>${{Cart::instance('cart')->subtotal()}}</span></div>
                            <div class="checkout__order__total">Total <span><input type="hidden" name="total_amount" value="{{Cart::instance('cart')->total()}}">${{Cart::instance('cart')->total()}}</span></div>
                     
                            <div class="checkout__input__checkbox">
                                <div class="form-check custome-radio-box">
                                    <input name="paymethod" class="form-check-input" type="radio" value="stripe" id="stripe">
                                    <label class="form-check-label" for="debit">Debit card</label>
                                </div>
                                
                            </div>
                            <div class="checkout__input__checkbox">
                                <div class="form-check custome-radio-box">
                                    <input name="paymethod" class="form-check-input" type="radio" value="cash" id="cashOn">
                                    <label class="form-check-label" for="cashOn">Cash On</label>
                                </div>
                            </div>
                         
                            <button type="submit" class="site-btn btn-block">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <form id="clearCart" action="{{route('cart.clear')}}" method="post">
        @csrf
        @method('delete') 
    </form>






@endsection