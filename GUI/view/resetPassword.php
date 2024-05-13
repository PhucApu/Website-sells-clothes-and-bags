<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="../css/forgotPassword.css">
</head>

<body>
    <div class="container">
        <div class="form-container" id="emailForm">
            <div class="logo-container">
                Đặt mật khẩu mới
            </div>

            <form class="form">
                <div class="form-group">
                    <label for="email">Nhập mật khẩu mới</label>
                    <input type="text" id="newPassword" name="newpw" placeholder="New Password" required="">
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Nhập lại mật khẩu mới</label>
                    <input type="text" id="newPassword" name="newpw" placeholder="Confirm Password" required="">
                </div>

                <button class="form-submit-btn" id="btnSendEmail" type="submit">Đặt lại mật khẩu</button>
            </form>

            <p class="signup-link">
                Bạn chưa có tài khoản?
                <a href="../view/signup.php" class="signup-link link"> Đăng ký ngay</a>
            </p>
        </div>

    </div>

</body>