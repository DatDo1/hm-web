
<div class="container-fluid nav-bar bg-transparent">
			<nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
				<a href="index.php" class="navbar-brand d-flex align-items-center text-center">
					<h1 class="m-0 text-primary">Housing</h1>
				</a>
				<div class="col-md-4 bd border border-primary">
					<input type="text" class="form-control border-0 py-3" placeholder="Tìm nhà">
				</div>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav ms-auto">
						<a href="{{route('client.home')}}" class="nav-item nav-link">Trang chủ</a>
						<a href="{{route('client.sell')}}" class="nav-item nav-link">Bán nhà</a>
						<a href="{{route('client.rent')}}" class="nav-item nav-link">Thuê nhà</a>
						@if(!session('user'))
							<a href="{{route('login')}}" class="nav-item nav-link">Đăng nhập</a>
						@endif

						@if(session('user'))
							<div href="" class="nav-item nav-link icon-custom">
								<i class="bi bi-person"> Hi, {{session('user')}}</i>
								<ul class="subnav">
									<li>
										<a href="{{route('client.addNews')}}" class="">Tạo tin mới</a>
									</li>
									<li>
										<a href="{{route('client.myNews')}}" class="">Tin của tôi</a>
									</li>
									<li>
										<a href="{{route('client.myHouses')}}" class="">Nhà của tôi</a>
									</li>
									<li>
										<a href="{{route('userLogout')}}" style="padding-right: 32px">Đăng xuất</a>
									</li>
								</ul>
							</div>
						@endif
					</div>
					{{-- <a href="" class="btn btn-primary px-3 d-none d-lg-flex">NHÀ TRỌ SINH VIÊN</a> --}}
				</div>
			</nav>
</div>
		