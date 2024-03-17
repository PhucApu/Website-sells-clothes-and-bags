<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/login.css" type="text/css" media="all"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>
	<section class="w3l-form-36">
		<div class="form-36-mian section-gap">
			<div class="wrapper">
				<div class="form-inner-cont">
					<h3>ĐĂNG NHẬP</h3>
					<form action="#" method="post" class="signin-form">
						<div class="form-input">
							<span class="fa fa-envelope" aria-hidden="true"></span> <input type="email" name="email"
								placeholder="Tên đăng nhập" required />
						</div>
						<div class="form-input">
							<span class="fa fa-key" aria-hidden="true"></span> <input type="password" name="password" placeholder="Mật khẩu"
								required />
						</div>
						<div class="login-remember d-grid">
							<label class="check-remaind">
								<input type="checkbox">
								<span class="checkmark"></span>
								<p class="remember">Nhớ mật khẩu</p>
							</label>
							<button class="btn theme-button">Đăng Nhập</button>
						</div>
						<div class="new-signup">
							<a href="#reload" class="signuplink">Quên mật khẩu?</a>
						</div>
					</form>
					<div class="social-icons">
						<p class="continue"><span>Hoặc</span></p>
						<div class="social-login">
							<a href="https://www.facebook.com/thanh.sang.528" target="_blank">
								<div class="facebook">
									<span class="fa-brands fa-facebook" aria-hidden="true"></span>

								</div>
							</a>
							<a href="#google">
								<div class="google">
									<span class="fa-brands fa-google-plus" aria-hidden="true"></span>
								</div>
							</a>
						</div>
					</div>
					<p class="signup">Bạn chưa có tài khoản? <a href="./signup.php" class="signuplink">Đăng ký ngay</a></p>
				</div>
			</div>
		</div>
	</section>
</body>
</html>