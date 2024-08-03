    
   @php
       $theme_data = App\Models\Theme::find(1);
       $social = json_decode($theme_data  -> social, false);
   @endphp

    
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('home.page')}}">
                                @if ($theme_data -> logo === 'logo.png')
                                    <img src="img/logo.png" alt="">
                                @else
                                    <img src="{{ url('storage/logo/' . $theme_data -> logo)}}" alt="">
                                @endif 
                            </a>
                        </div>
                        <ul>
                            <li>{{$theme_data -> address}}</li>
                            <li>{{$theme_data -> cell}}</li>
                            <li>Email:{{$theme_data -> email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>{{$theme_data -> copyright}}<i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->