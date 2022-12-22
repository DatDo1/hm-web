@include('client/partials.header');

<body>
	<div class="container-xxl bg-white p-0">
		<!-- Navbar Start -->

		@include('client/partials.navbar');

		<!-- Navbar End -->

		<!-- Slider Start -->
		<div class="container-fluid header bg-white p-0">
			<div class="row g-0 align-items-center flex-column-reverse flex-md-row">
				<div class="col-md-12 animated fadeIn">
					<div class="owl-carousel header-carousel">
						<div class="owl-carousel-item">
							<img class="img-fluid" src="../users/img/carousel-1.jpg" alt="">
						</div>
						<div class="owl-carousel-item">
							<img class="img-fluid" src="../users/img/carousel-2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Slider End -->


		<!-- Search Start -->

		@include('client/partials.search');

		<!-- Search End -->


		<!-- Property List Start -->
		<div class="container-xxl py-5">
			<div class="container">
				<div class="row g-0 gx-5 align-items-end">
					<div class="col-lg-6">
						<div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
							<h2 class="mb-3">Danh sách nhà đang bán</h2>
						</div>
					</div>
					<div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
						<ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
							<li class="nav-item me-2">
								<a class="btn btn-outline-primary"  href="{{route('client.home')}}">Tất cả</a>
							</li>
							<li class="nav-item me-2">
								<a class="btn btn-outline-primary active"  href="{{route('client.sell')}}">Bán nhà</a>
							</li>
							<li class="nav-item me-0">
								<a class="btn btn-outline-primary"  href="{{route('client.rent')}}">Thuê nhà</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-content">
					<div id="tab-1" class="tab-pane fade show p-0 active">
						<div class="row g-4">
							@foreach($sellHouseList as $key => $value)
								<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
									<div class="property-item rounded overflow-hidden">
										<div class="position-relative overflow-hidden">
											<a href=""><img class="img-fluid" src="../users/img/property-1.jpg" alt=""></a>
											<div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
												{{$value->HouseStatus}}</div>
											<div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
												{{$value->TypeOfHouse}}</div>
										</div>
										<div class="p-4 pb-0">
											<h5 class="text-primary mb-3">{{$value->Price}} VNĐ</h5>
											<a class="d-block h5 mb-2" href="">Golden Urban House Bán nhà</a>
											<p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York,
												USA</p>
										</div>
										<div class="d-flex border-top">
											<small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
											<small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
											<small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
										</div>
									</div>
								</div>
							@endforeach

							<div class="col-12 text-center">
								<a class="btn btn-primary py-3 px-5" href="">Xem thêm</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Property List End -->

		<!-- Footer Start -->

		@include('client/partials.footer');

		<!-- Footer End -->

</body>

</html>