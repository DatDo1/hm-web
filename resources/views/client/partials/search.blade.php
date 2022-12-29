<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
			<div class="container">
				<form action="{{route('client.searchNews')}}" method="post">
					@csrf
					<div class="row g-2">
						<div class="col-md-10">
							<div class="row g-2">
								<div class="col-md-4">
									<select class="form-select border-0 py-3" name="housetype">
										<option value="Chung cư" selected>Chung cư</option>
										<option value="Nhà phố">Nhà phố</option>
										<option value="Nhà trọ">Nhà trọ</option>
									</select>
								</div>
								<div class="col-md-4">
									<select class="form-select border-0 py-3" name="housecity">
										<option value="Hà Nội" selected>Hà Nội</option>
										<option value="Thành phố Hồ Chí Minh">Thành phố Hồ Chí Minh</option>
										<option value="Đà Nẵng">Đà Nẵng</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<button class="btn btn-dark border-0 w-100 py-3" type="submit">
								Tìm kiếm
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>