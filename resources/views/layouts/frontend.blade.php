<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>E-commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">      
    <link href="{{asset('bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('themes/css/bootstrappage.css')}}" rel="stylesheet"/>
    
    <!-- global styles -->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('themes/css/flexslider.css')}}" rel="stylesheet"/>
    <link href="{{asset('themes/css/main.css')}}" rel="stylesheet"/>

    <!-- scripts -->
    <script src="{{asset('themes/js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>       
    <script src="{{asset('themes/js/superfish.js')}}"></script>  
    <script src="{{asset('themes/js/jquery.scrolltotop.js')}}"></script>
    <!--[if lt IE 9]>     
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>    
    <div id="top-bar" class="container">
      <div class="row">
        <div class="span4">
          <form method="POST" class="search_form">
            <input type="text"  class="input-block-level search-query" Placeholder="eg. T-sirt">
          </form>
        </div>
        <div class="span8">
          <div class="account pull-right">
            <ul class="user-menu"> 
              <li><a href="{{url('/')}}">Home</a></li>   
              <li><a href="#">My Account</a></li>
              <li><a href="#">Your Cart</a></li>
              <li><a href="#">Checkout</a></li>         
              <li><a href="{{url('/contuct')}}">Contact Us</a></li>         
              <li><a href="http://localhost:8000/login">Login</a></li>    
              <li><a href="http://localhost:8000/register">Register</a></li>    
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div id="wrapper" class="container">
      <section class="navbar main-menu">
        <div class="navbar-inner main-menu">        
          <a href="" class="logo pull-left"><img src="" class="site_logo" alt=""></a>
          <nav id="menu" class="pull-right">
            <ul class="main-manu">
              @php
               $menus=App\Category::where('menu_status', 1)->get();
              @endphp

              @foreach($menus as $menu)
              
              <li><a href="{{url('category/wise/product')}}/{{$menu->id}}">{{$menu->category_name}} </a></li> 

              @endforeach
              <li><a href="#">Best Seller</a></li>
              <li><a href="#">Top Seller</a></li>
             <li> <a href="{{url('/card/page')}}"><span>{{App\Card::where('customer_ip', $_SERVER['REMOTE_ADDR'])->count()}}</span></a></li>
            </ul>
          </nav>
        </div>
      </section>



@yield('frontend_content')

<section id="footer-bar">
        <div class="row">
          <div class="card-header text-center"><h4><span>Contact Us</span></h4></div>
          <div class="span3">
            <h5>ADDITIONAL INFORMATION</h5>
              <p><strong>Mirpur Shagufta Office</strong><br>
              <p>Plot 503, Road 05, Block A<br>
              <p>Shagufta Housing, Dhaka 1216<br>
              <p><strong>Workstation</strong><br>
              <p>Plot 236, Road 03<br>
              <p>Mirpur DOHS, Dhaka 1216<br>
              <p><strong>Phone:</strong>&nbsp;+8801717877561<br>
              <strong>Fax:</strong>&nbsp;+04 (123) 456-7890<br>
              <strong>Email:</strong>&nbsp;<a href="#">e_commerce_shopper@yahoo.com</a>               
              </p>
              
                   
          </div>
          <div class="span4">
            <h5>SECONDARY OFFICE IN UTTARA</h5>
              <p><strong>Uttara Office</strong><br>
              <p>Plot 504, Road 05, Sector-3<br>
              <p>Uttara Tower, Uttara, Dhaka 1230<br>
              <p><strong>Phone:</strong>&nbsp;+8801912209383<br>
              <strong>Fax:</strong>&nbsp;+04 (113) 023-1145<br>
              <strong>Email:</strong>&nbsp;<a href="#">e_commerce_shopper@gmail.com</a>         
              </p> 
              <br/>
           <ul class="menu">
          <a href="#"><i class="fab fa-facebook "></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-twitter-square"></i></a>
          <a href="#"><i class="fab fa-google-plus-square"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          </ul>
          </div>
          <div class="span5">
            <p class="logo"><img src="{{asset('themes/images/logo.png')}}" class="site_logo" alt=""></p>

                         @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

            <form method="post" action="{{url('/contact/insert/form')}}">
              @csrf
              <fieldset>
                <div class="clearfix">
                  <label for="name"><span>Name:</span></label>
                  <div class="input">
                    <input tabindex="1" size="11" id="name" name="name" type="text" value="" class="input-xlarge" placeholder="Name">
                  </div>
                </div>
                
                <div class="clearfix">
                  <label for="email"><span>Email:</span></label>
                  <div class="input">
                    <input tabindex="2" size="11" id="email" name="email" type="text" value="" class="input-xlarge" placeholder="Email Address">
                  </div>
                </div>
                
                <div class="clearfix">
                  <label for="message"><span>Message:</span></label>
                  <div class="input">
                    <textarea tabindex="3" class="input-xlarge" id="message" name="message" rows="2" placeholder="Message"></textarea>
                  </div>
                </div>
                
                <div class="actions">
                  <button tabindex="3" type="submit" class="btn btn-sm btn-inverse">Send message</button>
                </div>
              </fieldset>
            </form>
            
          </div>          
        </div>  
      </section>

      <section id="copyright" class="text-center">
        <span>Copyright@ 2019 By Engr.MD.REZWANUL ISLAM RUMON  .</span>
      </section>
    </div>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('themes/js/common.js')}}"></script>
    <script src="{{asset('themes/js/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript">
      $(function() {
        $(document).ready(function() {
          $('.flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 4000,
            animationSpeed: 600,
            controlNav: false,
            directionNav: true,
            controlsContainer: ".flex-container" // the container that holds the flexslider
          });
        });
      });
    </script>
    </body>
</html>