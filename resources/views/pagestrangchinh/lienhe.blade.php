@extends('layout1.index')
@section('content')
<div class="maps">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18781.6875266804!2d106.67601544284948!3d10.73773398545782!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x674d5126513db295!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBDw7RuZyBOZ2jhu4cgU8OgaSBHw7Ju!5e0!3m2!1svi!2s!4v1589121827252!5m2!1svi!2s" width="600" height="450" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	<div class="contact_mid">
		<div class="container">
			<div class="row m-0 p-0">
				<div class="col-md-4">
					<div class="contact_left">
						<h3>Đại học Công nghệ Sài Gòn</h3>
						<p class="contact_address">
							<i class="fas fa-location-arrow"></i> 180 Đường Cao Lỗ, Phường 4, Quận 8, Hồ Chí Minh
						</p>
						<a href="tel:+0937084675" class="contact__link d-block">
							<i class="fas fa-phone"></i>0365998998
						</a>
						<a href="mailto:hienphukien007@gmail.com" class="contact__link d-block">
							<i class="fas fa-envelope"></i>ahn.krb@gmail.com
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="contact_right" style="    margin-bottom: 25px;">
						<h3>Liên hệ chúng tôi</h3>
						<span>Hãy liên hệ với chúng tôi nếu bạn cần giúp đỡ</span>
						<form>
							<div class="form_contact row" style="padding: 15px;">
								<label for="name"class="col-sm-2">Họ và tên: </label>
								<div class="col-sm-10 m-0">
									<input type="text"  class="form-control" value="" placeholder="Nhập họ tên của bạn...">
								</div>
							</div>
							<div class="form_contact row" style="padding: 15px;">
								<label for="Email"class="col-sm-2">Email: </label>
								<div class="col-sm-10 m-0">
									<input type="text"  class="form-control" value="" placeholder="Nhập email của bạn..." style="    margin-bottom: 10px;">
								</div>
							</div>
							<div class="form_contact row" style="padding: 15px;">
								<label for="Content"class="col-sm-2">Nội dung </label>
								<div class="col-sm-10 m-0" style="padding: 15px;">
									<input type="text" class="form-control" value="" placeholder="Nội dung của bạn..." style="height: 80px;margin-bottom: 10px;">
								</div>
							</div>
							<div class="btn_contact" style="padding: 15px;">
								<input type="submit" class="btn-submit" value="Gửi liên hệ" style="margin-left: 60px;width: 150px;height: 30px;margin-bottom: 10px;">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection