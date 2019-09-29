 @extends('layouts.frontend')

@section('frontend_content')

<section class="header_text sub">
			<img class="pageBanner" src="{{asset('themes/images/pageBanner.png')}}" alt="New products" >
			  <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">{{$single_product_info->product_name}}</li>
          </ol>
        </nav>
				<h4><span>Product Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}"></a>												
								<ul class="thumbnails small">								
									<li class="span1">
										<a href="{{asset('themes/images/ladies/2.jpg')}}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}" alt=""></a>
									</li>								
									<li class="span1">
										<a href="{{asset('themes/images/ladies/3.jpg')}}" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}" alt=""></a>
									</li>													
									<li class="span1">
										<a href="{{asset('themes/images/ladies/4.jpg')}}" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}" alt=""></a>
									</li>
									<li class="span1">
										<a href="{{asset('themes/images/ladies/5.jpg')}}" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="{{asset('uplode/product_photos')}}/{{$single_product_info->product_image}}" alt=""></a>
									</li>
								</ul>
							</div>
							<div class="span5">
								<address>
									<strong>Brand:</strong> <span>{{ $single_product_info->product_name}}</span><br>
									<strong>Category name:</strong> <span>{{ $single_product_info->relationtocategory->category_name}}</span><br>
									<strong>Product code:</strong> <span>Product 14</span><br>
									<strong>Reward Points:</strong> <span>0</span><br>
									<strong>Availability:</strong> <span>Out Of Stock</span><br>								
								</address>									
								<h4><strong>Price: ${{ $single_product_info->product_price}}</strong></h4>
							</div>
							<div class="span5">
								<form class="form-inline">
									<label class="checkbox">
										<input type="checkbox" value=""> Option one is this and that
									</label>
									<br/>
									<label class="checkbox">
									  <input type="checkbox" value=""> Be sure to include why it's great
									</label>
									<p>&nbsp;</p>
									<label>Qty:</label>
									<input type="text" class="span1" placeholder="">

									@if($single_product_info->product_quantity >0)
									<a href="{{url('add/to/card')}}/{{$single_product_info->id}}" class="btn btn-sm btn-inverse" type="submit" >Add to cart</a>
									@else
									<div class="alert alert-danger">
										No Product Available
									</div>
									@endif
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
									
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home">{{ $single_product_info->porduct_description}}</div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Size</th>
													<td>Large, Medium, Small, X-Large</td>
												</tr>		
												<tr class="alt">
													<th>Colour</th>
													<td>Orange, Yellow</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>						
							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											@forelse( $Latest_products as  $Latest_product)
											<ul class="thumbnails listing-products">
												
                                                 <li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="{{url('product/details')}}/{{$Latest_product->id}}"><img alt="" src="{{asset('uplode/product_photos')}}/{{$Latest_product->product_image}}"></a><br/>
														<a href="{{url('product/details')}}/{{$Latest_product->id}}" class="title">{{$Latest_product->product_name}}</a><br/>
														<a href="{{url('product/details')}}/{{$Latest_product->id}}" class="category">Suspendisse aliquet</a>
														<p class="price">${{$Latest_product->product_price}}</p>
														<a href="{{url('product/details')}}/{{$Latest_product->id}}" class="btn btn-sm btn-success">ADD TO CARD</a>
													</div>
												</li>

											</ul>
											@empty
												<h3><strong>No Related Products To Show</strong></h3>  
												@endforelse	
										</div>
										<div class="item">
											<ul class="thumbnails listing-products">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href=""><img alt="" src="{{asset('themes/images/ladies/1.jpg')}}"></a><br/>
														<a href="" class="title">Fusce id molestie massa</a><br/>
														<a href="#" class="category">Phasellus consequat</a>
														<p class="price">$341</p>
													</div>
												</li>       
												<li class="span3">
													<div class="product-box">												
														<a href=""><img alt="" src="{{asset('themes/images/ladies/2.jpg')}}"></a><br/>
														<a href="">Praesent tempor sem</a><br/>
														<a href="#" class="category">Erat gravida</a>
														<p class="price">$28</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href=""><img alt="" src="{{asset('themes/images/ladies/3.jpg')}}"></a><br/>
														<a href="" class="title">Wuam ultrices rutrum</a><br/>
														<a href="#" class="category">Suspendisse aliquet</a>
														<p class="price">$341</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">SUB CATEGORIES</li>
								<li><a href="">Nullam semper elementum</a></li>
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
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href=""><img alt="" src="{{asset('themes/images/ladies/7.jpg')}}"></a><br/>
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
													<a href=""><img alt="" src="{{asset('themes/images/ladies/8.jpg')}}"></a><br/>
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
						<div class="block">								
							<h4 class="title"><strong>Best</strong> Seller</h4>								
							<ul class="small-product">
								<li>
									<a href="#" title="Praesent tempor sem sodales">
										<img src="{{asset('themes/images/ladies/1.jpg')}}" alt="Praesent tempor sem sodales">
									</a>
									<a href="#">Praesent tempor sem</a>
								</li>
								<li>
									<a href="#" title="Luctus quam ultrices rutrum">
										<img src="{{asset('themes/images/ladies/2.jpg')}}" alt="Luctus quam ultrices rutrum">
									</a>
									<a href="#">Luctus quam ultrices rutrum</a>
								</li>
								<li>
									<a href="#" title="Fusce id molestie massa">
										<img src="{{asset('themes/images/ladies/3.jpg')}}" alt="Fusce id molestie massa">
									</a>
									<a href="#">Fusce id molestie massa</a>
								</li>   
							</ul>
						</div>
					</div>
				</div>
			</section>			

			@endsection