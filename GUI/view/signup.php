<!DOCTYPE html>
<html lang="en">
<?php require('../../config.php')?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Ký</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/signup.css?v=<?php echo $version ?>">
</head>

<body>

  <div class="background"></div>

  <div class="form-container">
    <div id="step1">
      <h3 class="h2 fw-bold">ĐĂNG KÝ</h3>
      <form>
        <div class="mb-3 form-icon">
          <i class="fas fa-user"></i>
          <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" required>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-lock"></i>
          <input type="password" class="form-control" id="password" placeholder="Mật Khẩu" required>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-lock"></i>
          <input type="password" class="form-control" id="repeat-password" placeholder="Nhập lại mật khẩu" required>
        </div>
        <button type="button" class="btn btn-dark" onclick="showStep2()" style="margin-left: 65%;">Tiếp Theo</button>
        <div class="login-note">
          <medium>Đã có tài khoản? <a href="./login.php" class="text-dark font-weight-bold">Đăng nhập ngay</a></medium>
        </div>
      </form>
    </div>
    <div id="step2" style="display:none;">
      <h3 class="h2 fw-bold">THÔNG TIN</h3>
      <form id="registrationForm">
        <div class="mb-3 form-icon">
          <i class="fas fa-user"></i>
          <input type="text" class="form-control" id="name" placeholder="Name" required>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-calendar-alt"></i>
          <input type="date" class="form-control" id="dob" required>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-envelope"></i>
          <input type="email" class="form-control" id="email" placeholder="Email" required>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-venus-mars"></i>
          <select class="form-select" id="gender" required>
            <option value="male">Nam</option>
            <option value="female">Nữ</option>
            <option value="other">Khác</option>
          </select>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-address-card"></i>
          <input type="text" class="form-control" id="address" placeholder="Address" required>
          <span class="error-message" id="address-error"></span>
        </div>
        <div class="mb-3 form-icon">
          <i class="fas fa-phone"></i>
          <input type="tel" class="form-control" id="phone" placeholder="Phone Number" required>
        </div>
        <div class="d-flex justify-content-between">
          <span onclick="showStep1()"><i class="fas fa-arrow-left" style="cursor: pointer;"></i></span>
          <button type="submit" class="btn btn-dark">Đăng Ký</button>
          <!-- Success message placeholder -->
        </div>
      </form>
    </div>
  </div>

  <script src="../Js/signup.js?v=<?php echo $version ?>"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>