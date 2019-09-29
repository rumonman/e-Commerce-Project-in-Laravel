@extends('layouts.frontend')

@section('frontend_content')
<section class="header_text sub">
			<img class="pageBanner" src="{{asset('themes/images/pageBanner.png')}}" alt="New products" >
				<h4><span>Shopping Cart</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Image</th>
									<th>Product Name</th>
									<th>Delete Product</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
                                  @forelse($card_items as $card_item)
                                   <tr>
                                   	<td><img src="{{asset('uplode/product_photos')}}/{{ App\product::find($card_item->product_id)->product_image}}" alt="" width="70px" height="50px"></td>
                                   	<td><a href=""> Delete Item</a></td>
									<td>{{ App\product::find($card_item->product_id)->product_name}}</td>
									
									<td><input type="text" class="input-mini" value="{{$card_item->	product_quantity}}"></td>
									
									<td>${{ App\product::find($card_item->product_id)->product_price}}</td>
									<td>${{ (App\product::find($card_item->product_id)->product_price)*($card_item->	product_quantity)}}</td>
								</tr>
                                  
                                  @empty
                                   <tr>
									<td>No Product To Show</td>
								   </tr>
                                  @endforelse		  
							
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								
									<td><strong></strong></td>
								</tr>		  
							</tbody>
						</table>
						<h4>What would you like to do next?</h4>
						<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
							Use Coupon Code
						</label>
						<label class="radio">
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
							Estimate Shipping &amp; Taxes
						</label>
						<hr>
						<p class="cart-total right">
							<strong>Sub-Total</strong>:	$100.00<br>
							<strong>Eco Tax (-2.00)</strong>: $2.00<br>
							<strong>VAT (17.5%)</strong>: $17.50<br>
							<strong>Total</strong>: $119.50<br>
						</p>
						<hr/>
						<p class="buttons center">				
							<button class="btn" type="button">Update</button>
							<a href="{{url('/')}}"><button class="btn" type="button">Continue</button></a>
							<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
						</p>					
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">SUB CATEGORIES</li>
								<li><a>Nullam semper elementum</a></li>
								<li class="active"><a href="">Phasellus ultricies</a></li>
								<li><a href="">Donec laoreet dui</a></li>
								<li><a href="">Nullam semper elementum</a></li>
								<li><a href="">Phasellus ultricies</a></li>
								<li><a href="">Donec laoreet dui</a></li>
							</ul>
							<br/>
							<ul class="nav nav-list below">
								<li class="nav-header">MANUFACTURES</li>
								<li><a href="">Adidas</a></li>
								<li><a href="">Nike</a></li>
								<li><a href="">Dunlop</a></li>
								<li><a href="">Yamaha</a></li>
							</ul>
						</div>
						<div class="block">
							<h4 class="title">
								<span class="pull-left"><span class="text">Randomize</span></span>
								<span class="pull-right">
									<a class="left button" href="" data-slide="prev"></a><a class="right button" href="" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href=""><img alt="" src="{{asset('themes/images/ladies/2.jpg')}}"></a><br/>
													<a href="" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$261</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">												
													<a href=""><img alt="" src="{{asset('themes/images/ladies/4.jpg')}}"></a><br/>
													<a href="" class="title">Tempor sem sodales</a><br/>
													<a href="#" class="category">Urna nec lectus mollis</a>
													<p class="price">$134</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</section>			


@endsection